$('form').form('clear')

$('select.dropdown')
  .dropdown()
;

$('.ui.form')
  .form({
    id_partido: {
      identifier  : 'id_partido',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor seleccione la preferencia partidista para las cartas'
        }
      ]
    },
    tipo_carta: {
      identifier  : 'tipo_carta',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor seleccione un tipo de carta'
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