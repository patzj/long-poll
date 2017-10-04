"use strict";

function getStatus() {
    var id = $('#id').val(); // get value from input[type=hidden]
    var status = $('#status').text(); // get text inside span tag
    console.log(status);
    $.ajax({
        url: 'get_status_api.php',
        method: 'POST',
        data: { id: id, status: status },
        success: function(data) {
            $('#status').text(data);
            setTimeout(getStatus, 500); // recursive call after 0.5 sec
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(textStatus);
        }
    });
}

getStatus(); // initial call
