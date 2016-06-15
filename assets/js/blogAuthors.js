function dataTableConfig() {
    var conf = {
        "responsive": true,
        "aaSorting": [],
        "language": {
            "lengthMenu": "Mostrando _MENU_ por página",
            "zeroRecords": "Nenhum registro - Desculpe!",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Filtro : ",
            "paginate": {
                "first": "<<",
                "last": ">>",
                "next": ">",
                "previous": "<"
            }
        }
    };
    return conf;
}

function resetForm() {
    $('#fileimg').css('display', 'block');
    $('#previewimgperfil').css('display', 'none');

    $('#btnAdd').css('display', 'block');
    $('#btnEdit').css('display', 'none');

    $("#inputid").val('');
    $("#inputimage").val('');
    $('#imguser').attr('src', '../../assets/images/authors/user-default.png');
    $("#inputestado").val('');

    $("#inputnome").val('');
    $("#inputperfil").val('');
}

jQuery(function ($) {
    $('#dataTables-author').DataTable(dataTableConfig());

    $(document).on('click', '.btnLoadAutor', function () {
        $("#inputid").val($(this).attr('data-id'));

        $.ajax({
            url: "./actions/authors.php",
            type: "POST",
            data: "action=loadAutor&id=" + $(this).attr('data-id'),
            dataType: "html",
            success: function (msg) {
                //alert(msg);
                var msg = msg.split("|");
                if (msg[0] === "OK") {
                    $("#inputid").val(msg[1]);
                    $("#inputimagem").val(msg[2]);
                    $('#imguser').attr('src', (msg[2] === '') ? '../../assets/images/authors/user-default.png' : '../../assets/images/authors/' + msg[2]);

                    $("#inputnome").val(msg[3]);
                    $("#inputperfil").val(msg[4]);
                    $("#inputestado").val(msg[5]);

                    $('#btnAdd').css('display', 'none');
                    $('#btnEdit').css('display', 'block');
                }
            }
        });
    });

    $(document).on('click', '.btnRemove', function () {
        var id = $(this).attr('data-id');

        bootbox.confirm("Você têm certeza que deseja remover esta categoria, todas as postagens desta categoria também serão removidas do banco de dados?", function (result) {
            if (result) {

                $.ajax({
                    url: "./actions/authors.php",
                    type: "POST",
                    data: "action=remove&id=" + id,
                    dataType: "html",
                    success: function (msg) {
                        //alert(msg);
                        var msg = msg.split("|");
                        if (msg[0] === "OK") {
                            $("#" + id).remove();
                        }
                    }
                });

            }
        });

    });

    $(document).on('click', '.btnChangeEstado', function () {
        var id = $(this).attr('data-id');

        $.ajax({
            url: "./actions/authors.php",
            type: "POST",
            data: "action=changeEstado&id=" + id,
            dataType: "html",
            success: function (msg) {
                //alert(msg);
                var msg = msg.split("|");
                if (msg[0] === "OK") {
                    if (msg[1] === '0') {
                        //inativo 0
                        $("#btnEstado-" + id).removeClass('btn-success');
                        $("#btnEstado-" + id).addClass('btn-danger');
                        $("#btnEstado-" + id).html(' Inativo ');
                    } else {
                        //ativo 1
                        $("#btnEstado-" + id).removeClass('btn-danger');
                        $("#btnEstado-" + id).addClass('btn-success');
                        $("#btnEstado-" + id).html(' Ativo ');
                    }
                }
            }
        });
    });

    $("#btn-edit").click(function () {
        var formURL = $("#formaut").attr('action');
        var formData = new FormData(document.querySelector("form"));

        formData.append('action', 'edit');

        $.ajax({
            url: formURL,
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (msg) {
                //alert(msg);
                var msg = msg.split("|");
                if (msg[0] === "OK") {
                    $("#listAutor").load("?authors #listAutor", function (response, status, xhr) {
                        if (status == "success") {
                            $('#dataTables-author').DataTable(dataTableConfig());
                            //reset formulario
                            resetForm();
                        }
                    });
                }
            }
        });
        return false;
    });
    $('.btn-cancel').click(function () {
        resetForm();
    });

    $("#formaut").submit(function () {
        var formURL = $("#formaut").attr('action');
        var fd = new FormData(this);
        fd.append("action", "add");

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
                    $("#listAutor").load("?authors #listAutor", function (response, status, xhr) {
                        if (status == "success") {
                            $('#dataTables-author').DataTable(dataTableConfig());
                            resetForm();
                        }
                    });
                }
            }
        });
        return false;
    });

    $("#inputimg").change(function (event) {
        var val = $(this).val();

        switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
            case 'gif':
            case 'jpg':
            case 'png':
            case 'tiff':

                var reader = new FileReader();
                $(reader).load(function (event) {
                    $("#previewimg").attr("src", event.target.result);
                    $("#previewimgperfil").css("display", 'block');
                    $(".previewimg").css("display", 'block');
                    $("#fileimg").css("display", 'none');
                    $("#inputimagem").val(event.target.result);
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
        $("#inputimage").val('');
        $('#imguser').attr('src', '../../assets/images/authors/user-default.png');
        return false;
    });
});