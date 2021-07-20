<?php

namespace App\Repositories;

interface UnidadeRepositoryInterface{

    public function index();
    public function getPropostasUnidade(int $unidadeId);

}