<?php \Auth::loginUsingId("users", 2); ?>

@if($websiteSettings['siteAvailable'] == 0 && !Auth::check('admin'))
{!! view('website.teaser')->with(compact('page', 'websiteSettings')) !!}
{!! die() !!}
@endif
<!--
Project: Concurso na Relax na Medida
Author: Bruno Martins - Web Developer
Website: www.brunomartins.com
Contact: hello@brunomartins.com
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
    <title>@yield('title'){{ $websiteSettings['title'] }}</title>
    <link rel="shortcut icon" href="{!! asset('assets/images/_upload/dados-do-site/'.$websiteSettings['favicon']) !!}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/_upload/dados-do-site/'.$websiteSettings['appleTouchIcon']) }}" />
    {!! $websiteSettings['googleAnalytics'] !!}
    <!-- Meta Tags -->
    <meta name="title" content="{{ $websiteSettings['title'] }}" />
    <meta name="description" content="{{ $websiteSettings['description'] }}" />
    <meta name="keywords" content="{{ $websiteSettings['keywords'] }}" />

    <meta name="geography" content="Brazil">
    <meta name="language" content="Português Brasil">
    <meta name="revisit-after" content="30 days">
    <meta name="distribution" content="Brasil">
    <meta name="country" content="Brasil, BRA">
    <meta property="og:determiner" content="brasil">
    <meta property="og:locale" content="pt_BR">
    <meta name="robots" content="index,follow">
    <meta name="location" content="Anápolis,Goiás">
    <meta name="rating" content="General">
    <meta name="author" content="Teuto | Pfizer">
    <meta name="geo.position" content="GO">
    <meta name="geo.placename" content="Anápolis">
    <meta name="geo.region" content="br">
    <!-- Tags Facebook -->
    <meta property="og:title" content="{{ $websiteSettings['title'] }}" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:url" content="{{ \URL::current() }}" />
    <meta property="og:site_name" content="{{ $websiteSettings['title'] }}" />
    <meta property="og:image" content="{{ asset('assets/images/_upload/websiteSettings/'.$websiteSettings['avatar']) }}" />
    <meta property="og:description" content="{{ $websiteSettings['description'] }}" />

    @yield('head')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="header">
    <nav class="navigation">
        <ul class="pull-left hidden-xs">
            <li><a class="page-scroll" href="#quero-participar" title="Quero Participar">Quero Participar</a></li>
            <li><a class="page-scroll" href="#regulamento" title="Regulamento">Regulamento</a></li>
            <li><a class="page-scroll" href="#produtos" title="Produtos">Produtos</a></li>
            <br class="visible-sm">
            <li><a class="page-scroll" href="#premios" title="Prêmios">Prêmios</a></li>
            <li><a href="" data-toggle="modal" data-target=".winners" title="Ganhadores 2014/15">Ganhadores 2014/15</a></li>
            <li><a href="" data-toggle="modal" data-target=".contact-us" title="Fale Conosco">Fale Conosco</a></li>
        </ul>
        @if (!Auth::check('users'))
            <button class="btn btn-transparent hidden-xs pull-right" data-toggle="modal" data-target=".login">Fazer login</button>
        @else
            <div class="btn hidden-xs pull-right intranet">
                <ul class="intranet">
                    <li><a href="" data-toggle="modal" data-target=".my-data"  data-popover="true" data-content="Meus Dados" class="meus-dados">Meus Dados</a></li>
                    <li><a href="" data-toggle="modal" data-target=".my-moods"  data-popover="true" data-content="Minhas Frases" class="frases">Minhas Frases</a></li>
                    <li><a href="{{ action('Auth\AuthController@getLogout') }}" data-popover="true" data-content="Sair" class="sair">Sair</a></li>
                </ul>
            </div>
        @endif


        <select id="menu" class="input-transparent visible-xs">
            <option value="#">Menu...</option>
            <option data-type="1" value="#quero-participar">Quero Participar</option>
            <option data-type="1" value="#regulamento">Regulamento</option>
            <option data-type="1" value="#produtos">Produtos</option>
            <option data-type="1" value="#premios">Prêmios</option>
            <option data-type="2" value=".winners">Ganhadores 2014/15</option>
            <option data-type="2" value=".contact-us">Fale Conosco</option>

            <optgroup label="Área Restrita">
                @if (!Auth::check('users'))
                <option data-type="2" value=".login">Fazer Login</option>
                @else
                <option data-type="2" value=".my-data">Meus Dados</option>
                <option data-type="2" value=".my-moods">Minhas Frases</option>
                <option data-type="0" value="/sair">Sair</option>
                @endif
            </optgroup>
        </select>
    </nav>
    <div class="container">
        <section class="col-lg-2 col-md-2 hidden-sm hidden-xs text-center">
            <p class="text-white font-size-14 strong margin-top-20 margin-bottom-5">Compartilhe:</p>
            <ul class="social-network-header">
                @if($websiteSettings['facebook'] != "")
                <li><a href="{{ $websiteSettings['facebook'] }}" target="_blank" class="facebook" title="Facebook">facebook</a></li>
                @endif
                @if($websiteSettings['twitter'] != "")
                <li><a href="{{ $websiteSettings['twitter'] }}" target="_blank" class="twitter" title="Twitter">twitter</a></li>
                @endif
            </ul>
        </section>
        <section class="col-lg-6 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
            <h1 class="logo">Concurso Relax na Medida - 4ª Edição</h1>
        </section>

        <section class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
            <div class="phrases">
                <h3>
                    Faça o cadastro
                    e responda:
                </h3>
                <h4 class="lobster-two">
                    Porque a
                    melhor forma
                    de ficar relax
                    é com o Teuto?
                </h4>
                <h5>
                    {{ 'Você concorre
                    a 3 vales-viagem pra ficar
                    relax longe da rotina' }}
                </h5>
            </div>

            <div class="clear margin-top-75"></div>

            <div class="col-lg-6 col-md-6 col-sm-12 hidden-xs remove-padding-l margin-top-10">
                <a href="" class="btn btn-block btn-main" title="Como participar?">Como participar?</a>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 hidden-xs remove-padding-l margin-top-10">
                <a href="#quero-participar" class="btn btn-block btn-main" title="Quero Participar!">Quero Participar!</a>
            </div>
        </section>

        <section class="visible-xs col-xs-5 margin-top-10 home-buttons-xs">
            <div class="col-xs-12 remove-padding-l margin-top-10">
                <a href="" class="btn btn-block btn-main" title="Como participar?">Como<br class="line-break"> participar?</a>
            </div>

            <div class="col-xs-12 remove-padding-l margin-top-10">
                <a href="" class="btn btn-block btn-main" title="Quero Participar!">Quero<br class="line-break"> Participar!</a>
            </div>
        </section>

        <section class="col-lg-6 col-md-6 col-sm-8 col-xs-7 margin-top-20 image-home-woman">
            <img src="{{ asset('assets/images/image-home-woman.png') }}" class="img-responsive" alt="Concurso Relax na Medida - 4ª Edição">
        </section>
    </div>
</header><!-- /HEADER -->
<!-- Login -->
<div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close font-size-40 text-white" data-dismiss="modal" aria-label="Close"><span></span></button>
                <h4 class="modal-title margin-bottom-25 strong">Faça seu login</h4>
                <div class="horizontal-bar"></div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                        <div class="form-login">
                            <form name="form-register" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control input-main" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control input-main" placeholder="Senha">
                                </div>
                                <span class="text-brown forgot">Esqueci minha senha</span>
                                <button type="button" class="btn btn-main pull-right" title="Enviar">Enviar</button>
                            </form>
                        </div>
                        <div class="recover-password" style="display: none">
                            <form name="form-register" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control input-main" placeholder="Email">
                                </div>
                                <span class="text-brown back">Voltar</span>
                                <button type="button" class="btn btn-main pull-right" title="Enviar">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="horizontal-bar margin-top-25 margin-bottom-25"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Login -->

<!-- Contact-us -->
<div class="modal fade contact-us" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close font-size-40 text-white" data-dismiss="modal" aria-label="Close"><span></span></button>
                <h4 class="modal-title"></h4>
                <div class="horizontal-bar margin-top-50 margin-bottom-15"></div>
                <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                    <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Fale com a gente.</h2>
                    <h3 class="text-white font-size-36 lobster-two">Estamos prontos para ajudar você.</h3>
                </header>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                        <p class="font-size-18 strong">Deixe sua mensagem.</p>
                        <p class="font-size-18 strong">Respondemos rapidinho e você continua relax.</p>
                        <div class="horizontal-bar margin-top-25 margin-bottom-35"></div>
                    </div>
                    <form name="form-register" action="" method="post" enctype="multipart/form-data">
                        <div class="clear">
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control input-main" placeholder="Nome">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control input-main" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input name="phone" type="text" class="form-control input-main" placeholder="Telefone">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input name="Subject" type="text" class="form-control input-main" placeholder="Assunto">
                                </div>
                            </div>
                            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea name="message" rows="5" class="form-control input-main" placeholder="Mensagem"></textarea>
                                </div>
                                <span class="text-brown">Todos os campos são de preenchimento obrigatório</span>
                                <button type="button" class="btn btn-main pull-right" title="Enviar">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="horizontal-bar margin-top-50 margin-bottom-25"></div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Us -->
@if (Auth::check('users'))
<!-- My Data -->
<div class="modal fade my-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">x
                <button type="button" class="close font-size-40 text-white" data-dismiss="modal" aria-label="Close"><span></span></button>
                <h4 class="modal-title"></h4>
                <div class="horizontal-bar margin-top-50 margin-bottom-15"></div>
                <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                    <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Meus Dados</h2>
                    <h3 class="text-white font-size-36 lobster-two">para concorrer a uma super viagem.</h3>
                </header>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                        <div class="horizontal-bar margin-bottom-35"></div>
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-12 form-profile">
                        <span class="font-size-18 strong">Pessoal</span>
                        <div class="margin-top-30"></div>
                        {{ csrf_field() }}
                        <label for="name">
                            <strong>Nome:</strong>
                            <em id="name">{{ Auth::getUser('users')->name }} </em>
                            {!! Form::text('name', Auth::user('users')->name, ['id' => 'name', 'class' => 'input-main', 'placeholder' => 'Nome', 'maxlength' => '100', 'required' => 'required']) !!}
                        </label>
                        <label for="email">
                            <strong>Email:</strong>
                            <em id="email">{{ Auth::user('users')->email }}</em>
                            {!! Form::text('email', Auth::user('users')->email, ['id' => 'email', 'class' => 'input-main', 'placeholder' => 'E-mail', 'maxlength' => '100', 'required' => 'required']) !!}
                        </label>
                        <label for="phone">
                            <strong>Telefone:</strong>
                            <em id="phone">{{ Auth::user('users')->phone }}</em>
                            {!! Form::text('phone', Auth::user('users')->phone, ['id' => 'phone', 'class' => 'input-main', 'placeholder' => 'Telefone', 'maxlength' => '14', 'data-mask' => '(00) 0000-0000', 'required' => 'required']) !!}
                        </label>
                        <label for="mobile">
                            <strong>Celular:</strong>
                            <em id="mobile">{{ Auth::user('users')->mobile }}</em>
                            {!! Form::text('mobile', Auth::user('users')->mobile, ['id' => 'mobile', 'class' => 'input-main', 'placeholder' => 'Celular', 'maxlength' => '15', 'data-mask' => '(00) 0000-00009', 'required' => 'required']) !!}
                        </label>
                        <label for="gender">
                            <strong>Sexo:</strong>
                            <em id="gender">{{ Auth::getUser('users')->gender }}</em>
                            <select name="gender" id="gender" class="input-main" required="required">
                                <option value="Feminino" @if(Auth::getUser('users')->gender === 'Feminino'){{ 'selected' }}@endif>Feminino</option>
                                <option value="Masculino" @if(Auth::getUser('users')->gender === 'Masculino'){{ 'selected' }}@endif>Masculino</option>
                            </select>
                        </label>
                        <label for="birthDate">
                            <strong>Data de Nascimento:</strong>
                            <em id="birthDate">{{ Auth::getUser('users')->birthDate->format('d/m/Y') }}</em>
                            {!! Form::text('birthDate', Auth::getUser('users')->birthDate->format('d/m/Y'), ['id' => 'birthDate', 'placeholder' => 'dd/mm/aaaa', 'maxlength' => '10', 'data-mask' => '00/00/0000', 'required' => 'required']) !!}
                        </label>
                        <label for="cpf">
                            <strong>CPF:</strong>
                            <em id="cpf">{{ Auth::user('users')->cpf}}</em>
                            {!! Form::text('cpf', Auth::user('users')->cpf, ['id' => 'cpf', 'class' => 'input-main', 'placeholder' => 'XXX.XXX.XXX-XX', 'maxlength' => '14', 'data-mask' => '000.000.000-00', 'required' => 'required']) !!}
                        </label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-profile">
                        <span class="font-size-18 strong">Endereço</span>
                        <div class="margin-top-30"></div>
                        <label for="zipCode">
                            <strong>CEP:</strong>
                            <em id="zipCode">{{ Auth::user('users')->zipCode }}</em>
                            {!! Form::text('zipCode', Auth::user('users')->zipCode, ['id' => 'zipCode', 'class' => 'input-main', 'placeholder' => 'XXXXX-XXX', 'maxlength' => '9', 'data-mask' => '00000-000', 'required' => 'required']) !!}
                        </label>
                        <label for="address">
                            <strong>Endereço:</strong>
                            <em id="address">{{ Auth::user('users')->address }}</em>
                            {!! Form::text('address', Auth::user('users')->address, ['id' => 'address', 'class' => 'input-main', 'placeholder' => 'Endereço', 'maxlength' => '200', 'required' => 'required']) !!}
                        </label>
                        <label for="number">
                            <strong>Número:</strong>
                            <em id="number">{{ Auth::user('users')->number }}</em>
                            {!! Form::text('number', Auth::user('users')->number, ['id' => 'number', 'class' => 'input-main', 'placeholder' => 'nº', 'maxlength' => '20', 'required' => 'required']) !!}
                        </label>
                        <label for="unit">
                            <strong>Apto/Sala:</strong>
                            <em id="unit">{{ Auth::user('users')->unit }}</em>
                            {!! Form::text('unit', Auth::user('users')->unit, ['id' => 'unit', 'class' => 'input-main', 'placeholder' => '', 'maxlength' => '100']) !!}
                        </label>
                        <label for="district">
                            <strong>Bairro:</strong>
                            <em id="district">{{ Auth::user('users')->district }}</em>
                            {!! Form::text('district', Auth::user('users')->district, ['id' => 'district', 'class' => 'input-main', 'placeholder' => '', 'maxlength' => '100', 'required' => 'required']) !!}
                        </label>
                        <label for="complement">
                            <strong>Complemento:</strong>
                            <em id="complement">{{ Auth::user('users')->complement }}</em>
                            {!! Form::text('complement', Auth::user('users')->complement, ['id' => 'complement', 'class' => 'input-main', 'placeholder' => '', 'maxlength' => '100']) !!}
                        </label>
                        <label for="reference">
                            <strong>Referência:</strong>
                            <em id="reference">{{ "Abaixo da avenida 34" }}</em>
                            {!! Form::text('reference', "Abaixo da avenida 34", ['id' => 'reference', 'class' => 'input-main', 'placeholder' => '', 'maxlength' => '100']) !!}
                        </label>
                        <label for="state">
                            <strong>Estado:</strong>
                            <em id="state">{{ Auth::user('users')->state }}</em>
                            <?php
                                //STATES
                                $statesConsult = \App\Exceptions\Handler::readFile("states.json");
                                foreach($statesConsult as $state):
                                    $states[$state['uf']] = $state['uf'];
                                endforeach;
                            ?>
                            {!! Form::select('state', $states, Auth::user('users')->state, ['id' => 'state', 'class' => 'input-main', 'required' => 'required']) !!}
                        </label>
                        <label for="cityProfile">
                            <strong>Cidade:</strong>
                            <em id="cityProfile">{{ Auth::user('users')->city }}</em>
                            {!! Form::text('cityProfile', Auth::user('users')->city, ['id' => 'cityProfile', 'class' => 'input-main', 'maxlength' => '100', 'required' => 'required']) !!}
                        </label>
                    </div>
                </div>
                <div class="horizontal-bar margin-top-50 margin-bottom-25"></div>
            </div>
        </div>
    </div>
</div>
<!-- My Data -->

<!-- My Moods -->
<div class="modal fade my-moods" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close font-size-40 text-white" data-dismiss="modal" aria-label="Close"><span></span></button>
                <h4 class="modal-title"></h4>
                <div class="horizontal-bar margin-top-50 margin-bottom-15"></div>
                <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                    <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Minhas Frases</h2>
                    <h3 class="text-white font-size-36 lobster-two">que estão concorrendo à viagem dos meus sonhos.</h3>
                </header>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-4 col-md-8 col-md-offset-4 col-sm-8 col-sm-offset-3 col-xs-12">
                        <div class="tabbable font-size-18"> <!-- Only required for left/right tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab4" class="strong" data-toggle="tab">Nova Frase</a></li>
                                <li><a href="#tab5" class="strong" data-toggle="tab">Minhas Frases</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="horizontal-bar margin-top-50 margin-bottom-25"></div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab4">
                                <form name="form-register" action="" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                                    <p class="font-size-18">Cadastre quantas frases quiser e aumente suas chances. Só não se esqueça que, pra cada
                                        frase, você necessita de um novo cupom fiscal comprovando a compra de um dos
                                        produtos participantes da promoção.</p>
                                        <div class="form-group">
                                            <textarea name="message" rows="5" class="form-control input-main" placeholder="Mensagem"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12">
                                        <div class="form-group">
                                            <input type="file" class="form-control input-main"  accept="image/*" placeholder="Imagem cupom fiscal" />
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <button type="button" class="btn btn-main" title="Enviar">Cadastrar</button>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-11 col-xs-12">
                                        <label>* campos de preenchimento obrigatório.</label>
                                    </div>
                                </form>
                                <!-- Image Warning  -->
                                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 margin-top-45 warning">
                                    <b>Observações quanto a imagem:</b>
                                    <p>- Tem que estar nítida. / - Não pode estar borrada, suja ou sem legibilidade. / - Data do cupom tem
                                    que estar de acordo com o período da promoção. / -Após o cadastro de imagem do cupom fiscal e
                                    frase, os mesmos não poderão ser alterados.</p>
                                </div><!-- Image Warning -->
                            </div>

                            <div class="tab-pane" id="tab5">
                                @foreach(\Auth::user('users')->phrases as $phrase)
                                <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-12">
                                    <p>{{ $phrase->message }}</p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="strong">Imagem cupom fiscal:</label>
                                    <a href="/assets/_upload/cupons/{{ $phrase->receipt }}" target="_blank">
                                        <img src="{{ asset('/assets/images/coupon.png') }}" alt="Cupom Fiscal">
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 stats">
                                    @if($phrase->active)
                                    <label class="strong">Status de aprovação:</label>
                                    <div class="approval"><p>Aprovada</p></div>
                                    @else
                                    <label class="strong">Status de aprovação:</label>
                                    <div class="analysis"><p>Em análise</p></div>
                                    @endif
                                </div>
                                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12"><hr></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="horizontal-bar margin-top-40 margin-bottom-50"></div>
            </div>
        </div>
    </div>
<!-- My Moods -->
@endif

<!-- My Winners -->
<div class="modal fade winners" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close font-size-40 text-white" data-dismiss="modal" aria-label="Close"><span></span></button>
                <h4 class="modal-title"></h4>
                <div class="horizontal-bar margin-top-50 margin-bottom-15"></div>
                <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                    <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Ganhadores</h2>
                    <h3 class="text-white font-size-36 lobster-two">Conheça os vencedores das edições anteriores..</h3>
                </header>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <p class="font-size-22 strong vacation">
                            O Laboratório Teuto acompanhou as viagens inesqueciveis dos
                            vencedores pra você conferir de perto.
                        </p>

                    </div>
                    <div class="col-lg-7 col-lg-offset-5 col-md-7 col-md-offset-5 col-sm-7 col-sm-offset-4 col-xs-12">
                        <div class="tabbable font-size-18"> <!-- Only required for left/right tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab6" class="font-size-27 strong" data-toggle="tab">2015</a></li>
                                <li><a href="#tab7" class="font-size-27 strong" data-toggle="tab">2014</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="horizontal-bar margin-top-30 margin-bottom-20"></div></div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab6">
                            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 col-sm-offset-4 col-xs-12">
                                <h2 class="text-orange text-uppercase font-size-36 strong">1° Lugar</h2>
                                <h2 class="text-orange text-uppercase font-size-20 strong">Feira de Santana - Ba Resort vila galé</h2>
                                <p class="strong font-size-12">Mais que um "Relax na Medida",
                                    uma das maiores experiências
                                    da minha vida! Muito obrigado
                                    Laboratório Teuto!</p>
                                <p class="strong font-size-12">Fabrício Antunes</p>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <img src="{{ asset('assets/images/winners.png') }}" class="img-responsive">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="horizontal-bar margin-top-30 margin-bottom-20"></div></div>

                            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 col-sm-offset-4 col-xs-12">
                                <h2 class="text-orange text-uppercase font-size-36 strong">2° Lugar</h2>
                                <h2 class="text-orange text-uppercase font-size-20 strong">Salvador - Ba Resort vila galé</h2>
                                <p class="strong font-size-12">Mais que um "Relax na Medida",
                                    uma das maiores experiências
                                    da minha vida! Muito obrigado
                                    Laboratório Teuto!</p>
                                <p class="strong font-size-12">Fabrício Antunes</p>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <img src="{{ asset('assets/images/winners.png') }}" class="img-responsive">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="horizontal-bar margin-top-30 margin-bottom-20"></div></div>

                            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 col-sm-offset-4 col-xs-12">
                                <h2 class="text-orange text-uppercase font-size-36 strong">3° Lugar</h2>
                                <h2 class="text-orange text-uppercase font-size-20 strong">Salvador - Ba Resort vila galé</h2>
                                <p class="strong font-size-12">Mais que um "Relax na Medida",
                                    uma das maiores experiências
                                    da minha vida! Muito obrigado
                                    Laboratório Teuto!</p>
                                <p class="strong font-size-12">Fabrício Antunes</p>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <img src="{{ asset('assets/images/winners.png') }}" class="img-responsive">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="horizontal-bar margin-top-30 margin-bottom-20"></div></div>
                        </div>
                        <div class="tab-pane" id="tab7">
                            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 col-sm-offset-4 col-xs-12">
                                <h2 class="text-orange text-uppercase font-size-36 strong">1° Lugar</h2>
                                <h2 class="text-orange text-uppercase font-size-20 strong">Salvador - Ba Resort vila galé</h2>
                                <p class="strong font-size-12">Mais que um "Relax na Medida",
                                    uma das maiores experiências
                                    da minha vida! Muito obrigado
                                    Laboratório Teuto!</p>
                                <p class="strong font-size-12">Fabrício Antunes</p>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <img src="{{ asset('assets/images/winners.png') }}" class="img-responsive">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="horizontal-bar margin-top-30 margin-bottom-20"></div></div>

                            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 col-sm-offset-4 col-xs-12">
                                <h2 class="text-orange text-uppercase font-size-36 strong">2° Lugar</h2>
                                <h2 class="text-orange text-uppercase font-size-20 strong">Salvador - Ba Resort vila galé</h2>
                                <p class="strong font-size-12">Mais que um "Relax na Medida",
                                    uma das maiores experiências
                                    da minha vida! Muito obrigado
                                    Laboratório Teuto!</p>
                                <p class="strong font-size-12">Fabrício Antunes</p>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <img src="{{ asset('assets/images/winners.png') }}" class="img-responsive">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="horizontal-bar margin-top-30 margin-bottom-20"></div></div>

                            <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
                                <h2 class="text-orange text-uppercase font-size-36 strong">3° Lugar</h2>
                                <h2 class="text-orange text-uppercase font-size-20 strong">Salvador - Ba Resort vila galé</h2>
                                <p class="strong font-size-12">Mais que um "Relax na Medida",
                                    uma das maiores experiências
                                    da minha vida! Muito obrigado
                                    Laboratório Teuto!</p>
                                <p class="strong font-size-12">Fabrício Antunes</p>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <img src="{{ asset('assets/images/winners.png') }}" class="img-responsive">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="horizontal-bar margin-top-30 margin-bottom-20"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Winners -->


<!-- PARA PARTICIPAR -->
<section id="para-participar" class="for-participate">
    <article class="container">
        <div class="horizontal-bar margin-top-75 margin-bottom-20"></div>
        <header class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 title">
            <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Para Participar</h2>
            <h3 class="text-white font-size-36 lobster-two">e só seguir os passos</h3>
        </header>
    </article>
    <article class="container">
        <div class="margin-top-40 margin-bottom-30"></div>
        <!-- Step 01 -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div id="carousel-example-generic" class="carousel slide products" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('assets/images/_upload/products/A-Z-Small.png') }}" alt="A-Z-Small">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/BioSoak-Small.png') }}" alt="BioSoakBig">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/Cicatriderm-Small.png') }}" alt="Cicatriderm-Small">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/MaxAir-Small.png') }}" alt="MaxAir-Small">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/Segurdent-Small.png') }}" alt="Segurdent-Small">
                    </div>
                </div>
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                </ol>

            <div class="margin-top-40 margin-bottom-30"></div>
        </div>
            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">1° Passo</h2>
            <p class="font-size-16">É fácil. Basta comprar um dos produtos:
                Max Air, Biosoak (480ml), Cicatriderm, A-Z polivitamínico e ou Linha Segurdent.</p>
        </div><!-- Step 01 -->

        <!-- Step 02 -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="{{ asset('assets/images/step-2.png') }}" class="img-responsive">
            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">2° Passo</h2>
            <p class="font-size-16">Leia o regulamento, preencha
                corretamente o formulário de participação e
                depois confirme seu cadastro no seu
                e-mail.</p>
        </div> <!-- Step 02  -->
        <!-- Step 03 -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="{{ asset('assets/images/step-3.png') }}" class="img-responsive">
            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">3° Passo</h2>
            <p class="font-size-16">Por último, cadastre a foto do cupom fiscal
                e responda à pergunta "Por que a melhor
                forma de ficar relax é com o Teuto?".
                Depois é só torcer.</p>
        </div><!-- Step 03 -->

        <!-- Image Warning  -->
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 margin-top-50 margin-bottom-50 warning">
            Guarde bem o cupom fiscal até o fim do concurso. Você vai precisar dele para retirar o prêmio se for
            um dos vencedores. Todas as respostas cadastradas serão avaliadas conforme critérios do
            regulamento. Cada usuário poderá se cadastrar uma única vez neste concurso.
        </div><!-- Image Warning -->

    </article>
