<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class FrontendRepository implements FrontendRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
       return $this->model->where('is_active',1)->get();
    }
}