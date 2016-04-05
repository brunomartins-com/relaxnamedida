<?php

ini_set("SMTP", "smtp.office365.com");
ini_set("sendmail_from", "webmaster@teuto.com.br");

require __DIR__ . '/../../relaxnamedida/bootstrap/autoload.php';

$app = require_once __DIR__ . '/../../relaxnamedida/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
