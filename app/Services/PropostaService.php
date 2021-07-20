<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Database\QueryException;

use App\Repositories\PropostaRepositoryInterface;
use App\Util\Util;

 
class PropostaService{

    private PropostaRepositoryInterface $repository;

    public function __construct(PropostaRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function index(){
        try{
            return $this->repository->index();
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }

    }

    public function getTotalPorUnidade(){
        try{
            return $this->repository->getTotalPorUnidade();;
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }

    }

    public function getTotalCardUnidade(int $unidadeId){

        try{
            $quantidade = $this->repository->getQuantidadeUnidade($unidadeId);
            $valorRepasse = $this->repository->getValorRepasseUnidade($unidadeId);

            $quantidadeAptas = $this->repository->getQuantidadeStatusUnidade($unidadeId, 'Aptas');
            $valorRepasseAptas = $this->repository->getValorRepasseStatusUnidade($unidadeId, 'Aptas');

            $quantidadeProspeccao = $this->repository->getQuantidadeStatusUnidade($unidadeId, 'Prospeccao');
            $valorRepasseProspeccao = $this->repository->getValorRepasseStatusUnidade($unidadeId, 'Prospeccao');

            $quantidadeContratadas = $this->repository->getQuantidadeStatusUnidade($unidadeId, 'Contratadas');
            $valorRepasseContratadas = $this->repository->getValorRepasseStatusUnidade($unidadeId, 'Contratadas');

            return response()->json([
                "quantidade" => $quantidade,
                "valorRepasse" => $valorRepasse,
                "quantidadeAptas" => $quantidadeAptas,
                "valorRepasseAptas" => $valorRepasseAptas,
                "quantidadeProspeccao" => $quantidadeProspeccao,
                "valorRepasseProspeccao" => $valorRepasseProspeccao,
                "quantidadeContratadas" => $quantidadeContratadas,
                "valorRepasseContratadas" => $valorRepasseContratadas,
            ], HttpResponse::HTTP_OK);
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }

    }

    public function getContratadasMes(){
        try{
            return $this->repository->getContratadasMes();;
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }

    }

    public function getPropostasUnidade(int $unidadeId){
        try{
            return $this->repository->getPropostasUnidade($unidadeId);;
        }catch (QueryException $e){
            return Util::RetornoErroDB($e);
        }

    }

}
