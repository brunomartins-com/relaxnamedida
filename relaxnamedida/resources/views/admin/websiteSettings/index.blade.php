@extends('admin.sidebar-template')

@section('title', 'Dados do Site | ')

@section('page-content')
@parent
<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Dados do Site <small></small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Dados do Site</li>
                    <li>Editar</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header bg-gray-darker text-white">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    </li>
                </ul>
                <h3 class="block-title">Editar</h3>
            </div>
            <div class="block-content">
                @if (Session::has('success'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {!! Session::get('success') !!}
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif
                <!-- .block-content -->
                <div class="block-content block-content-full">
                    {!! Form::open([
                            'id' => 'websiteSettings',
                            'method' => 'post',
                            'class' => 'form-horizontal push-20-t',
                            'enctype' => 'multipart/form-data'
                            ])
                    !!}

                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('title', 'Título *') !!}
                                {!! Form::text('title', $websiteSettings->title, ['class'=>'form-control', 'id'=>'title', 'maxlength'=>100]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('description', 'Descrição (SEO) *') !!}
                                {!! Form::text('description', $websiteSettings->description, ['class'=>'form-control', 'id'=>'description', 'maxlength' => 255]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('keywords', 'Keywords (SEO) *') !!}
                                {!! Form::text('keywords', $websiteSettings->keywords, ['class'=>'form-control', 'id'=>'keywords', 'maxlength'=>255]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('teuto', 'Site Teuto *') !!}
                                {!! Form::text('teuto', $websiteSettings->teuto, ['class'=>'form-control', 'id'=>'teuto', 'maxlength'=>200]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('partner', 'Site Parceiro *') !!}
                                {!! Form::text('partner', $websiteSettings->partner, ['class'=>'form-control', 'id'=>'partner', 'maxlength'=>200]) !!}
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('email', 'E-mail *') !!}
                                {!! Form::text('email', $websiteSettings->email, ['class'=>'form-control', 'id'=>'email', 'maxlength'=>50]) !!}
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    {!! Form::label('facebook', 'Facebook') !!}
                                    {!! Form::text('facebook', $websiteSettings->facebook, ['class'=>'form-control', 'id'=>'facebook', 'maxlength'=>255]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    {!! Form::label('twitter', 'Twitter') !!}
                                    {!! Form::text('twitter', $websiteSettings->twitter, ['class'=>'form-control', 'id'=>'twitter', 'maxlength'=>255]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    {!! Form::label('instagram', 'Instagram') !!}
                                    {!! Form::text('instagram', $websiteSettings->instagram, ['class'=>'form-control', 'id'=>'instagram', 'maxlength'=>255]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('googleAnalytics', 'Google Analytics') !!}
                                {!! Form::textarea('googleAnalytics', $websiteSettings->googleAnalytics, ['class'=>'form-control', 'id'=>'googleAnalytics']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('certificate', 'Certificado') !!}
                                {!! Form::textarea('certificate', $websiteSettings->certificate, ['class'=>'form-control', 'id'=>'certificate']) !!}
                            </div>
                        </div>
                    </div>

                    <br />
                    <div class="form-group">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('siteAvailable', 'Liberar Site') !!}
                                <label class="css-input switch switch-primary">
                                    <input class="access" name="siteAvailable" id="siteAvailable" type="checkbox" value="1" @if($websiteSettings->siteAvailable == 1) checked @endif />
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('allowSignUp', 'Liberar Inscrições') !!}
                                <label class="css-input switch switch-primary">
                                    <input class="access" name="allowSignUp" id="allowSignUp" type="checkbox" value="1" @if($websiteSettings->allowSignUp == 1) checked @endif />
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('showWinners', 'Mostrar Ganhadores') !!}
                                <label class="css-input switch switch-primary">
                                    <input class="access" name="showWinners" id="showWinners" type="checkbox" value="1" @if($websiteSettings->showWinners == 1) checked @endif />
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 push-30-t">
                            {!! Form::submit('Gravar', ['class'=>'btn btn-primary pull-left']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@stop

@section('javascript')
@parent
<script type="application/javascript">
$(function(){
    $('.form-horizontal').validate({
        errorClass: 'help-block text-right animated fadeInDown',
        errorElement: 'div',
        errorPlacement: function(error, e) {
            jQuery(e).parents('.form-group .form-input').append(error);
        },
        highlight: function(e) {
            jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
            jQuery(e).closest('.help-block').remove();
        },
        success: function(e) {
            jQuery(e).closest('.form-group').removeClass('has-error');
            jQuery(e).closest('.help-block').remove();
        },
        ignore: [],
        rules: {
            'title': {
                required: true
            },
            'costumerServicePhone': {
                required: true
            },
            'address': {
                required: true
            },
            'email': {
                required: true,
                email: true
            }
        },
        messages: {
            'title': {
                required: 'Informe o título do site'
            },
            'costumerServicePhone': {
                required: 'Insira o telefone SAC'
            },
            'address': {
                required: 'Insira o endereço'
            },
            'email': {
                required: 'Informe o e-mail padrão do site',
                email: 'Informe um e-mail válido'
            }
        }
    });
});
</script>
@stop
