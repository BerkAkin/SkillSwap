<?php

namespace App\Services;

use App\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService implements BaseServiceInterface
{
    protected string $model;

    public function GetAll(): Collection{
        return $this->model::all();
    }
    
    public function Find(int $id) : ?Model{
        return $this->model::findOrFail($id);
    }

    public function Destroy(int $id){
        return $this->Find($id)->delete();
    }
}