</section><!-- /PARA PARTICIPAR -->
<section id="quero-participar" class="i-want-participate padding-top-150">
    <article class="container">
        <div class="horizontal-bar margin-bottom-20"></div>
        <header class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 title">
            <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Quero Participar</h2>
            <h3 class="text-white font-size-36 lobster-two">e concorrer a viagem dos sonhos.</h3>
        </header>

        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 margin-top-45 margin-bottom-35 font-size-18">
            Preencha corretamente o cadastro de participação. Tudo preenchido e enviado, vá até o seu e-mail e confirme sua
            inscrição. Faça seu login, envie uma foto do cupom fiscal dos produtos Teuto participantes e responda à pergunta
            "Por que a melhor forma de ficar relax é com o Teuto?". Os autores das 3 melhores respostas serão premiados com
            um vale-viagem cada um.
        </div>

        <div class="margin-top-35 margin-bottom-115">
            <div class="tabs"> <!-- Only required for left/right tabs -->
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs lobster-two">
                        <li class="active"><a id="personal-data">Dados Pessoais</a></li>
                        <li><a id="address">Endereço</a></li>
                        <li><a id="conclusion">Conclusão</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <form id="form-register" name="form-register" action="" method="post" enctype="multipart/form-data">
                            <div class="clear margin-top-35">
                                <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control input-main" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control input-main" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input name="telephone" type="tel" class="form-control input-main" data-mask="(00) 0000-0000" placeholder="Telefone">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input name="mobile" type="tel" class="form-control input-main" data-mask="(00) 0000-00000" placeholder="Telefone Celular">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 padding-top-5">
                                    <div class="clear margin-bottom-15">
                                        <label class="pull-left">Sexo:</label>
                                        <label class="pull-left radio-main">
                                            <input type="radio" name="gender" value="Masculino"> Masculino
                                        </label>
                                        <label class="pull-left radio-main">
                                            <input type="radio" name="gender" value="Feminino"> Feminino
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="clear">
                                <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input name="birthDate" type="date" class="form-control input-main" data-mask="00/00/0000" placeholder="Data de Nascimento">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input name="cpf" type="text" class="form-control input-main" data-mask="000.000.000-00" placeholder="CPF">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 padding-top-5">
                                    <div class="clear margin-bottom-15">
                                        <label class="checkbox-main pull-left padding-top-5 padding-right-5">
                                            <input name="governmental" type="checkbox" class="margin-left-0" value="authority"> Você é autoridade governamental?
                                        </label>
                                        <a href="javascript:void('');" class="question-tooltip padding-top-5 pull-left" onmouseover="Tip('Autoridade Governamental &eacute; (i) Qualquer autoridade governamental eleita ou indicada; (ii) Qualquer empregado ou outra pessoa atuando em nome ou favor de autoridade governamental, &oacute;rg&atilde;o p&uacute;blico ou empreendimento que exer&ccedil;a fun&ccedil;&otilde;es governamentais; (iii) Qualquer funcion&aacute;rio de partido pol&iacute;tico, seus empregados ou outras pessoas atuando em nome ou favor de partido pol&iacute;tico ou candidato a cargos p&uacute;blicos; (iv) Qualquer empregado ou pessoa que atue em nome ou favor de organiza&ccedil;&atilde;o p&uacute;blica internacional; (v) Qualquer outra pessoa que de outra forma se enquadre no conceito de autoridade governamental nos termos da legisla&ccedil;&atilde;o local; e (vi) Quaisquer m&eacute;dicos empregados por hospitais, cl&iacute;nicas ou outros institutos p&uacute;blicos ou sob controle governamental.')" onmouseout="UnTip()">( ? )</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clear">
                                <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control input-main" placeholder="Senha">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input name="passwordConfirm" type="password" class="form-control input-main" placeholder="Confirmar Senha">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-right">
                                    <button type="button" id="nextStep" class="btn btn-main" title="Próximo passo">Próximo passo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form name="form-register" action="" method="post" enctype="multipart/form-data">
                            <div class="clear margin-top-35">
                                <div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-xs-8">
                                    <div class="form-group">
                                        <input name="zipcode" type="text" maxlength="5" class="form-control input-main" data-mask="00000-000" placeholder="Cep">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4">
                                    <div class="form-group">
                                        <input name="tdp" type="text" maxlength="3" class="form-control input-main">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                                    <div class="form-group">
                                        <input name="address" type="text" class="form-control input-main" placeholder="Endereço">
                                    </div>
                                </div>
                            </div>
                            <div class="clear">
                                <div class="col-lg-3 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-5 col-xs-12">
                                    <div class="form-group pull-left size-45">
                                        <input name="number" type="text" class="form-control input-main" maxlength="5" placeholder="Número">
                                    </div>
                                    <div class="form-group pull-right size-45">
                                        <input name="room" type="text" class="form-control input-main" maxlength="3" placeholder="Apto-Sala">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <input name="district" type="text" class="form-control input-main" placeholder="Bairro">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <input name="complement" type="text" class="form-control input-main" placeholder="Complemento">
                                    </div>
                                </div>
                            </div>
                            <div class="clear">
                                <div class="col-lg-3 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <input name="reference" type="text" class="form-control input-main" placeholder="Referência">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <?php
                                            //STATES
                                            $statesConsult = \App\Exceptions\Handler::readFile("states.json");
                                            foreach($statesConsult as $state):
                                                $states[$state['uf']] = $state['uf'];
                                            endforeach;
                                        ?>
                                        {!! Form::select('state', $states, '', ['class' => 'form-control input-main text-light-brown', 'required' => 'required']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <select class="form-control input-main text-light-brown">
                                            <option value="" selected>Cidade</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
                                    <div class="form-group pull-right">
                                        {{--<a href="#tab2" id="nextStep" class="btn btn-main" data-toggle="tab" title="Próximo Passo">Próximo passo</a>--}}
                                        <button type="button" id="nextStep2" class="btn btn-main" title="Próximo passo">Próximo passo</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <div class="horizontal-bar margin-top-60 margin-bottom-30"></div>
                        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 font-size-18 checked">
                            Pronto. Seu cadastro foi realizado com sucesso. Agora basta acessar seu
                            e-mail e efetuar a confirmação. Depois é só inscrever sua frase no concurso e
                            torcer para ser um dos ganhadores. Esperamos que você, em breve, esteja
                            fazendo as malas pra curtir um dos três destinos. Boa Sorte!

                            <div class="horizontal-bar margin-top-40"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
<section id="regulamento" class="regulament margin-bottom-30">
    <article class="container">
        <div class="horizontal-bar margin-bottom-20"></div>
        <header class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 title">
            <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Regulamento</h2>
            <h3 class="text-white font-size-36 lobster-two">Leia e entenda como funciona.</h3>
        </header>
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 margin-top-70">
            <div class="well margin-bottom-120">
                <p>
                <b>a) Razão social da pessoa jurídica requerente: </b>Laboratório Teuto Brasileiro S/A, localizada a Avenida VP 7 D,
                Módulo 11, Quadra 13, DAIA, Anápolis/GO<br>
                <b>b) Logomarca da pessoa jurídica requerente</b><br>
                Uma imagem vai aqui <br>
                <b>c) CNPJ/MF: 17.159.229/0001-76</b><br>
                <b>d) Data de início e de término da promoção comercial:</b> 27/12/2013 A 27/03/2014<br>
                <b>e) Período de participação:</b> 27/12/2013 A 07/03/2014<br>
                <b>f) Descrição das condições de participação:<br><br>

                    - Descrição detalhada da operação</b><br><br><br>


                    1.1 Este concurso é válido para pessoas fisicas, residentes e domiciliadas no território nacional, maiores de 18
                anos, desde que não se enquadre no conceito de autoridade governamental<br><br>


                Autoridade Governamental significa: (i) qualquer autoridade governamental eleita ou indicada, (ii) qualquer
                empregado ou outra pessoa atuando em nome ou favor de autoridade governamental, órgão público ou
                empreendimento que exerça funções governamentais; (iii) qualquer funcionário de partido político, seus
                empregados ou outras pessoas atuando em nome ou favor de partido político ou candidato a cargos públicos; (iv)
                qualquer empregado ou pessoa que atue em nome ou favor de organização pública internacional; (v) qualquer
                outra pessoa que de outra forma se enquadre no conceito de autoridade governamental nos termos da legislação
                local; e (vi) quaisquer médicos empregados por hospitais, clínicas ou outros institutos públicos ou sob controle
                governamental. A expressão "governamental" abrangerá todos os níveis e instâncias de governos no Brasil (ou
                seja, órgãos executivos, legistativos ou judiciários em instância local, regional ou nacional). É preciso ter em mente
                    <br><br><br>

                continua...

                    <br><br><br>
                Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos,
                suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock,
                um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim,
                consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações da palavra na literatura
                clássica, descobriu a sua indubitável origem. Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do "de Finibus Bonorum
                et Malorum" (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC. Este livro é um tratado de teoria da ética
                muito popular na época da Renascença. A primeira linha de Lorem Ipsum, "Lorem Ipsum dolor sit amet..." vem de
                uma linha na seção 1.10.32.

                O trecho padrão original de Lorem Ipsum, usado desde o século XVI, está reproduzido abaixo para os interessados.
                Seções 1.10.32 e 1.10.33 de "de Finibus Bonorum et Malorum" de Cicero também foram reproduzidas abaixo em sua
                forma exata original, acompanhada das versões para o inglês da tradução feita por H. Rackham em 1914.

                Existem muitas variações disponíveis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteração,
                seja por inserção de passagens com humor, ou palavras aleatórias que não parecem nem um pouco convincentes.
                Se você pretende usar uma passagem de Lorem Ipsum, precisa ter certeza de que não há algo embaraçoso escrito
                escondido no meio do texto. Todos os geradores de Lorem Ipsum na internet tendem a repetir pedaços predefinidos
                conforme necessário, fazendo deste o primeiro gerador de Lorem Ipsum autêntico da internet. Ele usa um dicionário
                com mais de 200 palavras em Latim combinado com um punhado de modelos de estrutura de frases para gerar um
                Lorem Ipsum com aparência razoável, livre de repetições, inserções de humor, palavras não características, etc.

                </p>
            </div>
        </div>
    </article>
