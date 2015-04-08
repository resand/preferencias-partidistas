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
  })
;


$('.submit').click(function() {
    if ($('form').hasClass('error')){
        $('form').removeClass('loading');
    }else{
        $('form').addClass('loading');
    }
});