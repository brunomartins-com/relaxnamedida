@extends('admin.sidebar-template')

@section('title', 'Visualizar Cadastrado | ')

@section('page-content')
@parent
        <!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Frase <small></small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li><a href="{{ '/admin/frases' }}" title="Frases">Frases</a></li>
                    <li>{{ $phrase->participant->name }}</li>
                    <li>Visualizar</li>
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
                        <button type="button" class="btn-back" data-url="{{ '/admin/frases' }}"><i class="si si-action-undo"></i></button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    </li>
                </ul>
                <h3 class="block-title">Visualizar</h3>
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
                        'id' => 'textStatus'.$phrase->id,
                        'method' => 'put',
                        'class' => 'form-horizontal push-20-t',
                        'enctype' => 'multipart/form-data',
                        'url' => '/admin/frases/alterar-status'
                        ])
                    !!}
                    {!! Form::hidden('userId', $phrase->id) !!}
                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('', 'Participante: ') !!}
                                {{ $phrase->participant->name }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('', 'Frase: ') !!}
                                {{ $phrase->message }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('', 'Data de Nascimento: ') !!}
                                {{ $phrase->date->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-input">
                                {!! Form::label('', 'Comprovante: ') !!}
                                <a href="/{{ $phrase->receipt }}" target="_blank">Clique para abrir</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-xs-12 push-30-t">
                            @if($phrase->active == 0)
                            {!! Form::hidden('active', 1) !!}
                            {!! Form::button('<i class="fa fa-check"></i> Liberar Frase', ['title'=>'Liberar', 'data-toggle'=>'tooltip', 'type' => 'submit', 'class'=>'btn btn-success']) !!}
                            @else
                            {!! Form::hidden('active', 0) !!}
                            {!! Form::button('<i class="fa fa-ban"></i> Bloquear Frase', ['title'=>'Bloquear', 'data-toggle'=>'tooltip', 'type' => 'submit', 'class'=>'btn btn-warning']) !!}
                            @endif
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