</section>
<section id="produtos" class="products-partners">
    <article class="container">
        <div class="horizontal-bar margin-top-30 margin-bottom-20"></div>
        <header class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 margin-bottom-35 title">
            <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Produtos participantes</h2>
            <h3 class="text-white font-size-36 lobster-two">Pra você participar.</h3>
        </header>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="carousel-2" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="col-lg-4 col-lg-offset-6 col-md-4 col-md-offset-6 col-sm-12 col-xs-12 description-products">
                            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">Segurdent</h2>
                            <p class="font-size-16">
                                É ideal para o seu conforto, com duração de
                                até 12 horas. O fixador impede a passagem
                                de partículas e é de fácil aplicação, basta
                                aplicar o produto sobre a dentadura limpa e
                                úmida e em seguida introduzir a dentadura
                                na boca, pressionando por alguns segundos.
                                </p>
                        </div>
                        <img src="{{ asset('assets/images/_upload/products/Segurdent-Big.png') }}" alt="Segurdent-Big">
                    </div>
                    <div class="item">
                        <div class="col-lg-4 col-lg-offset-6 col-md-4 col-md-offset-6 col-sm-12 col-xs-12 description-products">
                            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">Segurdent</h2>
                            <p class="font-size-16">
                                É ideal para o seu conforto, com duração de
                                até 12 horas. O fixador impede a passagem
                                de partículas e é de fácil aplicação, basta
                                aplicar o produto sobre a dentadura limpa e
                                úmida e em seguida introduzir a dentadura
                                na boca, pressionando por alguns segundos.
                            </p>
                        </div>
                        <img src="{{ asset('assets/images/_upload/products/BioSoak-Big.png') }}" alt="BioSoakBig">
                    </div>
                    <div class="item">
                        <div class="col-lg-4 col-lg-offset-6 col-md-4 col-md-offset-6 col-sm-12 col-xs-12 description-products">
                            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">Segurdent</h2>
                            <p class="font-size-16">
                                É ideal para o seu conforto, com duração de
                                até 12 horas. O fixador impede a passagem
                                de partículas e é de fácil aplicação, basta
                                aplicar o produto sobre a dentadura limpa e
                                úmida e em seguida introduzir a dentadura
                                na boca, pressionando por alguns segundos.
                            </p>
                        </div>
                        <img src="{{ asset('assets/images/_upload/products/Cicatriderm-Big.png') }}" alt="Cicatriderm-Big">
                    </div>
                    <div class="item">
                        <div class="col-lg-4 col-lg-offset-6 col-md-4 col-md-offset-6 col-sm-12 col-xs-12 description-products">
                            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">Segurdent</h2>
                            <p class="font-size-16">
                                É ideal para o seu conforto, com duração de
                                até 12 horas. O fixador impede a passagem
                                de partículas e é de fácil aplicação, basta
                                aplicar o produto sobre a dentadura limpa e
                                úmida e em seguida introduzir a dentadura
                                na boca, pressionando por alguns segundos.
                            </p>
                        </div>
                        <img src="{{ asset('assets/images/_upload/products/MaxAir-Big.png') }}" alt="MaxAir-Big">
                    </div>
                    <div class="item">
                        <div class="col-lg-4 col-lg-offset-6 col-md-4 col-md-offset-6 col-sm-12 col-xs-12 description-products">
                            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">Segurdent</h2>
                            <p class="font-size-16">
                                É ideal para o seu conforto, com duração de
                                até 12 horas. O fixador impede a passagem
                                de partículas e é de fácil aplicação, basta
                                aplicar o produto sobre a dentadura limpa e
                                úmida e em seguida introduzir a dentadura
                                na boca, pressionando por alguns segundos.
                            </p>
                        </div>
                        <img src="{{ asset('assets/images/_upload/products/A-Z-Big.png') }}" alt="A-Z-Big">
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control hidden-xs" href="#carousel-2" role="button" data-slide="prev">
                    <div class="arrow-left"><div class="arrow-left-icon"></div></div>
                </a>
                <a class="right carousel-control hidden-xs" href="#carousel-2" role="button" data-slide="next">
                    <div class="arrow-right"><div class="arrow-right-icon"></div></div>
                </a>
            </div>
        </div>
    </article>
