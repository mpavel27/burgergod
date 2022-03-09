$(document).ready(function() {
    $('#app_dataTable').dataTable( {
        "order": [[ 0, "desc" ]]
    } );
    $('#admin_categories').dataTable();

    if($('#valueId1').prop("checked", true)) {
        $('#price').hide();
        $('#priceInput').attr('value', '0');
    }

    if($('#valueId2').prop("checked", true)) {
        $('#price').show();
        $('#priceInput').removeAttr('value');
    }

    $('#valueId1').click(function () {
        if($(this).prop("checked", true)) {
            $('#price').hide();
            $('#priceInput').attr('value', '0');
        }
    });

    $('#valueId2').click(function () {
        if($(this).prop("checked", true)) {
            $('#price').show();
            $('#priceInput').removeAttr('value');
        }
    });
});
