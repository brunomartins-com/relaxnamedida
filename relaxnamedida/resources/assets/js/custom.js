$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 500, 'easeInOutExpo');
        event.preventDefault();
        window.location.hash = $(this).attr('href');
    });

    $('select#menu').change(function(event) {
        var $anchor = $(this).find(':selected');

        if($anchor.data('type') == 1) {
            $('html, body').stop().animate({
                scrollTop: $($anchor.val()).offset().top
            }, 500, 'easeInOutExpo');
            event.preventDefault();
            window.location.hash = $anchor.val();
        }else if($anchor.data('type') == 2){
            $($anchor.val()).modal('show');
        }else if($anchor.data('type') == 0){
            window.location = $anchor.val();
        }
    });

    if(window.location.hash) {
        var elem = $('a[href=' + window.location.hash + ']');
        if (elem) {
            $('html, body').stop().animate({
                scrollTop: $(elem.attr('href')).offset().top
            }, 500, 'easeInOutExpo');
            event.preventDefault();
        }
    }
});
$(document).ready(function(){
    //ACTION FOR TABS
    $("#nextStep").click(function(){

        if ($("#governmental").prop('checked')) {
            alert("Autoridades governamentais não podem participar.")

            return false;
        }

        if ($("#form-register-1").valid()){
            $("#tab1").hide();
            $("#tab3").hide();
            $("#tab2").show();
            $(".tabs ul li").removeClass("active");
            $(".tabs ul li:odd").addClass("active");
        }

        return false;
    });

    $("#nextStep2").click(function(){

        if ($("#form-register-2").valid()){

            var data = new FormData();

            data.append('form1',$("#form-register-1").serialize());
            data.append('form2',$("#form-register-2").serialize());

            $.ajax({
                url: "/register",
                method: "POST",
                data: data,
                processData: false,
                contentType: false
            }).done(function (data) {
                if (data.success == 1) {

                    $("#tab3").show();
                    $("#tab1").hide();
                    $("#tab2").hide();
                    $(".tabs ul li").removeClass("active");
                    $(".tabs ul li#conclusion").addClass("active");

                    return false;
                }

                alert(data.message);

                $("#tab1").show();
                $("#tab2").hide();
                $("#tab3").hide();
                $(".tabs ul li").removeClass("active");
                $(".tabs ul li:odd").addClass("active");


            }).fail(function (jqXHR, textStatus) {
                alert('Houve um problema na sua solicitação. Tente novamente mais tarde');
            });

            return false;

            $("#tab1").hide();
            $("#tab2").hide();
            $("#tab3").show();
            $(".tabs ul li").removeClass("active");
            $(".tabs ul li:odd").addClass("active");

        }

        return false;
    });

    $(".forgot").click(function(){
        $(".form-login").hide();
        $(".recover-password").show();
    });
    $(".back").click(function(){
        $(".recover-password").hide();
        $(".form-login").show();
    });

    var originalLeave = $.fn.popover.Constructor.prototype.leave;
    $.fn.popover.Constructor.prototype.leave = function(obj){
        var self = obj instanceof this.constructor ?
            obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)
        var container, timeout;

        originalLeave.call(this, obj);

        if(obj.currentTarget) {
            container = $(obj.currentTarget).siblings('.popover')
            timeout = self.timeout;
            container.one('mouseenter', function(){
                //We entered the actual popover – call off the dogs
                clearTimeout(timeout);
                //Let's monitor popover content instead
                container.one('mouseleave', function(){
                    $.fn.popover.Constructor.prototype.leave.call(self, self);
                });
            })
        }
    };

    $('body').popover({ selector: '[data-popover]', trigger: 'hover', placement: 'bottom', delay: {show: 50, hide: 400}});

    //PROFILE - EDIT MY DATA
    $(".form-profile label em").click(function(e){
        var element = $(this).attr('id');
        $('.form-profile em#'+element).hide();
        if(element != 'city' && element != 'gender' && element != 'state'){
            $('.form-profile input[name='+element+']').show();
            $('.form-profile input[name='+element+']').focus();
        }else{
            $('.form-profile select[name='+element+']').show();
            $('.form-profile select[name='+element+']').focus();
        }
    });
    $('.form-profile label input').keypress(function(e){
        var id = $(this).attr('id');
        var inputName = $(this).attr('name');
        var inputRequired = $(this).attr('required');
        var inputValue = $(this).val();
        /* * making sure if the event is Keycode (for IE and other browsers) * if not take Which event (Firefox) */
        var key = (e.keyCode?e.keyCode:e.which);
        /* making sure if the key press has been pressed the "ENTER" */
        if(key == 13){
            if(inputRequired == 'required' && inputValue == '') {
                alert('Preenchimento Obrigatório!');
                $(this).focus();
            }else if($('label.error[for='+id+']').length > 0 && (!$('label.error[for='+id+']').attr('style') || $('label.error[for='+id+']').attr('style') == "display: block;")){
                alert('Existem erros pendentes!');
                $(this).focus();
            }else{
                var data = {
                    '_token' : $('input[type=hidden][name=_token]').val(),
                    'id' : $('input[type=hidden][name=userId]').val(),
                    'inputName' : inputName,
                    'inputValue' : inputValue
                };
                $.ajax({
                    type : "PUT",
                    url: "/profile",
                    data: data,
                    dataType: "json",
                    success: function(d){
                        if(d['success'] == 0){
                            alert(d['message']);
                        }else {
                            $('input[name='+inputName+']').hide();
                            r = d['newInputValue'];
                            if (r == '') {
                                r = '- - -';
                            }
                            $('.form-profile em#' + inputName).html(r);
                            $('.form-profile em#' + inputName).show();
                        }
                    }
                });
            }
        }else{
            return true;
        }
    });
    $('.form-profile label select').change(function(e){
        var id = $(this).attr('id');
        var inputName = $(this).attr('name');
        var inputRequired = $(this).attr('required');
        var inputValue = $(this).val();
        if(inputRequired == 'required' && inputValue == ''){
            alert('Preenchimento Obrigatório!');
            $(this).focus();
        }else {
            var data = {
                '_token' : $('input[type=hidden][name=_token]').val(),
                'id': $('input[type=hidden][name=userId]').val(),
                'inputName': inputName,
                'inputValue': inputValue
            };
            $.ajax({
                type: "PUT",
                url: "/profile",
                data: data,
                dataType: "json",
                success: function (d) {
                    if(d['success'] == 0){
                        alert(d['message']);
                    }else {
                        $('select[name='+inputName+']').hide();
                        r = d['newInputValue'];
                        $('.form-profile em#' + inputName).html(r);
                        $('.form-profile em#' + inputName).show();
                    }
                }
            });
        }
    });

    //VALIDATE LOGIN FORM
    $('#form-login').validate({
        ignore: [],
        rules: {
            'email': {
                required: true,
                email: true
            },
            'password': {
                required: true,
                minlength: 6,
                maxlength: 12
            }
        },
        messages: {
            'email': {
                required: 'Informe seu e-mail',
                email: 'Informe um e-mail válido'
            },
            'password': {
                required	: "Informe a senha",
                minlength	: "A senha deve conter de 6 a 12 caracteres",
                maxlength	: "A senha deve conter de 6 a 12 caracteres"
            }
        }
    });
    //VALIDATE RECOVERY PASSWORD FORM
    $('#form-recovery-password').validate({
        ignore: [],
        rules: {
            'email': {
                required: true,
                email: true
            }
        },
        messages: {
            'email': {
                required: 'Informe seu e-mail',
                email: 'Informe um e-mail válido'
            }
        }
    });
    
    //FILTER CITIES PER STATE
    $("select[name=state].refreshCities").change(function(){
        var val = $(this).val();
        $.ajax({
            url: '/cities',
            type: 'POST',
            dataType: 'json',
            data: {'state': val, '_token': $('input[name=_token]').val()},
            beforeSend: function () {
                $("select[name=city].city-refresh option:selected").text('Carregando cidades...');
                $("select[name=city].city-refresh").attr('disabled', 'disabled');
            },
            success: function(data){
                $("select[name=city].city-refresh").removeAttr('disabled');
                var cities = '<option value="">Escolha a cidade...</option>';
                $.each(data, function (key, val) {
                    cities += '<option value="' + val.name + '">' + val.name + '</option>';
                });
                $("select[name=city].city-refresh").html(cities);
            }
        });
    });

    //MOBILE NAVIGATION CAROUSEL
    $(".carousel").swiperight(function() {
        $(".carousel").carousel('prev');
    });
    $(".carousel").swipeleft(function() {
        $(".carousel").carousel('next');
    });
});