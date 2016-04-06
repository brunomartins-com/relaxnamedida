$(function(){
    $('.form-new-phrase').validate({
        ignore: [],
        rules: {
            'message': {
                required: true,
                minlength:8
            },
            'receipt': {
                required: true
            }
        },
        messages: {
            'message': {
                required: 'Informe a frase',
                minlength: 'Frase ten que ter no minimo 8 caracteres'
            },
            'receipt': {
                required: 'O cupom é obrigatório',
                image: 'Cupom tem que ser uma imagem'
            }
        }
    });
});