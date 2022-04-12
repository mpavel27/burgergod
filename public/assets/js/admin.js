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

function assignOrder(id) {
    $('#order_id').attr('value', id);
}

function finishOrder(id) {
    $('#finish_order_id').attr('value', id);
}

function markFinishedOrder(id) {
    $('#mark_finish_order_id').attr('value', id);
}

function markAsDelivered(id) {
    $('#mark_delivered_order_id').attr('value', id);
}
