<?php

namespace App\Repositories;

use App\Repositories\UnidadeRepositoryInterface;
use App\Models\Unidade as UnidadeModel;

class UnidadeRepositoryEloquent implements UnidadeRepositoryInterface{

    private UnidadeModel $model;

    public function __construct(UnidadeModel $model){
        $this->model = $model;
    }

    public function index(){
        return $this->model->all();
    }

}