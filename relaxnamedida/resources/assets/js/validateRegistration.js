$(function(){
    $('#form-registration-1').validate({
        rules: {
            'name': {
                required: true
            },
            'cpf': {
                required: true,
                cpf: true
            },
            'gender': {
                required: true
            },
            'phone': {
                required: function(element){
                    if($("#mobile").val() == ''){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            'mobile': {
                required: function(element){
                    if($("#phone").val() == ''){
                        return true;
                    }else{
                        return false;
                    }
                }
            },
            'email': {
                required: true,
                email: true
            },
            'password': {
                required: true,
                minlength: 6,
                maxlength: 12
            },
            'password_confirmation': {
                required:true,
                minlength: 6,
                maxlength: 12,
                equalTo:"#password"
            }
        },
        messages: {
            'name': {
                required: 'Informe o nome do responsável'
            },
            'cpf': {
                required: 'Informe o CPF'
            },
            'gender': {
                required: 'Marque o sexo'
            },
            'phone': {
                required: 'Informe um número de contato'
            },
            'mobile': {
                required: 'Informe um número de contato'
            },
            'email': {
                required: 'Informe seu e-mail',
                email: 'Informe um e-mail válido'
            },
            'password': {
                required	: "Informe a senha",
                minlength	: "A senha deve conter de 6 a 12 caracteres",
                maxlength	: "A senha deve conter de 6 a 12 caracteres"
            },
            'password_confirmation': {
                required	: "Confirme a senha",
                minlength	: "A senha deve conter de 6 a 12 caracteres",
                maxlength	: "A senha deve conter de 6 a 12 caracteres",
                equalTo		: "As senhas não conferem"
            }
        }
    });

    $('#form-registration-2').validate({
        rules: {
            'address': {
                required: true
            }, 'number': {
                required: true
            },
            'district': {
                required: true
            },
            'state': {
                required: true
            },
            'city': {
                required: true
            }
        },
        messages: {
            'address': {
                required: 'Informe o endereço'
            },
            'number': {
                required: 'Informe o número'
            },
            'district': {
                required: 'Informe o bairro'
            },
            'state': {
                required: 'Escolha o Estado'
            },
            'city': {
                required: 'Escolha a cidade'
            }
        }
    });

    $('input[type=text][name=phone]').keyup(function(){
       $('label.error[for=mobile]').html('');
       $('label.error[for=mobile]').hide();
    });
    $('input[type=text][name=mobile]').keyup(function(){
        $('label.error[for=phone]').html('');
        $('label.error[for=phone]').hide();
    });
});