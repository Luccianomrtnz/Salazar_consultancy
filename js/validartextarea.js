
$('#mensaje_ayuda').text('500 carácteres restantes');
$('#mensaje').keydown(function () {
    var max = 500;
    var len = $(this).val().length;
    if (len >= max) {
        $('#mensaje_ayuda').text('Has llegado al límite');// Aquí enviamos el mensaje a mostrar          
        $('#mensaje_ayuda').addClass('text-danger');
        $('#mensaje').addClass('is-invalid');
        $('#inputsubmit').addClass('disabled');    
        document.getElementById('inputsubmit').disabled = true;                    
    } 
    else {
        var ch = max - len;
        $('#mensaje_ayuda').text(ch + ' carácteres restantes');
        $('#mensaje_ayuda').removeClass('text-danger');            
        $('#message').removeClass('is-invalid');            
        $('#inputsubmit').removeClass('disabled');
        document.getElementById('inputsubmit').disabled = false;            
    }
});  
