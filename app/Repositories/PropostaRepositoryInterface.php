<?php

namespace App\Repositories;

interface PropostaRepositoryInterface{
    
    public function index();

    public function getQuantidadeUnidade(int $unidadeId);
    public function getValorRepasseUnidade(int $unidadeId);
    public function getQuantidadeStatusUnidade(int $unidadeId, string $statusProposta);
    public function getValorRepasseStatusUnidade(int $unidadeId, string $statusProposta);

    public function getTotalPorUnidade();
    public function getContratadasMes();
    public function getPropostasUnidade(int $unidadeId);

}