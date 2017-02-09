function btnprevisualizar() {
    if ($('#inputid').val() === '') {
        $(".btn-visualizar").attr("disabled", "disabled");
    } else {
        $(".btn-visualizar").removeAttr("disabled");
    }
}
jQuery(function ($) {
    $('#load').css('display', 'none');
    btnprevisualizar();

    $('#inputtitulo').keyup(function () {
        var newString = $('#inputtitulo').val().toLowerCase().replace(/[^A-Z0-9]/ig, "_");
        $('#inputlink').val(newString);
    });
    $('#inputtitulo').focusout(function () {
        var newString = $('#inputtitulo').val().toLowerCase().replace(/[^A-Z0-9]/ig, "_");
        $('#inputlink').val(newString);

        var t = $("#inputtitulo").val().length;
        if (t == 0) {
            $('.alerttitulo').css('display', 'block');
        } else {
            $('.alerttitulo').css('display', 'none');
        }
    });

    $('#inputresumo').focusout(function () {
        var t = $("#inputresumo").val().length;
        if (t == 0) {
            $('.alertresumo').css('display', 'block');
        } else {
            $('.alertresumo').css('display', 'none');
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

    $(document).on('input', '#inputtitulo', function () {
        var limite = 50;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;
        if (caracteresDigitados <= limite) {
            $('#rest-titulo').text(caracteresRestantes);
        } else {
            var valor = $(this).val();
            $(this).val(valor.substr(0, limite));
        }
    });
    $(document).on('input', '#inputresumo', function () {
        var limite = 220;
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
        $("#imgban").attr("src", "../assets/images/ban_posts/default-ban.png");
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
            fd.append("action", "addPost");
        } else {
            fd.append("action", "editPost");
        }

        //validação de campos
        var resumo = $("#inputresumo").val().length;

        if ($('#inputtitulo').val() === "") {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Título da postagem obrigatório.</div>');
            $('#inputtitulo').focus();
            $('#load').css('display', 'none');
            return false;
        } else if (resumo === 0) {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Resumo da postagem obrigatório.</div>');
            $('#inputresumo').focus();
            $('#load').css('display', 'none');
            return false;
        } else if ($('#selectCategoria option:selected').val() === "") {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Selecione a Categoria da postagem, é obrigatório.</div>');
            $('#inputresumo').focus();
            $('#load').css('display', 'none');
            return false;
        } else if ($('#inputtags').val() === "") {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tag da postagem obrigatório.</div>');
            $('#inputtags').focus();
            $('#load').css('display', 'none');
            return false;
        } else if ($('#inputCont').val() === "") {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Texto da postagem obrigatório.</div>');
            $('#inputConteudo').focus();
            $('#load').css('display', 'none');
            return false;
        }

        fd.append("inputestado", "2");

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
                    window.location.href = "./";
                } else {
                    $('#load').css('display', 'none');
                    $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg + '</div>');
                }
            }
        });
        return false;
    });
    $(".btn-visualizar").on('click', function () {
        //get url
        var hostname = window.location.hostname;
        //altera link visualizar
        window.open('http://' + hostname + '/preview/' + $('#inputlink').val());
        return false;
    });
    $(".btn-salvar").on('click', function () {
        $('#load').css('display', 'block');
        $('#load').focus();

        if ($('#inputtitulo').val() === "") {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Título da postagem obrigatório.</div>');
            $('#inputtitulo').focus();
            $('#load').css('display', 'none');
            return false;
        } else if ($('#selectCategoria option:selected').val() === "") {
            $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Selecione a categoria para a postagem, sua postagem precisa estár em uma categoria.</div>');
            $('#selectCategoria').focus();
            $('#load').css('display', 'none');
            return false;

        }

        var texto = CKEDITOR.instances.inputConteudo.getData();
        $('#inputCont').val(texto);

        var formURL = $("#formpost").attr('action');
        var fd = new FormData(document.querySelector("#formpost"));
        if ($('#inputid').val() === '') {
            fd.append("action", "addPost");
        } else {
            fd.append("action", "editPost");
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
                    $('#error-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Success: ' + msg[1] + '</div>');
                    $('#load').css("display", "none");
                    $('#inputid').val(msg[2]);
                    $(".btn-visualizar").removeAttr("disabled");
                } else {
                    $('#load').css('display', 'none');
                    $('#error-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error: ' + msg[1] + '</div>');
                }
            }
        });
        return false;
    });
    $(".btn-voltar").click(function () {
        window.history.back(-1);
    });
});
