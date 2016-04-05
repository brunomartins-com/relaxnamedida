<!DOCTYPE html>
<html lang="pt-br">
<body style="background-color:#F5F5F5">
<div style="width: 100%; float: left; clear: both; margin: auto">
    <div style="margin: 0 auto;">
        <div style="width:50%; height: 100%; min-height: 100%; margin-top: 40px; display: block; background-color: #fff;">
            <div style="width: 100%; text-align: center; padding-top: 10px;">
                <img width="320px" src="{{ asset('assets/images/logo-concurso-relax-na-medida.png') }}" alt="Concurso Relax Na Medida - Teuto/Pfizer" />
            </div>
            <h4 style="font-size: 18px; font-weight: normal;">Olá <strong>{{ $user->name  }}</strong></h4>
            <p>Este e-mail é para a recuperação de senha, para completar sua solicitação
                <a href="{{ action($action, $token) }}" target="_blank">clique aqui</a>
            </p>
            <br />
            <br />
            <br />
            <strong>Dados enviados em: {{ date('d/m/Y H:i:s') }}</strong>
        </div>
    </div><!-- end .row -->
</div><!-- end .containter -->
</body>
</html>