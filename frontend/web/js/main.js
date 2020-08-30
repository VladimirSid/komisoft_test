
function showMdl(url, title){
    id = $.ajax({
        url: url,
        data: {id: title},
        type: 'GET',
        success: function (data) {
            $('#modal').modal('show').find('#modalContent').html(data);
            $('#modal-title').text(title);
        }
    });
    return false;
}

function redirectDevice(e, event) {
    event.preventDefault();
    $('#modal').modal('hide');
    window.open(e.getAttribute('href'));
}