$('input[name="date"]').mask('00/00/0000');
$('input[name="postal-code"]').mask('S0S 0S0');
$('input[name="phone-number"]').mask('(000) 0000 0000');

$('input[name="postal-code"]').focusout(function() {
   $('input[name="postal-code"]').val( this.value.toUpperCase() );
});
