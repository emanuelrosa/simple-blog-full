jQuery(function ($) {
    $('.datetimepicker').datetimepicker();

    $('#load').css('display', 'none');

    //se não tiver post para editar
    var queryPairs = window.location.href.split('?').pop().split('&');
    for (var i = 0; i < queryPairs.length; i++) {
        var pair = queryPairs[i].split('/');
        if (pair[1] === 'post') {
            $('#d-autor').css('display', 'none');
            $('#d-conteudo').css('display', 'block');
        } else {
            $('#d-autor').css('display', 'block');
            $('#d-conteudo').css('display', 'none');
        }
    }

    $('#inputtitulo').keyup(function () {
        if ($('#inputid').val() === '') {
            var newString = $('#inputtitulo').val().toLowerCase().replace(/[^A-Z0-9]/ig, "_");
            $('#inputlink').val(newString);
        }
    });
    $('#inputtitulo').focusout(function () {
        if ($('#inputid').val() === '') {
            var newString = $('#inputtitulo').val().toLowerCase().replace(/[^A-Z0-9]/ig, "_");
            $('#inputlink').val(newString);
        }
    });
    $('#btn-autor').click(function () {
        if ($('#inputautor option:selected').val() !== "") {
            $('#lbl-autor').html("autor: <b>" + $('#inputautor option:selected').text() + "</b>");
            $('#inputidautor').val($('#inputautor option:selected').val());
            $('#d-autor').css('display', 'none');
            $('#d-conteudo').css('display', 'block');
        } else {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Selecione o autor da postagem.</div>');
            $('#inputautor').focus();
            return false;
        }

        return false;
    });
    $(document).on('input', '#inputresumo', function () {
        var limite = 255;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;
        if (caracteresDigitados <= limite) {
            $('#rest').text(caracteresRestantes);
        } else {
            var valor = $(this).val();
            $(this).val(valor.substr(0, limite));
        }
    });
    $("#inputimg").change(function (event) {
        var val = $(this).val();
        switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
            case 'gif':
            case 'jpg':
            case 'png':

                var reader = new FileReader();
                $(reader).load(function (event) {
                    $("#previewimg").attr("src", event.target.result);
                    $("#previewimgban").css("display", 'block');
                    $(".previewimg").css("display", 'block');
                    $(".image-upload").css("display", 'none');
                    $("#inputeditimg").val("S");
                });
                reader.readAsDataURL(event.target.files[0]);
                break;
            default:
                $(this).val('');
                // error message here
                //$("#no-image").modal('show');
                alert("Imagem inválida!");
                break;
        }
    });
    $("#btn-removerimg").click(function () {
        $("#previewimg").attr("src", "");
        $("#imgban").attr("src", "../../assets/images/ban_posts/default-ban.png");
        $("#inputimg").val("");
        $("#inputeditimg").val("S");
        $("#previewimgban").css("display", 'none');
        $(".previewimg").css("display", 'none');
        $(".image-upload").css("display", 'block');
        return false;
    });

    $("#formpost").submit(function () {
        $('#load').css('display', 'block');
        $('#load').focus();

        var texto = CKEDITOR.instances.inputConteudo.getData();
        $('#inputCont').val(texto);
        var formURL = $("#formpost").attr('action');
        var fd = new FormData(this);
        if ($('#inputid').val() === '') {
            fd.append("action", "add");
        } else {
            fd.append("action", "edit");
        }

        //validação de campos
        if ($('#inputtitulo').val() === "") {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Título da postagem obrigatório.</div>');
            $('#inputtitulo').focus();
            $('#load').css('display', 'none');
            return false;
        } else if ($('#inputlink').val() === "") {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Link poermanente para postagem obrigatório.</div>');
            $('#inputlink').focus();
            $('#load').css('display', 'none');
            return false;
        } else if ($('#selectCategoria option:selected').val() === "") {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Selecione a categoria para a postagem, sua postagem precisa estár em uma categoria.</div>');
            $('#selectCategoria').focus();
            $('#load').css('display', 'none');
            return false;

        }

        $.ajax({
            url: formURL,
            type: "POST",
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            success: function (msg) {
                //alert(msg);
                var msg = msg.split("|");
                if (msg[0] === "OK") {
                    window.location.href = "./?bloglist";
                } else {
                    $('#load').css('display', 'none');
                    $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg + '</div>');
                }
            }
        });
        return false;
    });
    $(".btn-salvar").on('click', function () {
        $('#load').css('display', 'block');
        $('#load').focus();

        var texto = CKEDITOR.instances.inputConteudo.getData();
        $('#inputCont').val(texto);

        var formURL = $("#formpost").attr('action');
        var fd = new FormData(document.querySelector("#formpost"));
        if ($('#inputid').val() === '') {
            fd.append("action", "add");
        } else {
            fd.append("action", "edit");
        }

        $.ajax({
            url: formURL,
            type: "POST",
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            success: function (msg) {
                //alert(msg);
                var msg = msg.split("|");
                if (msg[0] === "OK") {
                    //get url
                    var hostname = window.location.hostname;
                    //altera link visualizar
                    $('.btn-visualizar').attr('href', 'http://' + hostname + '/preview/' + $('#inputlink').val());
                    $('#error-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg + '</div>');
                    $('#load').css('display', 'none');
                } else {
                    $('#load').css('display', 'none');
                    $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg + '</div>');
                }
            }
        });
        return false;
    });
    $(".btn-voltar").click(function () {
        window.history.back(-1);
    });
});
