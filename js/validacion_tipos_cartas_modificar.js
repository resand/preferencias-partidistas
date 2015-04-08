$('.ui.form')
  .form({
    nombre_tipo: {
      identifier  : 'nombre_tipo',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor ingrese un nombre para el tipo de carta'
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