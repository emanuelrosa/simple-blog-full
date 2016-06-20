$("#inputimglogo").change(function (event) {

    var val = $(this).val();

    switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
        case 'gif':
        case 'jpg':
        case 'png':

            var reader = new FileReader();
            $(reader).load(function (event) {
                //altera imagem
                $("#previewimglogo").css("display", 'block');
                $("#imgimglogo").css("display", 'none');

                $("#previewimglogo #previewimg").attr("src", event.target.result);
            });

            reader.readAsDataURL(event.target.files[0]);

            //configura envio banco de dados
            var formURL = $("#formconfigimg").attr('action');
            var fd = new FormData(document.querySelector("#formconfigimg"));

            fd.append("action", "imglogo");

            $.ajax({
                url: formURL,
                type: "POST",
                data: fd,
                contentType: false,
                cache: false,
                processData: false,
                success: function (msg) {
                    //console.log(msg);
                    var msg = msg.split("|");
                    if (msg[0] === "OK") {
                        $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
                    } else {
                        $("#previewimglogo").css("display", 'none');
                        $("#imgimglogo").css("display", 'block');

                        $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
                    }
                }
            });

            break;
        default:
            // error message here
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: Imagem inválida tente outra imagem.</div>');
            $(this).val('');
            break;
    }

    return false;
});
$("#btn-removerimglogo").click(function () {
    //configura envio banco de dados
    var formURL = $("#formconfigimg").attr('action');
    var fd = new FormData(document.querySelector("#formconfigimg"));

    fd.append("action", "imglogo");

    $.ajax({
        url: formURL,
        type: "POST",
        data: fd,
        contentType: false,
        cache: false,
        processData: false,
        success: function (msg) {
            //console.log(msg);
            var msg = msg.split("|");
            if (msg[0] === "OK") {
                $("#previewimglogo #previewimg").attr("src", "../../assets/images/config_img/default_logo.png");
                
                $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
            } else {
                $("#previewimglogo").css("display", 'none');
                $("#imgimglogo").css("display", 'block');

                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
            }
        }
    });
    
    return false;
});

$("#inputimgadm").change(function (event) {

    var val = $(this).val();

    switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
        case 'gif':
        case 'jpg':
        case 'png':

            var reader = new FileReader();
            $(reader).load(function (event) {
                //altera imagem
                $("#previewimgpaineladimin").css("display", 'block');
                $("#imgimgadm").css("display", 'none');

                $("#previewimgpaineladimin #previewimg").attr("src", event.target.result);
            });

            reader.readAsDataURL(event.target.files[0]);

            //configura envio banco de dados
            var formURL = $("#formconfigimg").attr('action');
            var fd = new FormData(document.querySelector("#formconfigimg"));

            fd.append("action", "imgadm");

            $.ajax({
                url: formURL,
                type: "POST",
                data: fd,
                contentType: false,
                cache: false,
                processData: false,
                success: function (msg) {
                    //console.log(msg);
                    var msg = msg.split("|");
                    if (msg[0] === "OK") {
                        $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
                    } else {
                        $("#previewimgpaineladimin").css("display", 'none');
                        $("#imgimgadm").css("display", 'block');

                        $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
                    }
                }
            });

            break;
        default:
            // error message here
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: Imagem inválida tente outra imagem.</div>');
            $(this).val('');
            break;
    }

    return false;
});
$("#btn-removerimgadm").click(function () {
    //configura envio banco de dados
    var formURL = $("#formconfigimg").attr('action');
    var fd = new FormData(document.querySelector("#formconfigimg"));

    fd.append("action", "imgadm");

    $.ajax({
        url: formURL,
        type: "POST",
        data: fd,
        contentType: false,
        cache: false,
        processData: false,
        success: function (msg) {
            //console.log(msg);
            var msg = msg.split("|");
            if (msg[0] === "OK") {
                $("#previewimgpaineladimin #previewimg").attr("src", "../../assets/images/config_img/default_logo.png");
                
                $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
            } else {
                $("#previewimgpaineladimin").css("display", 'none');
                $("#imgimgadm").css("display", 'block');

                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
            }
        }
    });
    
    return false;
});

