$(function(){
    $('.form-contact').validate({
        ignore: [],
        rules: {
            'name': {
                required: true
            },
            'email': {
                required: true,
                email: true
            },
            'phone': {
                required: true
            },
            'subject': {
                required: true
            },
            'message': {
                required: true
            }
        },
        messages: {
            'name': {
                required: 'Informe seu nome'
            },
            'email': {
                required: 'Informe seu e-mail',
                email: 'Informe um e-mail válido'
            },
            'phone': {
                required: 'Informe seu telefone'
            },
            'subject': {
                required: 'Informe o assunto'
            },
            'message': {
                required: 'Digite sua mensagem'
            }
        }
    });
});