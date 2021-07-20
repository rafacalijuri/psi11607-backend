<?php

namespace App\Repositories;

use App\Repositories\UnidadeRepositoryInterface;
use App\Models\Unidade as UnidadeModel;

use Illuminate\Support\Facades\DB;

class UnidadeRepositoryEloquent implements UnidadeRepositoryInterface{

    private UnidadeModel $model;

    public function __construct(UnidadeModel $model){
        $this->model = $model;
    }

    public function index(){
        return $this->model->all();
    }

    public function getPropostasUnidade(int $unidadeId){

        //DB::enableQueryLog();
        return $this->model->find($unidadeId)->propostas()->get();        

        //return $this->model->with('propostas')->get();        
        //dd(DB::getQueryLog());

    }
    

}