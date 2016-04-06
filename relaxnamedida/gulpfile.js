var elixir = require('laravel-elixir');

elixir(function(mix) {

    // WEBSITE
    mix.sass(['main.scss'], '../public_html/concursonamedida/assets/css/bootstrap.min.css');
    mix.sass(['custom.scss'], '../public_html/concursonamedida/assets/css/main.css');
    mix.scripts('jquery.js', '../public_html/concursonamedida/assets/js/jquery.min.js');

    mix.scripts(['bootstrap.js', 'custom.js', 'jquery.validate.min.js', 'jquery.mask.min.js', 'jquery.easing.min.js', 'wz_tooltip.js', 'validateContact.js', 'validateRegistration.js'], '../public_html/concursonamedida/assets/js/main.min.js');

    mix.copy( "resources/assets/images/**", "../public_html/concursonamedida/assets/images");

    // ADMIN
    mix.styles([
            '../../../resources/assets/admin/css/bootstrap.min.css',
            '../../../resources/assets/admin/css/font-awesome.css',
            '../../../resources/assets/admin/css/slick.min.css',
            '../../../resources/assets/admin/css/slick-theme.min.css',
            '../../../resources/assets/admin/js/plugins/jquery-tags-input/jquery.tagsinput.min.css',
            '../../../resources/assets/admin/css/bootstrap-fileupload.css',
            '../../../resources/assets/admin/css/cropper.css'
        ],
        '../public_html/concursonamedida/assets/admin/css/vendor.css');

    mix.styles(['../../../resources/assets/admin/js/plugins/datatables/jquery.dataTables.min.css'], '../public_html/concursonamedida/assets/admin/js/plugins/datatables/jquery.dataTables.min.css');

    mix.less('../../../resources/assets/admin/less/main.less', '../public_html/concursonamedida/assets/admin/css/main.css');

    mix.copy( "resources/assets/admin/fonts/**", "../public_html/concursonamedida/assets/admin/fonts");
    mix.copy( "resources/assets/admin/img/**", "../public_html/concursonamedida/assets/admin/img");

    mix.scripts([
            '../../../resources/assets/admin/js/core/jquery.min.js',
            '../../../resources/assets/admin/js/core/bootstrap.min.js',
            '../../../resources/assets/admin/js/core/jquery.slimscroll.min.js',
            '../../../resources/assets/admin/js/core/jquery.scrollLock.min.js',
            '../../../resources/assets/admin/js/core/jquery.appear.min.js',
            '../../../resources/assets/admin/js/core/jquery.countTo.min.js',
            '../../../resources/assets/admin/js/core/jquery.placeholder.min.js',
            '../../../resources/assets/admin/js/core/js.cookie.min.js',
            '../../../resources/assets/admin/js/core/slick.min.js',
            '../../../resources/assets/admin/js/core/jquery.validate.min.js',
            '../../../resources/assets/admin/js/plugins/bootbox/bootbox.min.js',
            '../../../resources/assets/admin/js/plugins/jquery-tags-input/jquery.tagsinput.min.js',
            '../../../resources/assets/admin/js/plugins/bootstrap-fileupload/bootstrap-fileupload.js',
            '../../../resources/assets/admin/js/plugins/cropper/cropper.js',
            '../../../resources/assets/admin/js/core/custom.js'
        ],
        '../public_html/concursonamedida/assets/admin/js/vendor.js');

    mix.scripts(['../../../resources/assets/admin/js/app.js'], '../public_html/concursonamedida/assets/admin/js/app.js');
    mix.scripts(['../../../resources/assets/admin/js/pages/base_tables_datatables.js'], '../public_html/concursonamedida/assets/admin/js/pages/base_tables_datatables.js');
    mix.scripts(['../../../resources/assets/admin/js/plugins/datatables/jquery.dataTables.min.js'], '../public_html/concursonamedida/assets/admin/js/plugins/datatables/jquery.dataTables.min.js');
    mix.scripts(['../../../resources/assets/admin/js/plugins/datatables/jquery.dataUk.js'], '../public_html/concursonamedida/assets/admin/js/plugins/datatables/jquery.dataUk.min.js');
    mix.scripts(['../../../resources/assets/admin/js/plugins/jquery-ui/jquery-ui.min.js'], '../public_html/concursonamedida/assets/admin/js/plugins/jquery-ui/jquery-ui.min.js');
    mix.scripts(['../../../resources/assets/admin/js/core/sortorder.js'], '../public_html/concursonamedida/assets/admin/js/sortorder.js');


    mix.scripts(['../../../resources/assets/admin/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js'], '../public_html/concursonamedida/assets/admin/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');
    mix.scripts(['../../../resources/assets/admin/js/plugins/masked-inputs/jquery.maskedinput.min.js'], '../public_html/concursonamedida/assets/admin/js/plugins/masked-inputs/jquery.maskedinput.min.js');

    mix.copy(['resources/assets/admin/js/plugins/ckeditor/**'], '../public_html/concursonamedida/assets/admin/editor/ckeditor/');

});