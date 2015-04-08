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
          prompt : 'Por favor seleccione un partido del simpatizante'
        }
      ]
    },
    nombres: {
      identifier  : 'nombres',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor ingrese el nombre de la persona'
        }
      ]
    },
    apellido_paterno: {
      identifier  : 'apellido_paterno',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor ingrese el apellido paterno para la persona'
        }
      ]
    },
    apellido_materno: {
      identifier  : 'apellido_materno',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor ingrese el apellido materno para la persona'
        }
      ]
    },
    direccion: {
      identifier  : 'direccion',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor ingrese la dirección de para la persona'
        }
      ]
    },
    telefono: {
      identifier  : 'telefono',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor ingrese un número de teléfono para la persona'
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