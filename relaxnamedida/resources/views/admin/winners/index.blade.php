@extends('admin.sidebar-template')

@section('title', 'Ganhadores | ')

@section('head')
@parent
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/datatables/jquery.dataTables.min.css') }}">
@stop

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
                    <li>Ganhadores </li>
                    <li>Lista</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header bg-gray-lighter">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    </li>
                </ul>
                <h3 class="block-title">Lista</h3>
            </div>
            <div class="block-content">
                @if (Session::has('success'))
                <div class="alert alert-info alert-dismissable">
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
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                <table class="table table-bordered table-striped js-dataTable-full">
                    <thead>
                        <tr>
                            <th width="90">Posição</th>
                            <th>Nome</th>
                            <th>Cidade/UF</th>
                            <th>Frase</th>
                            <th class="text-center sorting-none" style="width: 40px;">Ed</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($winners as $winner)
                        <tr>
                            <td>{{ $winner->position }}</td>
                            <td class="font-w600">{{ $winner->name }}</td>
                            <td>{{ $winner->city." - ".$winner->state }}</td>
                            <td>{{ $winner->phrase }}</td>
                            <td class="text-center">
                                {!! Form::button('<i class="fa fa-pencil"></i>', ['title'=>'Editar', 'data-toggle'=>'tooltip', 'class'=>'btn btn-xs btn-primary',
                                'onclick'=>'window.open(\''.action('Admin\WinnersController@getEdit', $winner->id).'\', \'_self\')']) !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
<!-- Page JS Plugins -->
<script src="{{ asset('assets/admin/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<!-- Page JS Code -->
<script src="{{ asset('assets/admin/js/pages/base_tables_datatables.js') }}"></script>
<!-- Personalizing dataTable -->
<script>
jQuery(function(){
    jQuery('.js-dataTable-full').dataTable({
        order: [''],
        columnDefs: [ { orderable: false, targets: 'sorting-none' } ],
        bPaginate: false,
        language: {
            'url': '<?php echo asset('assets/json/dataTablesPT-BR.json'); ?>'
        }
    });
});
</script>
@stop
