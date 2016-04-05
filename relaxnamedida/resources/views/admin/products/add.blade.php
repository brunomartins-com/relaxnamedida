@extends('admin.sidebar-template')

@section('title', 'Adicionar Produto | ')

@section('page-content')
@parent
<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Produtos <small></small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a href="{{ action('Admin\ProductsController@getIndex') }}" class="text-primary" title="Produtos">Produtos</a></li>
                    <li>Adicionar</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header bg-primary-darker text-white">
                <ul class="block-options">
                    <li>
                        <button type="button" class="btn-back" data-url="{{ action('Admin\ProductsController@getIndex') }}"><i class="si si-action-undo"></i></button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    </li>
                </ul>
                <h3 class="block-title">Adicionar</h3>
            </div>
            <div class="block-content">
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
                            'id' => 'products',
                            'method' => 'post',
                            'class' => 'form-horizontal push-20-t',
                            'enctype' => 'multipart/form-data',
                            'url' => action('Admin\ProductsController@postAdd')
                            ])
                    !!}
                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('title', 'Nome/Produto *') !!}
                                {!! Form::text('title', '', ['class'=>'form-control', 'id'=>'title', 'maxlength'=>45]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('description', 'Descrição *') !!}
                                {!! Form::textarea('description', '', ['class'=>'form-control', 'id'=>'description', 'cols' => 4]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('urlBuy', 'URL Compre Aqui *') !!}
                                {!! Form::text('urlBuy', '', ['class'=>'form-control', 'id'=>'urlBuy', 'placeholder' => 'http://', 'maxlength'=>255]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            {!! Form::label('smallImage', 'Imagem Pequena') !!}
                            <div class="clearfix"></div>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new" style="max-width:350px; max-height:206px;">
                                    <img src="http://placehold.it/350x206" alt="Adicionar Produto" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 350px; max-height:206px; border-radius: 0; border:0; padding: 0;"></div>
                                <div class="font-size-10 push-10-t">Tamanho: 350x206 pixels / Somente .png com transparência</div>
                                <div class="push-20-t">
                                <span class="btn btn-primary btn-xs btn-file">
                                    <span class="fileupload-new">Selecionar Imagem</span>
                                    <span class="fileupload-exists">Trocar</span>
                                    {!! Form::file('smallImage', ['id'=>'smallImage', 'accept'=>'image/png']) !!}
                                </span>
                                    <a href="#" class="btn btn-primary btn-xs fileupload-exists" data-dismiss="fileupload" style="margin-left: 30px;">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                            {!! Form::label('bigImage', 'Imagem Grande') !!}
                            <div class="clearfix"></div>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new" style="max-width: 1110px; max-height: 635px;">
                                    <img src="http://placehold.it/1110x635" alt="Adicionar Produto" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width:1110px; max-height:635px; border-radius: 0; border:0; padding: 0;"></div>
                                <div class="font-size-10 push-10-t">Tamanho: 1110x635 pixels / Somente .png com transparência</div>
                                <div class="push-20-t">
                                <span class="btn btn-primary btn-xs btn-file">
                                    <span class="fileupload-new">Selecionar Imagem</span>
                                    <span class="fileupload-exists">Trocar</span>
                                    {!! Form::file('bigImage', ['id'=>'bigImage', 'accept'=>'image/png']) !!}
                                </span>
                                    <a href="#" class="btn btn-primary btn-xs fileupload-exists" data-dismiss="fileupload" style="margin-left: 30px;">Cancelar</a>
                                </div>
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
                'description': {
                    required: true
                },
                'urlBuy': {
                    required: true,
                    url: true
                },
                'image': {
                    required: true
                }
            },
            messages: {
                'title': {
                    required: 'Informe o nome do produto'
                },
                'description': {
                    required: 'Informe a descrição do produto'
                },
                'urlBuy': {
                    required: 'Informe o link para comprar o produto',
                    url: 'Informe uma URL válida'
                },
                'image': {
                    required: 'Escolha uma imagem para o produto'
                }
            }
        });
    });
</script>
@stop
