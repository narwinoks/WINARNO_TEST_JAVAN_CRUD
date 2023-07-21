function showAlert(color, message) {
    $.notify({
        // options
        message: message
    }, {
        // settings
        type: color,
        offset: {
            x: 15,
            y: 68
        }
    });
}
