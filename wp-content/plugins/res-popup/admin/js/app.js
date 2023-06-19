/**
 * Archivo js de la parte de la administracion
 */

$ = jQuery.noConflict();

$(document).ready(function(){

    $('#btn_crear').on('click', function(){

        var Modalpopup = new bootstrap.Modal(document.getElementById('Modalpopup'), {
            keyboard: false
          })

        Modalpopup.show();

    })

})