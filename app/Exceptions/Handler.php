<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render(Request $request, Throwable $exception): Response
    {
        if ($this->isHttpException($exception) && $exception->getStatusCode() == 404) {
            return view('error.404');
        }
        if ($this->isHttpException($exception) && $exception->getStatusCode() == 500) {
            return view('error.500');
        }

        return parent::render($request, $exception);
    }
}
