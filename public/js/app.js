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

$('#select_tipo').on('change', function() {
    if(this.value != '0'){
        $('#tipo_c_a').removeAttr('disabled');
        $('#desc_c_a').removeAttr('disabled');
    }else{
        $('#tipo_c_a').attr('disabled', 'disabled');
        $('#desc_c_a').attr('disabled', 'disabled');
    }
});

$('#select_medicamento').on('change', function() {
    if(this.value != '0'){
        $('#nombre_m_a').removeAttr('disabled');
        $('#desc_m_a').removeAttr('disabled');
    }else{
        $('#nombre_m_a').attr('disabled', 'disabled');
        $('#desc_m_a').attr('disabled', 'disabled');
    }
});

$('#select_insumo').on('change', function() {
    if(this.value != '0'){
        $('#nombre_i_a').removeAttr('disabled');
        $('#desc_i_a').removeAttr('disabled');
    }else{
        $('#nombre_i_a').attr('disabled', 'disabled');
        $('#desc_i_a').attr('disabled', 'disabled');
    }
});
var check = false;
$('#select_localidad').on('change', function() {
    if(this.value != '0'){
        $('#nombre_l_a').removeAttr('disabled');
        $('#inlineRadio1_a').removeAttr('disabled');
        $('#inlineRadio2_a').removeAttr('disabled');
        $('#estado_l_a').removeAttr('disabled');
    }else{
        $('#nombre_l_a').attr('disabled', 'disabled');
        $('#inlineRadio1_a').attr('disabled', 'disabled');
        $('#inlineRadio2_a').attr('disabled', 'disabled');
        $('#estado_l_a').attr('disabled', 'disabled');
    }
    if(check){
        $("#estado_l_a").attr("disabled", "disabled");
    }else{
        $("#estado_l_a").removeAttr("disabled");
    }
});

$('#id_localidad').val( $('#estado_l_a option:selected').val() );

$('#inlineRadio1_a').click( function(){
    $("#estado_l_a").removeAttr("disabled");
    $('#id_localidad').val( $('#estado_l_a option:selected').val() );
    $('#estado_l_a').on('change', function(){
        $('#id_localidad').val(''+this.value+'');
    });
    check = false;
});

$('#inlineRadio2_a').click( function(){
    $("#estado_l_a").attr("disabled", "disabled");
    $('#id_localidad').val('NULL');
    check = true;
});

$('#localidad_id').val( $('#estado option:selected').val() );

$('#inlineRadio1').click( function(){
    $("#estado").removeAttr("disabled");
    $('#localidad_id').val( $('#estado option:selected').val() );
    $('#estado').on('change', function(){
        $('#localidad_id').val(''+this.value+'');
    });
});

$('#inlineRadio2').click( function(){
    $("#estado").attr("disabled", "disabled");
    $('#localidad_id').val('NULL');
});
