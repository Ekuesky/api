<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Trait ExceptionTrait {

    public function apiException($request,$e){

        if($e instanceof ModelNotFoundException){
            return response()->json([
                'errors'=>'Product model not found'
            ]);
            
        }
        if($e instanceof NotFoundHttpException){
            return response()->json([
                'errors'=>'Incorrect route'
            ]);
        }

    }
}