$("#inputimgban").change(function (event) {

    var val = $(this).val();

    switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
        case 'gif':
        case 'jpg':
        case 'png':

            var reader = new FileReader();
            $(reader).load(function (event) {
                //altera imagem
                $("#previewimgban").css("display", 'block');
                $("#imgimgban").css("display", 'none');

                $("#previewimgban #previewimg").attr("src", event.target.result);
            });

            reader.readAsDataURL(event.target.files[0]);

            //configura envio banco de dados
            var formURL = $("#formconfigimg").attr('action');
            var fd = new FormData(document.querySelector("#formconfigimg"));

            fd.append("action", "imgban");

            $.ajax({
                url: formURL,
                type: "POST",
                data: fd,
                contentType: false,
                cache: false,
                processData: false,
                success: function (msg) {
                    //console.log(msg);
                    var msg = msg.split("|");
                    if (msg[0] === "OK") {
                        $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
                    } else {
                        $("#previewimgban").css("display", 'none');
                        $("#imgimgban").css("display", 'block');

                        $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
                    }
                }
            });

            break;
        default:
            // error message here
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: Imagem inválida tente outra imagem.</div>');
            $(this).val('');
            break;
    }

    return false;
});
$("#btn-removerimgban").click(function () {
    //configura envio banco de dados
    var formURL = $("#formconfigimg").attr('action');
    var fd = new FormData(document.querySelector("#formconfigimg"));

    fd.append("action", "imgban");

    $.ajax({
        url: formURL,
        type: "POST",
        data: fd,
        contentType: false,
        cache: false,
        processData: false,
        success: function (msg) {
            //console.log(msg);
            var msg = msg.split("|");
            if (msg[0] === "OK") {
                $("#previewimgban #previewimg").attr("src", "../../assets/images/config_img/default_ban.png");
                
                $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
            } else {
                $("#previewimgban").css("display", 'none');
                $("#imgimgban").css("display", 'block');

                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
            }
        }
    });
    
    return false;
});

$("#inputimggif").change(function (event) {

    var val = $(this).val();

    switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
        case 'gif':
        case 'jpg':
        case 'png':

            var reader = new FileReader();
            $(reader).load(function (event) {
                //altera imagem
                $("#previewimggif").css("display", 'block');
                $("#imgimggif").css("display", 'none');

                $("#previewimggif #previewimg").attr("src", event.target.result);
            });

            reader.readAsDataURL(event.target.files[0]);

            //configura envio banco de dados
            var formURL = $("#formconfigimg").attr('action');
            var fd = new FormData(document.querySelector("#formconfigimg"));

            fd.append("action", "imggif");

            $.ajax({
                url: formURL,
                type: "POST",
                data: fd,
                contentType: false,
                cache: false,
                processData: false,
                success: function (msg) {
                    //console.log(msg);
                    var msg = msg.split("|");
                    if (msg[0] === "OK") {
                        $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
                    } else {
                        $("#previewimggif").css("display", 'none');
                        $("#imgimggif").css("display", 'block');

                        $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
                    }
                }
            });

            break;
        default:
            // error message here
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: Imagem inválida tente outra imagem.</div>');
            $(this).val('');
            break;
    }

    return false;
});
$("#btn-removerimggif").click(function () {
    //configura envio banco de dados
    var formURL = $("#formconfigimg").attr('action');
    var fd = new FormData(document.querySelector("#formconfigimg"));

    fd.append("action", "imggif");

    $.ajax({
        url: formURL,
        type: "POST",
        data: fd,
        contentType: false,
        cache: false,
        processData: false,
        success: function (msg) {
            //console.log(msg);
            var msg = msg.split("|");
            if (msg[0] === "OK") {
                $("#previewimggif #previewimg").attr("src", "../../assets/images/config_img/default_gif.png");
                
                $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
            } else {
                $("#previewimggif").css("display", 'none');
                $("#imgimggif").css("display", 'block');

                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
            }
        }
    });
    
    return false;
});


$('#formgerais').submit(function () {
    var formURL = $("#formgerais").attr('action');
    var postData = $("#formgerais").serialize();

    $.ajax({
        url: formURL,
        type: "POST",
        data: postData + "&action=gerais",
        dataType: "html",
        success: function (msg) {
            //alert(msg);
            var msg = msg.split("|");
            if (msg[0] === "OK") {
                $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
            } else {
                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
            }
        }
    });
    return false;
});

$('#forminteg').submit(function () {
    var formURL = $("#forminteg").attr('action');
    var postData = $("#forminteg").serialize();

    $.ajax({
        url: formURL,
        type: "POST",
        data: postData + "&action=integracao",
        dataType: "html",
        success: function (msg) {
            //alert(msg);
            var msg = msg.split("|");
            if (msg[0] === "OK") {
                $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
            } else {
                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
            }
        }
    });
    return false;
});

$('#formsocial').submit(function () {
    var formURL = $("#formsocial").attr('action');
    var postData = $("#formsocial").serialize();

    $.ajax({
        url: formURL,
        type: "POST",
        data: postData + "&action=social",
        dataType: "html",
        success: function (msg) {
            //alert(msg);
            var msg = msg.split("|");
            if (msg[0] === "OK") {
                $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
            } else {
                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
            }
        }
    });
    return false;
});

$('#formconfigcoment').submit(function () {
    var formURL = $("#formconfigcoment").attr('action');
    var postData = $("#formconfigcoment").serialize();

    $.ajax({
        url: formURL,
        type: "POST",
        data: postData + "&action=configcomentario",
        dataType: "html",
        success: function (msg) {
            //alert(msg);
            var msg = msg.split("|");
            if (msg[0] === "OK") {
                $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
            } else {
                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
            }
        }
    });
    return false;
});