</section>
<section id="premios" class="awards">
    <article class="container">
        <div class="horizontal-bar margin-top-75 margin-bottom-20"></div>
        <header class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 title">
            <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Prêmios na medida para você.</h2>
            <h3 class="text-white font-size-36 lobster-two">E você escolhe o destino.</h3>
        </header>

        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
            <h2 class="text-uppercase font-size-24 strong padding-top-10 margin-bottom-50">Sua chance de viajar acompanhado para onde quiser.</h2>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="{{ asset('assets/images/awards-1.png') }}" class="img-responsive">
            <p class="margin-top-50">VALE-VIAGEM NO VALOR DE:</p>
            <h2 class="text-orange text-uppercase font-size-36 strong margin-top-0">R$ 7.000,00*</h2>
            <p class="font-size-15">
                OS vouchers não são cumulativos, além disso os
                ganhadores não poderão transferir o prêmio em
                hipótese alguma. Esse prêmio será negociado com a
                agência de turismo conveniada.
            </p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="{{ asset('assets/images/awards-2.png') }}" class="img-responsive">
            <p class="margin-top-50">VALE-VIAGEM NO VALOR DE:</p>
            <h2 class="text-orange text-uppercase font-size-36 strong margin-top-0">R$ 5.000,00*</h2>
            <p class="font-size-15">
                OS vouchers não são cumulativos, além disso os
                ganhadores não poderão transferir o prêmio em
                hipótese alguma. Esse prêmio será negociado com a
                agência de turismo conveniada.
            </p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="{{ asset('assets/images/awards-3.png') }}" class="img-responsive">
            <p class="margin-top-50">VALE-VIAGEM NO VALOR DE:</p>
            <h2 class="text-orange text-uppercase font-size-36 strong margin-top-0">R$ 3.000,00*</h2>
            <p class="font-size-15">
                OS vouchers não são cumulativos, além disso os
                ganhadores não poderão transferir o prêmio em
                hipótese alguma. Esse prêmio será negociado com a
                agência de turismo conveniada.
            </p>
        </div>
        <!-- Image Warning  -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-50 margin-bottom-85 warning">
            Este concurso é válido para pessoas físicas, residentes e domiciliadas no território nacional, maiores de 18 anos desde que não se enquadre no conceito de
            autoridade governamental. O participantes terá quantas chances quiser para participar da promoção, estando cada participação condicionada ao envio do cupom
            fiscal de forma legível comprovando a compra dos produtos participantes, onde cada produto equivale a 1 (um) direto de resposta. Só será permitido 01 (um)
            único cadastro de participante por CPF, as atividades do participante deverá ser efetuada sob o regime de senha e login, havendo a possibilidade de ilimitadas
            participações no concurso. Veja todo o regulamento no menu "Regulamento".
        </div><!-- Image Warning -->
    </article>
