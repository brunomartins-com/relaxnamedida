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
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div id="carousel-example-generic" class="carousel slide products" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('assets/images/_upload/products/A-Z-Small.png') }}" alt="A-Z-Small">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/A-Z-Big.png') }}" alt="A-Z-Big">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/BioSoak-Big.png') }}" alt="BioSoakBig">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/BioSoak-Small.png') }}" alt="BioSoakBig">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/Cicatriderm-Big.png') }}" alt="Cicatriderm-Big">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/Cicatriderm-Small.png') }}" alt="Cicatriderm-Small">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/MaxAir-Big.png') }}" alt="MaxAir-Big">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/MaxAir-Small.png') }}" alt="MaxAir-Small">
                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/images/_upload/products/Segurdent-Big.png') }}" alt="Segurdent-Big">
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
                    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="7"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="8"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="9"></li>
                </ol>
            </div>
            <div class="margin-top-40 margin-bottom-30">


            </div>

            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">1° Passo</h2>
            <p class="font-size-16">É fácil. Basta comprar um dos produtos:
                Max Air, Biosoak (480ml), Cicatriderm, A-Z polivitamínico e ou Linha Segurdent.</p>
        </div> <!-- Step 01 -->
        <!-- Step 02 -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img src="{{ asset('assets/images/step-2.png') }}" class="img-responsive">
            <h2 class="text-orange text-uppercase font-size-36 strong padding-top-10">2° Passo</h2>
            <p class="font-size-16">Leia o regulamento, preencha
                corretamente o formulário de participação e
                depois confirme seu cadastro no seu
                e-mail.</p>
        </div> <!-- Step 02 -->
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
            um dos venedores. Todas as respostas cadastradas serão avaliadas conforme critérios do
            regulamento. Cada usuário poderá se cadastrar uma única vez neste concurso.
        </div><!-- Image Warning -->

    </article>
</section><!-- /PARA PARTICIPAR -->
<section class="for-regulament padding-top-150">
    <article class="container">
        <div class="horizontal-bar margin-bottom-20"></div>
        <header class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 title">
            <h2 class="text-yellow text-uppercase font-size-36 strong padding-top-10">Quero Participar</h2>
            <h3 class="text-white font-size-36 lobster-two">e concorrer a viagem dos sonhos.</h3>
        </header>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-45 margin-bottom-35 font-size-18">
            Preencha corretamente o cadastro de participação. Tudo preenchido e enviado, vá até o seu e-mail e confirme sua
            inscrição. Faça seu login, envie uma foto do cupom fiscal dos produtos Teuto participantes e responda à pergunta
            "Por que a melhor forma de ficar relax é com o Teuto?". Os autores das 3 melhores respostas serão premiados com
            um vale-viagem cada um.
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-35 margin-bottom-35">
            <div class="tabbable participation"> <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs lobster-two font-size-36">
                    <li class="active"><a href="#tab1" data-toggle="tab">Dados Pessoais</a></li>
                    <li><a href="#tab2" data-toggle="tab">Endereço</a></li>
                    <li><a href="#tab3" data-toggle="tab">Conclusão</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                    <form>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-35 font-size-18">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Telefone">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Telefone Celular">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label>Sexo:</label>
                                <label for="male" class="radio-inline">
                                    <input type="radio" name="male" id="male" value="masculino"> Masculino
                                </label>
                                <label for="female" class="radio-inline">
                                    <input type="radio" name="female" id="female" value="feminino"> Feminino
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 font-size-18">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Data de Nascimento">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="CPF">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="authority"> Você é autoridade governamental?
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 font-size-18">
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirmar Senha">
                                </div>
                            </div>
                            <div class="col-lg-4 col-lg-offset-2 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <button class="btn-main" title="Avançar">Próximo Passo</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <p>Aguardando conteúdo na seção 02</p>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <p>Aguardando conteúdo na seção 03</p>
                    </div>
                </div>
            </div>
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

$('.carousel').carousel();
</script>
@endif
@yield('javascript')
</body>
</html>