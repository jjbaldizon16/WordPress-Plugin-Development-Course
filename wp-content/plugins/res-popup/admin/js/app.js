/**
 * Archivo js de la parte de la administracion
 */

$ = jQuery.noConflict();

//Variables globales
var modalNombre;
var modalId;
var popupNombre;
var popupId;

$(document).ready(function(){

    $('#btn_crear').on('click', function(){

        var Modalpopup = new bootstrap.Modal(document.getElementById('Modalpopup'), {
            keyboard: false
          })

        Modalpopup.show();

    })

})

//Boton guardar pop-up
$(document).ready(function(){

    $('.modalData #btnGuardar').on('click', function(){

        modalNombre = $('.modalData #dataNom').val();
        modalId = Math.floor(Math.random() * 100);

        $.ajax({
            url: dataPopup.url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'res_data_popup',
                nonce: dataPopup.seguridad,
                nombre: modalNombre,
                id: modalId,
                tipo: 'add',
                datos_u: dataPopup.objeto
            },
            success: function(res){

                console.log(res.objeto);
                console.log(res.datos_u);

                setTimeout(function(){

                    var Modalpopup = new bootstrap.Modal(document.getElementById('Modalpopup'), {
                        keyboard: false
                    })

                    Modalpopup.hide();

                }, 1500);

                //location.href = "?page=res_popup&edit="+ modalNombre +"&id="+ modalId;
                
            }
        })

    })

})