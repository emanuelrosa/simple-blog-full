$("#form").submit(function () {

    if ($('#action').val() !== "social") {
        var texto = CKEDITOR.instances.inputConteudo.getData();
        $('#inputCont').val(texto);
    }

    var formURL = $("#form").attr('action');
    var postData = $("#form").serialize();

    $.ajax({
        url: formURL,
        type: "POST",
        data: postData,
        dataType: "html",
        success: function (msg) {
            //alert(msg);
            var msg = msg.split("|");
            if (msg[0] === "OK") {
                $('#inputid').val(msg[2]);
                $('#error-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + msg[1] + '</div>');
            } else {
                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + msg[1] + '</div>');
            }
        }
    });
    return false;
});