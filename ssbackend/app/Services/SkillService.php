<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Contracts\ISkillService;
use App\Models\Skill;
use App\Http\Resources\SkillResources\GetResource;
use App\DTOs\SkillDTOs\StoreDTO;
use App\DTOs\SkillDTOs\UpdateDTO;
use App\Helpers\CacheKeyGeneratorHelper;

class SkillService implements ISkillService
{
    protected string $model = Skill::class;


    public function GetAll()
    {
        $params = CacheKeyGeneratorHelper::getListParams();
        $cacheKey = CacheKeyGeneratorHelper::generateCacheKey('skills', $params);

        return Cache::tags(['skills'])->remember($cacheKey, 300, function () use ($params) {
            $skills = $this->model::
                where('name', 'ilike', "%{$params['search']}%")
                ->orderBy($params['sort'])
                ->skip(($params['page'] - 1) * 1)
                ->take(20)
                ->get();
            return GetResource::collection($skills)->resolve();
        });
    }

    public function Create(StoreDTO $DTO): Skill
    {
        $skill = $this->model::create([
            'name' => $DTO->name,
            'description' => $DTO->description,
        ]);

        Cache::tags(['skills'])->flush();
        Cache::put("skills:$skill->id", (new GetResource($skill))->resolve(), 300);

        return $skill;
    }
    public function Update(UpdateDTO $DTO): ?Skill
    {
        $skill = $this->Find($DTO->id);
        $skill->update([
            'name' => $DTO->name,
            'description' => $DTO->description,
        ]);

        Cache::forget("skills:$DTO->id");
        Cache::tags(['skills'])->flush();

        return $skill;
    }

    public function Destroy(int $id)
    {
        $this->Find($id)->delete();

        Cache::forget("skills:$id");
        Cache::tags(['skills'])->flush();
    }

    public function Find(int $id)
    {
        $cacheKey = "skills:$id";
        $cached = Cache::get($cacheKey);
        if ($cached) {
            if (isset($cached['not_found'])) {
                return null;
            }
            return $cached;
        }

        $lock = Cache::lock("skills:lock:$id", 10);

        try {
            $lock->block(5);
            $cached = Cache::get($cacheKey);
            if (!$cached) {
                $cached = $this->model::find($id);
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


}
