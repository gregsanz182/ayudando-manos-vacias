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

$('#inlineRadio1').click( function(){
    $("#estado").removeAttr("disabled");
    $('#estado').on('change', function(){
        $('#localidad_id').val(this.value+'');
    })
});

$('#inlineRadio2').click( function(){
    $("#estado").attr("disabled", "disabled");
    $('#localidad_id').val('NULL');
});
