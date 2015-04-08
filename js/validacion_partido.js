$('form').form('clear')

$('.ui.form')
  .form({
    nombre_partido: {
      identifier  : 'nombre_partido',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor ingrese un nombre de partido'
        }
      ]
    },
    imagen_partido: {
      identifier  : 'imagen_partido',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor selecciona una imagen para el partido'
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