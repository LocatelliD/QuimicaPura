$(document).ready(function() {
    $('.data').mask('00/00/0000');
    $('.tempo').mask('00:00:00');
    $('.data_tempo').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.tel').mask('00000-0000');
    $('.ddd_tel').mask('(00) 0000-0000');
    $('.ddd_cel').mask('(00) 00000-0000');
    $('.cpf').mask('000.000.000-00');
    $('.cnpj').mask('00.000.000/0000-00');
    $('.dinheiro').mask('000.000.000.000.000,00', { reverse: true });
    $('.dinheiro2').mask("#.##0,00", { reverse: true });
    $('.lat').mask('S09.9999999', { translation: { 'S': { pattern: /-/, optional: true } } });
    $('.long').mask('S09.99999999', { translation: { 'S': { pattern: /-/, optional: true } } });



    $(".cpfcnpj").keydown(function() {
        try {
            $(".cpfcnpj").unmask();
        } catch (e) {}

        var tamanho = $(".cpfcnpj").val().length;

        if (tamanho < 11) {
            $(".cpfcnpj").mask("999.999.999-99");
        } else {
            $(".cpfcnpj").mask("99.999.999/9999-99");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function() {
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });

    $('.fone').mask('(00) 0000-00009');
    $('.fone').blur(function(event) {
        if ($(this).val().length == 15) { // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
            $('.fone').mask('(00) 00000-0009');
        } else {
            $('.fone').mask('(00) 0000-00009');
        }
    });



    $('.cor_hex').mask('#xxxxxx', {

        translation: {
            'x': {
                pattern: /[a-fA-F0-9]/
            },
            '#': ''
        }
    });

    $('.placeholder').mask("00/00/0000", { placeholder: "__/__/____" });
    $('#unmask').click(function() {
        var unmask_value = $('.cpf').cleanVal();
        $('#clearcpf').html(unmask_value);
    });

});