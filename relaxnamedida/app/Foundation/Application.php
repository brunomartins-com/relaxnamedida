<?php

namespace App\Foundation;


use Illuminate\Foundation\Application as IlluminateApplication;

class Application extends IlluminateApplication
{
    public function publicPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'../public_html/concursonamedida';
    }
}