<?php
namespace App\Http\Controllers;

use App\Services\PropostaService;

class PropostaController extends Controller{

    private PropostaService $service;

    public function __construct(PropostaService $service){
        $this->service = $service;
    }

    public function index(){ 
        return $this->service->index();
    }

    public function getTotalUnidade(int $unidadeId){ 
        return $this->service->getTotalCardUnidade($unidadeId);
    }

    public function getTotalPorUnidade(){ 
        return $this->service->getTotalPorUnidade();
    }

    public function getContratadasMes(){ 
        return $this->service->getContratadasMes();
    }

}