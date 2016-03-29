$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 500, 'easeInOutExpo');
        event.preventDefault();
        window.location.hash = $(this).attr('href');
    });

    if(window.location.hash) {
        var elem = $('a[href=' + window.location.hash + ']');
        if (elem) {
            console.log(elem);
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
        $("#tab1").hide();
        $("#tab3").hide();
        $("#tab2").show();
        $(".tabs > ul > li").removeClass("active");
        $(".tabs > ul > li:odd").addClass("active");
    });

    $("#nextStep2").click(function(){
        $("#tab1").hide();
        $("#tab2").hide();
        $("#tab3").show();
        $(".tabs > ul > li").removeClass("active");
        $(".tabs > ul > li:last").addClass("active");
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

    $('body').popover({ selector: '[data-popover]', trigger: 'click hover', placement: 'auto', delay: {show: 50, hide: 400}});

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
    $("select[name=state]").change(function(){
        var val = $(this).val();
        $.ajax({
            url: '/cities',
            type: 'POST',
            dataType: 'json',
            data: {'state': val, '_token': $('input[name=_token]').val()},
            beforeSend: function () {
                $("select[name=city] option:selected").text('Carregando cidades...');
                $("select[name=city]").attr('disabled', 'disabled');
            },
            success: function(data){
                $("select[name=city]").removeAttr('disabled');
                var cities = '<option value="">Escolha a cidade...</option>';
                $.each(data, function (key, val) {
                    cities += '<option value="' + val.name + '">' + val.name + '</option>';
                });
                $("select[name=city]").html(cities);
            }
        });
    });
});