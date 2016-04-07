<!DOCTYPE html>
<html lang="pt-br">
<head></head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
    <br />
    Olá <strong>{{ $contact->name }}</strong> recebemos seu pré-cadastro em nosso site com sucesso!
    <br /><br />
    Para confirmá-lo basta clicar no link abaixo.
    <br /><br />
    <a href="{{ action('Website\RegistrationController@getConfirmation', [$contact->email,$contact->token]) }}"><strong>CONFIRMAR CADASTRO</strong></a>
    <br /><br />Atenciosamente
    <br />
    <img src="{{ url('assets/images/logotype-teuto.png') }}" alt="Teuto/Pfizer" />
    <br />
    Equipe Teuto/Pfizer
    <br />
    <br />
    <br />
    <strong>Dados enviados em: {{ date('d/m/Y h:i:s') }}</strong>
    <br />
    <br />
    <em>Esse e-mail é um envio automático, favor não responder!</em>
</body>
</html>