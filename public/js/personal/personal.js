$(document).ready(function () {
   $('#entradafilter').keyup(function () {
      var rex = new RegExp($(this).val(), 'i');
        $('.busqueda tr').hide();
        $('.busqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })

});

$('#exampleModalLive').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
