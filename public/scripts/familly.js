var table = $("#table-family").DataTable({
    processing: true,
    serverSide: true,
    ajax: route("family.data"),
    columns: [
        {
            data: "DT_RowIndex",
            orderable: false,
            searchable: false,
        },

        {
            data: "parent",
        },
        {
            data: "name",
        },
        {
            data: "gender",
        },
        {
            data: "action",
        }
    ],
    aLengthMenu: [
        [5, 10, 15, -1],
        [5, 10, 15, "All"],
    ],
    iDisplayLength: 10,
    language: {
        search: "",
    },
});


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
        },
    });
    buttonAdd();
    saveBook();
    showEditData();
    updateData();
});

function buttonAdd() {
    $("#add-familly-button").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: route("family.create"),
            data: {
                key: "familly_create",
            },
            success: function (data) {
                $("#modal-content").html(data);
                $("#modal-familly-show").modal("show");
            },
        });
    });
}

function saveBook() {
    $("body").on("submit", "#form-add-familly", function (e) {
        e.preventDefault();
        // Create a FormData object to store the form data
        var formData = new FormData(this);

        // Send an AJAX request to upload the image
        $.ajax({
            url: route("family.store"),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                showAlert("success", "data berhasil disimpan");
                $("#modal-familly-show").modal("hide");
                table.draw();
            },
            error: function(response) {
                // handler error validation
                printErrorMsg(response);
            },
        });
    });
}
function showEditData(){
//     btn-edit-familly
    $("body").on("click", ".btn-edit-familly", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        $.ajax({
            type: "GET",
            url: route("family.edit"),
            data: {
                key: "familly_edit",
                id: id
            },
            success: function (data) {
                $("#modal-content").html(data);
                $("#modal-familly-show").modal("show");
            },
        });
    })
}

function updateData(){
//     btn-edit-familly
    $("body").on("submit", "#form-update-familly", function (e) {
        e.preventDefault();
        e.preventDefault();
        // Create a FormData object to store the form data
        var formData = new FormData(this);

        // Send an AJAX request to upload the image
        $.ajax({
            url: route("family.update"),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                showAlert("success", "data berhasil diubah");
                $("#modal-familly-show").modal("hide");
                table.draw();
            },
            error: function(response) {
                // handler error validation
                printErrorMsg(response);
            },
        });
    });
}

