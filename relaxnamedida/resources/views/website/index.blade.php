@if($websiteSettings['websiteOk'] == 0 and !Auth::check())
{!! view('website.teaser')->with(compact('page', 'websiteSettings')) !!}
{{ die }}
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

</head>
<body>
<header class="header">
    <nav class="navigation">
        <ul class="pull-left hidden-xs">
            <li><a href="">Quero Participar</a></li>
            <li><a href="">Regulamento</a></li>
            <li><a href="">Produtos</a></li>
            <br class="visible-sm">
            <li><a href="">Prêmios</a></li>
            <li><a href="">Ganhadores 2014/15</a></li>
            <li><a href="">Fale Conosco</a></li>
        </ul>
        <button class="btn btn-transparent hidden-xs pull-right">Fazer login</button>
        <select class="input-transparent visible-xs">
            <option value="">Menu...</option>
            <option value="">Quero Participar</option>
            <option value="">Regulamento</option>
            <option value="">Produtos</option>
            <option value="">Prêmios</option>
            <option value="">Ganhadores 2014/15</option>
            <option value="">Fale Conosco</option>

            <optgroup label="Área Restrita">
                <option value="">Fazer Login</option>
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
                    Você concorre
                    a 3 vales-viagem pra ficar
                    relax longe da rotina
                </h5>
            </div>

            <div class="clear margin-top-75"></div>

            <div class="col-lg-6 col-md-6 col-sm-12 hidden-xs remove-padding-l margin-top-10">
                <a href="" class="btn btn-block btn-main" title="Como participar?">Como participar?</a>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 hidden-xs remove-padding-l margin-top-10">
                <a href="" class="btn btn-block btn-main" title="Quero Participar!">Quero Participar!</a>
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

<!-- PARA PARTICIPAR -->
<section class="for-participate">
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
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <img src="{{ asset('assets/images/step-2.png') }}" class="img-responsive">
            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">1° Passo</h2>
            <p class="text-black font-size-16">É fácil. Basta comprar um dos produtos:
                Max Air, Biosoak (480ml), Cicatriderm, A-Z polivitamínico e ou Linha Segurdent.</p>
        </div> <!-- Step 01 -->
        <!-- Step 02 -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <img src="{{ asset('assets/images/step-2.png') }}" class="img-responsive">
            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">2° Passo</h2>
            <p class="text-black font-size-16">Leia o regulamento, preencha
                corretamente o formulário de participação e
                depois confirme seu cadastro no seu
                e-mail.</p>
        </div> <!-- Step 02 -->
        <!-- Step 03 -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <img src="{{ asset('assets/images/step-3.png') }}" class="img-responsive">
            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">3° Passo</h2>
            <p class="text-black font-size-16">Por último, cadastre a foto do cupom fiscal
            e responda à pergunta "Por que a melhor
            forma de ficar relax é com o Teuto?".
            Depois é só torcer.</p>
        </div><!-- Step 03 -->
        {{--<div class="col-lg-10 col-md-10 col-sm-12 col-xs9 margin-top-50 margin-bottom-50">--}}
            {{--<!-- Image Warning  -->--}}
            {{--<div class="col-lg-2 col-lg-offset-1 col-md-2 col-sm-2 col-xs-3">--}}
                {{--<div class="warning"></div>--}}
            {{--</div><!-- Image Warning -->--}}
            {{--<p class="text-black font-size-14">--}}
                {{--Guarde bem o cupom fiscal até o fim do concurso. Você vai precisar dele para retirar o prêmio se for--}}
                {{--um dos venedores. Todas as respostas cadastradas serão avaliadas conforme critérios do--}}
                {{--regulamento. Cada usuário poderá se cadastrar uma única vez neste concurso.--}}
            {{--</p>--}}
        {{--</div>--}}

        <div class="col-lg-10 col-md-10 col-sm-12 col-xs9 margin-top-50 margin-bottom-50">
            <!-- Image Warning  -->
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 warning">
                <p class="text-black font-size-14">
                    Guarde bem o cupom fiscal até o fim do concurso. Você vai precisar dele para retirar o prêmio se for
                    um dos venedores. Todas as respostas cadastradas serão avaliadas conforme critérios do
                    regulamento. Cada usuário poderá se cadastrar uma única vez neste concurso.
                </p>
            </div><!-- Image Warning -->
        </div>

    </article>
</section><!-- /PARA PARTICIPAR -->
<section class="for-regulament padding-top-150">
    <article class="container">
        <div class="horizontal-bar margin-bottom-20"></div>
        <header class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 title">
            <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Quero Participar</h2>
            <h3 class="text-white font-size-36 lobster-two">e concorrer a viagem dos sonhos.</h3>
        </header>
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