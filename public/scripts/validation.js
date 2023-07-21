// function print errorMsg validation
function printErrorMsg(msg) {
    $.each(msg.responseJSON.errors, function(key, value) {
        $("#" + key).next().html(value[0]);
        $("#" + key).next().removeClass('d-none');
    });
}
