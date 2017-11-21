
function fxAlertConfirm() {
        var x;
        if (confirm("Seguro de Realizar esta Acción??") == true) {
           return true;
        } else {
            return false;
        }
      //  document.getElementById("button").innerHTML = x;
    }
$(".use-address").click(function() {
    var address = [];
    $(this).closest('tr').find('td').not(':last').each(function() {
        var textval = $(this).text(); // this will be the text of each <td>
       address.push(textval);
   });
    alert(address.join('\n'));
});
$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#ModalDni").modal();
    });
});
$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#ModalCodigo").modal();
    });
});
$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#ModalNombre").modal();
    });
});
$(document).ready(function(){
$('#radioBtn span').on('click', function(){
        var sel = $(this).data('value');
        var tog = $(this).data('toggle');
        $('#'+tog).val(sel);
        $('span[data-toggle="'+tog+'"]').not('[data-value="'+sel+'"]').removeClass('active btn-primary').addClass('notActive btn-default');
        $('span[data-toggle="'+tog+'"][data-value="'+sel+'"]').removeClass('notActive btn-default').addClass('active btn-primary');
    });
    });
    



