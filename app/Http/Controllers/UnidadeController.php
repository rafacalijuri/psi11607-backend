<?php
namespace App\Http\Controllers;

use App\Services\UnidadeService;

class UnidadeController extends Controller{

    private UnidadeService $service;

    public function __construct(UnidadeService $service){
        $this->service = $service;
    }

    public function index(){ 
        return $this->service->index();
    }

}