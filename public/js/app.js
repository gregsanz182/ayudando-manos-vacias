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

$('#buscar_cancer').on('click', function(){
    $.ajax({
        method: 'POST',
        url: tipoCancer,
        data: {
            id: $('#tipo_c option:selected').val(),
            _token: token
        },
        success: function(data){
            $('#id').val(data.id);
            $('#tipo_c_a').val(data.nombre);
            $('#desc_c_a').val(data.descripcion);
        }
    });
});

$('#buscar_medicamento').on('click', function(){
    $.ajax({
        method: 'POST',
        url: medicamento,
        data: {
            id: $('#nombre_m option:selected').val(),
            _token: token
        },
        success: function(data){
            $('#id').val(data.id);
            $('#nombre_m_a').val(data.nombre);
            $('#desc_m_a').val(data.descripcion);
        }
    });
});

$('#buscar_insumo').on('click', function(){
    $.ajax({
        method: 'POST',
        url: insumo,
        data: {
            id: $('#nombre_i option:selected').val(),
            _token: token
        },
        success: function(data){
            $('#id').val(data.id);
            $('#nombre_i_a').val(data.nombre);
        }
    });
});

$('#buscar_localidad').on('click', function(){
    $.ajax({
        method: 'POST',
        url: localidad,
        data: {
            id: $('#nombre_l option:selected').val(),
            _token: token
        },
        success: function(data){
            $('#id').val(data.id);
            $('#nombre_l_a').val(data.nombre);
        }
    });
});

$('#localidad_id').val( $('#estado option:selected').val() );

$('#inlineRadio1').click( function(){
    $("#estado").removeAttr("disabled");
    $('#localidad_id').val( $('#estado option:selected').val() );
    $('#estado').on('change', function(){
        $('#localidad_id').val(this.value);
    })
});

$('#inlineRadio2').click( function(){
    $("#estado").attr("disabled", "disabled");
    $('#localidad_id').val('NULL');
});

$('#toggle-event1').on('click', function(){
    if( $(this).prop('checked') ){
        $('#opc1').hide();
        $('#opc2').show();
    }else{
        $('#opc1').show();
        $('#opc2').hide();
    }
});

$('#toggle-event2').change(function(){
    if( $(this).prop('checked') ){
        $('#opc3').hide();
        $('#opc4').show();
    }else{
        $('#opc3').show();
        $('#opc4').hide();
    }
});

$('#toggle-event3').change(function(){
    if( $(this).prop('checked') ){
        $('#opc5').hide();
        $('#opc6').show();
    }else{
        $('#opc5').show();
        $('#opc6').hide();
    }
});

$('#toggle-event4').change(function(){
    if( $(this).prop('checked') ){
        $('#opc7').hide();
        $('#opc8').show();
    }else{
        $('#opc7').show();
        $('#opc8').hide();
    }
});