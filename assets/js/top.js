$("#inputimgtop").change(function (event) {

    var val = $(this).val();

    switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
        case 'gif':
        case 'jpg':
        case 'png':

            var reader = new FileReader();
            $(reader).load(function (event) {
                //altera imagem
                $("#previewimgtop").css("display", 'block');
                $("#imgimgtop").css("display", 'none');

                $("#previewimgtop #previewimg").attr("src", event.target.result);
            });

            reader.readAsDataURL(event.target.files[0]);

            //configura envio banco de dados
            var formURL = $("#formconfigimg").attr('action');
            var fd = new FormData(document.querySelector("#formconfigimg"));

            fd.append("action", "imgtop");

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
                        $("#previewimgtop").css("display", 'none');
                        $("#imgimgtop").css("display", 'block');

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
$("#btn-removerimgtop").click(function () {
    //configura envio banco de dados
    var formURL = $("#formconfigimg").attr('action');
    var fd = new FormData(document.querySelector("#formconfigimg"));

    fd.append("action", "imgtop");

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
                $("#previewimgtop #previewimg").attr("src", "../../assets/images/config_img/default_top.png");
                
                $('#success-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
            } else {
                $("#previewimgtop").css("display", 'none');
                $("#imgimgtop").css("display", 'block');

                $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
            }
        }
    });
    
    return false;
});