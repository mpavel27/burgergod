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

function viewDetails(id, user_name, user_phone_number, user_address, user_email, payment_type, city, shipping_type, sub_total, delivery_cost, placed_time, preparing_date, dispatching_date, delivered_date, cart) {
    $('#details_form').append('<p class="m-0"><b>Order Id:</b> ' + id + '</p>')
    $('#details_form').append('<p class="m-0"><b>Nume Prenume:</b> ' + user_name + '</p>')
    $('#details_form').append('<p class="m-0"><b>Adresa:</b> ' + user_address + '</p>')
    $('#details_form').append('<p class="m-0"><b>Oras:</b> ' + city + '</p>')
    $('#details_form').append('<p class="m-0"><b>E-mail client:</b> ' + user_email + '</p>')
    $('#details_form').append('<p class="m-0"><b>Tip:</b> ' + payment_type + '</p>')
    if(shipping_type == 1)
        $('#details_form').append('<p class="m-0"><b>Tip comanda:</b> Livrare</p>')
    else
        $('#details_form').append('<p class="m-0"><b>Tip comanda:</b> Ridicare</p>')
    $('#details_form').append('<p class="m-0"><b>Sub Total:</b> ' + sub_total + '</p>')
    $('#details_form').append('<p class="m-0"><b>Taxa de livrare:</b> ' + delivery_cost + '</p>')
    $('#details_form').append('<p class="m-0"><b>Comanda a fost plasata:</b> ' + placed_time + '</p>')
    $('#details_form').append('<p class="m-0"><b>Comanda a fost preparata:</b> ' + preparing_date + '</p>')
    $('#details_form').append('<p class="m-0"><b>Comanda a fost trimisa:</b> ' + dispatching_date + '</p>')
    $('#details_form').append('<p class="m-0"><b>Comanda a fost livrata:</b> ' + delivered_date + '</p>')
    $('#details_form').append('<p class="m-0"><b>Cos:</b></p>')
    $('#details_form').append('<p class="m-0">' + cart + '</p>')
}

$('.details_close').click(function () {
    $('#details_form').empty();
});

var isSidebarCollapsed = false;

$('#collapse_button').click(function () {
    if(isSidebarCollapsed == false) {
        $('#sidebar').addClass('collpased');
        $('#content').addClass('collapsed');
        isSidebarCollapsed = true
    } else {
        $('#sidebar').removeClass('collpased');
        $('#content').removeClass('collapsed');
        isSidebarCollapsed = false
    }
});
