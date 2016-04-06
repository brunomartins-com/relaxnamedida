<!DOCTYPE html>
<html lang="pt-br">
<head></head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
    <br />
    <strong>Assunto: </strong> {{ $request->subject }}
    <br />
    <strong>Nome: </strong> {{ $request->name }}
    <br />
    <strong>E-mail:</strong> {{ $request->email }}
    <br />
    <strong>Telefone: </strong> {{ $request->phone }}
    <br />
    <strong>Mensagem: </strong> {!! nl2br(e($request->message)) !!}
    <br /><br />
    <img src="{{ url('assets/images/logotype-teuto.png') }}" alt="Teuto/Pfizer" />
    <br />
    <br />
    <br />
    <strong>IP do internauta: {{ $request->ip() }}</strong>
    <br />
    <strong>Dados enviados em: {{ $request->date }}</strong>
</body>
</html>