</section>
<div class="bg-wood"></div>
<section class="footer">
    <article class="container">
        <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 padding-top-25 padding-bottom-35 realization">
            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-3 follow">
                <p class="visible-lg text-white font-size-12 strong">Acompanhe essa e outras novidades pelas nossas redes:</p>
                <ul class="social-network">
                    @if($websiteSettings['facebook'] != "")
                        <li><a href="{{ $websiteSettings['facebook'] }}" target="_blank" class="facebook" title="Facebook">facebook</a></li>
                    @endif
                    @if($websiteSettings['instagram'] != "")
                        <li><a href="{{ $websiteSettings['instagram'] }}" target="_blank" class="instagram" title="Instagram">instagram</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-4 col-xs-5">
                <p class="text-white font-size-12 strong">Parceria</p>
                <a target="_blank" href="{{ $websiteSettings['partner'] }}">
                    <div class="partners"></div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                <p class="text-white font-size-12 strong">Realização</p>
                <a  target="_blank" href="{{ $websiteSettings['teuto'] }}">
                    <div class="logo"></div>
                </a>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 font-size-12 margin-bottom-35 box">
            {{ $websiteSettings['certificate'] }}
        </div>
    </article>
</section>
<link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}" />
<link rel="stylesheet" href="{!! asset('assets/css/main.css') !!}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic" />
<script type="text/javascript" src="{!! asset('assets/js/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/main.min.js') !!}"></script>
@if(Session::has('message'))
<script>
alert('{!! Session::get('message') !!}');
</script>
@endif
@yield('javascript')
</body>
</html>