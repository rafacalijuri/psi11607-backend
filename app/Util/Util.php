<?php
namespace App\Util;

use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Util{

    public static function RetornoErroDB(QueryException $e){
        return response()->json(['erro'=>'Erro ao conectar no BD', 'exception'=>$e->getMessage()], HttpResponse::HTTP_BAD_REQUEST); 
    }

}