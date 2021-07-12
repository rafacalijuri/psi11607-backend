<?php

namespace App\Repositories;

use App\Repositories\PropostaRepositoryInterface;
use App\Models\Proposta as PropostaModel;

class PropostaRepositoryEloquent implements PropostaRepositoryInterface{

    private PropostaModel $model;
    private int $idUnidadeSuperior = 5669;

    public function __construct(PropostaModel $model){
        $this->model = $model;
    }

    public function index(){
        return $this->model->all();
    }

    public function getQuantidadeUnidade(int $unidadeId){
        if ($unidadeId === $this->idUnidadeSuperior)
            return $this->model->query()->count();
        
        return $this->model->query()->where('unidadeId', $unidadeId)->count();        
    }

    public function getValorRepasseUnidade(int $unidadeId){
        if ($unidadeId === $this->idUnidadeSuperior)
        return $this->model->query()->sum('ValorRepasse');

        return $this->model->query()->where('unidadeId', $unidadeId)->sum('ValorRepasse');
    }

    public function getQuantidadeStatusUnidade(int $unidadeId, string $statusProposta){
        if ($unidadeId === $this->idUnidadeSuperior)
            return $this->model->query()->whereNotNull('Data' . $statusProposta . 'Proposta')->count();

        return $this->model->query()->where('unidadeId', $unidadeId)->whereNotNull('Data' . $statusProposta . 'Proposta')->count();
    }

    public function getValorRepasseStatusUnidade(int $unidadeId, string $statusProposta){
        if ($unidadeId === $this->idUnidadeSuperior)
            return $this->model->query()->whereNotNull('Data' . $statusProposta . 'Proposta')->sum('ValorRepasse');

        return $this->model->query()->where('unidadeId', $unidadeId)->whereNotNull('Data' . $statusProposta . 'Proposta')->sum('ValorRepasse');
    }

    public function getTotalPorUnidade(){
        
        return 
            $this->model->selectRaw('Sigla, count(*) as QuantidadePropostas, sum(ValorRepasse) as ValorRepasse')
            ->join('geotr.unidade', 'proposta.unidadeId','=','unidade.unidadeId')
            ->whereNotNull('DataContratadasProposta')
            ->groupBy('Sigla')
            ->get();
            
    }

    public function getContratadasMes(){

        return 
            $this->model->selectRaw('AnoMesContratada, count(DataContratadasProposta) as Contratadas')
            ->whereNotNull('DataContratadasProposta')
            ->orderBy('AnoMesContratada', 'DESC')
            ->groupByRaw('AnoMesContratada')
            ->take(6)
            ->get();    
    }

}