<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Database\QueryException;

use App\Repositories\UnidadeRepositoryInterface;
use App\Util\Util;

 
class UnidadeService{

    private UnidadeRepositoryInterface $repository;

    public function __construct(UnidadeRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function index(){

        try{
            $unidades = $this->repository->index();
            if (count($unidades) === 0)
                return response()->json('', HttpResponse::HTTP_NO_CONTENT);
            return response()->json($unidades, HttpResponse::HTTP_OK);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }

    }

}