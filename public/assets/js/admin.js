$(document).ready(function() {
    $('#app_dataTable').dataTable();
    $('#admin_categories').dataTable();

    if($('#valueId1').prop("checked", true)) {
        $('#price').hide();
    }

    if($('#valueId2').prop("checked", true)) {
        $('#price').show();
    }

    $('#valueId1').click(function () {
        if($(this).prop("checked", true)) {
            $('#price').hide();
        }
    });

    $('#valueId2').click(function () {
        if($(this).prop("checked", true)) {
            $('#price').show();
        }
    });
});
