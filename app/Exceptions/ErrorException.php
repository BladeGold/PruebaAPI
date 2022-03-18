<?php

namespace App\Exceptions;

use Exception;

class ErrorException extends Exception
{
     public function render($request)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response(['erroo'],422);
        }
        if ($exception instanceof QueryException) {
            return response(['erroo'],422);
        }

        return response();
    }
}
