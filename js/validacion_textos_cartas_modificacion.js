$('select.dropdown')
  .dropdown()
;

$('.ui.form')
  .form({
    id_tipo_carta: {
      identifier  : 'id_tipo_carta',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor seleccione un tipo de carta'
        }
      ]
    },
    texto_carta: {
      identifier  : 'texto_carta',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor ingrese el texto para la carta'
        }
      ]
    },
  })
;

$('.submit').click(function() {
    if ($('form').hasClass('error')){
        $('form').removeClass('loading');
    }else{
        $('form').addClass('loading');
    }
});