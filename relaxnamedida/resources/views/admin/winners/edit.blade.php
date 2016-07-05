@extends('admin.sidebar-template')

@section('title', 'Editar Ganhador | ')

@section('page-content')
@parent
<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Ganhadores <small></small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a href="{{ action('Admin\WinnersController@getIndex') }}" class="text-primary" title="Ganhadores 2014">Ganhadores 2014</a></li>
                    <li>{{ $winner->name }}</li>
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
            <div class="block-header bg-primary-darker text-white">
                <ul class="block-options">
                    <li>
                        <button type="button" class="btn-back" data-url="{{ action('Admin\WinnersController@getIndex') }}"><i class="si si-action-undo"></i></button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    </li>
                </ul>
                <h3 class="block-title">Editar</h3>
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
                            'id' => 'winners',
                            'method' => 'put',
                            'class' => 'form-horizontal push-20-t',
                            'enctype' => 'multipart/form-data',
                            'url' => action('Admin\WinnersController@putEdit')
                            ])
                    !!}
                    {!! Form::hidden('winnersId', $winner->id) !!}

                    <div class="form-group">
                        <div class="col-lg-3 col-md-5 col-sm-7 col-xs-9">
                            <div class="form-input">
                                {!! Form::label('position', 'Posição *') !!}
                                <div name="position" id="position" class="form-control">
                                    {{ $winner->position }}º Lugar
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('name', 'Nome *') !!}
                                {!! Form::text('name', $winner->name, ['class'=>'form-control', 'id'=>'name', 'maxlength'=>100]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('city', 'Cidade *') !!}
                                {!! Form::text('city', $winner->city, ['class'=>'form-control', 'id'=>'city', 'maxlength'=>100]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3 col-md-5 col-sm-7 col-xs-9">
                            <div class="form-input">
                                {!! Form::label('state', 'Estado *') !!}
                                {!! Form::text('state', $winner->state, ['class'=>'form-control', 'id'=>'state', 'maxlength'=>2]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('phrase', 'Frase *') !!}
                                {!! Form::textarea('phrase', $winner->phrase, ['id' => 'phrase', 'class' => 'form-control', 'maxlength'=>350]) !!}
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
            'name': {
                required: true
            },
            'city': {
                required: true
            },
            'state': {
                required: true
            },
            'phrase': {
                required: true
            }
        },
        messages: {
            'name': {
                required: 'Informe o nome do ganhador'
            },
            'city': {
                required: 'Informe a cidade do ganhador'
            },
            'state': {
                required: 'Informe o Estado do ganhador'
            },
            'phrase': {
                required: "Informe a Frase do ganhador"
            }
        }
    });
});

</script>
@stop