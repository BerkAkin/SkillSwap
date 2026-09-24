<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IBaseService
{
    public function GetAll(): Collection;
    public function Find(int $id): ?Model;
    public function Destroy(int $id);

}
