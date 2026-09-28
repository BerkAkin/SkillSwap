<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\IAdvertService;
use App\Models\Skill;
use App\Models\Advert;
use App\DTOs\AdvertDTOs\StoreDTO;
use App\Http\Resources\AdvertResource\GetResource;
use App\Helpers\CacheKeyGeneratorHelper;

class AdvertService implements IAdvertService
{
    protected string $model = Advert::class;

    public function GetAll(): array
    {
        $params = CacheKeyGeneratorHelper::getListParams();
        $cacheKey = CacheKeyGeneratorHelper::generateCacheKey('adverts', $params);

        return Cache::tags(['adverts'])->remember($cacheKey, 300, function () use ($params) {
            $adverts = $this->model::
                with(['user:id,firstname', 'skill:id,name,description',])
                ->whereHas('skill', function ($query) use ($params) {
                    $query->where('name', 'ilike', "%{$params['search']}%");
                })
                ->select(['id', 'user_id', 'skill_id', 'status', 'created_at',])
                ->skip(($params['page'] - 1) * 1)
                ->take(2)
                ->get();

            return GetResource::collection($adverts)->resolve();
        });
    }

    public function Find(int $id)
    {
        $cacheKey = "advert:{$id}";
        $cached = Cache::get($cacheKey);
        if ($cached) {
            if (isset($cached['not_found'])) {
                return null;
            }
            return $cached;
        }

        $lock = Cache::lock("advert:lock:$id", 10);

        try {
            $lock->block(5);
            $cached = Cache::get($cacheKey);
            if (!$cached) {
                $cached = $this->model::
                    select('id', 'user_id', 'skill_id', 'status', 'created_at')
                    ->with([
                        'user:id,firstname',
                        'skill:id,name,description',
                        'meeting:id,adverter_approval,offerer_approval,status'
                    ])
                    ->Find($id);

                if ($cached === null) {
                    Cache::put($cacheKey, ['not_found' => true], 60);
                } else {
                    Cache::put($cacheKey, (new GetResource($cached))->resolve(), 300);
                }
            }
            if (isset($cached['not_found'])) {
                return null;
            }
            return (new GetResource($cached))->resolve();

        } finally {
            $lock->release();
        }


    }

    public function Create(StoreDTO $DTO): ?Advert
    {
        $exists = Skill::where('id', $DTO->skillId)->exists();
        if (!$exists) {
            throw new \Exception('Skill does not exist');
        }

        $advertExists = Advert::where('user_id', Auth::id())->where('skill_id', $DTO->skillId)->exists();
        if ($advertExists) {
            throw new \Exception('You already have an advert with this type of skill');
        }


        $advert = Advert::create([
            'user_id' => Auth::id(),
            'skill_id' => $DTO->skillId,
            'status' => $DTO->status
        ]);
        Cache::tags(['adverts'])->flush();
        Cache::put("advert:{$advert->id}", (new GetResource($advert))->resolve(), 300);
        return $advert;
    }

    public function Destroy(int $id)
    {
        $this->model::where('id', $id)->where('user_id', Auth::id())->delete();
        Cache::forget("advert:{$id}");
        Cache::tags(['adverts'])->flush();
    }

    public function myAdverts(): Collection
    {
        return $this->model::with(['chats'])->where('user_id', Auth::id())->get();
    }

}
