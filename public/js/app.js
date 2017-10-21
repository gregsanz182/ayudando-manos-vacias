/*$(document).ready(function (){
    var docHeight = $(window).height();
    var footerHeight = $('#footer').height();
    var footerTop = $('#footer').position().top + footerHeight;
 
    if (footerTop < docHeight) {
     $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
    }

});*/

$('#estado_select').on('change', function() {
    $.ajax({
        method: 'POST',
        url: cityUrl,
        data: {
            estado_id: this.value,
            _token: token
        },
        success: function (data) {
            $('#ciudad_select').empty();
            $('#ciudad_select').append('<option selected>Municipio</option>');
            for (var i=0; i<data.length; i++){
                $('#ciudad_select').append("<option value='"+data[i].id+"'>"+data[i].nombre+"</option>");
            }
        }
    });
});

function otroSelect(sel, sel2){
    if($(sel).children(':selected').text() === 'Otro'){
        $(sel2).prop('disabled', false);
    }else{
        $(sel2).val('');
        $(sel2).prop('disabled', true);
    }
}

function modMedicamentoModal(id, medicamento_id, fecha, dosis, nombre_otro){
    $("#mod-medicamento-modal select[name='medicamento']").val(medicamento_id).change();
    $("#mod-medicamento-modal input[name='otro_medicamento']").val(nombre_otro).change();
    $("#mod-medicamento-modal input[name='fecha']").val(fecha).change();
    $("#mod-medicamento-modal input[name='dosis']").val(dosis).change();
    $("#mod-medicamento-modal form").attr('action', mod_medicamento_url+id+'/'+medicamento_id).change();
    $("#mod-medicamento-modal .modal-footer a").attr('href', del_medicamento_url+id+'/'+medicamento_id).change();
    $('#mod-medicamento-modal').modal('show');
}

function modInsumoModal(id, categoria_insumo_id, nombre, fecha, motivo){
    $("#mod-insumo-modal select[name='categoria_insumo']").val(categoria_insumo_id).change();
    $("#mod-insumo-modal input[name='insumo']").val(nombre).change();
    $("#mod-insumo-modal input[name='fecha']").val(fecha).change();
    $("#mod-insumo-modal input[name='motivo']").val(motivo).change();
    $("#mod-insumo-modal form").attr('action', mod_insumo_url+id+'/'+categoria_insumo_id).change();
    $("#mod-insumo-modal .modal-footer a").attr('href', del_insumo_url+id+'/'+categoria_insumo_id).change();
    $('#mod-insumo-modal').modal('show');
}