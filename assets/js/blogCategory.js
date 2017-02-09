function dataTableConfig() {
    var conf = {
        responsive: true,
        "aoColumns": [
            null, {"bSortable": false}, null, {"bSortable": false}
        ],
        "aaSorting": [],
        "language": {
            "lengthMenu": "Mostrando _MENU_ por página",
            "zeroRecords": "Nenhum registro - Desculpe!",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Sem Registros encontrados",
            "infoFiltered": "(Filtrando _MAX_ registros)",
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
    $('#btnAdd').css('display', 'block');
    $('#btnEdit').css('display', 'none');
    $("#inputid").val('');
    $("#inputestado").val('');
    $("#selectpai").load("./?blogcategory #selectpai");
    $("#inputpai").val('NULL');
    $("#inputnome").val('');
    $("#inputslug").val('');
    $("#inputdescricao").val('');
}

jQuery(function ($) {
    $('#dataTables-category').DataTable(dataTableConfig());

    $(document).on('click', '.btnLoadCategoria', function () {
        $("#inputid").val($(this).attr('data-id'));
        $('#btnAdd').css('display', 'none');
        $('#btnEdit').css('display', 'block');
        $.ajax({
            url: "./actions/blogCategory.php",
            type: "POST",
            data: "action=loadCategoria&id=" + $(this).attr('data-id'),
            dataType: "html",
            success: function (msg) {
//                alert(msg);
                var msg = msg.split("|");
                if (msg[0] === "OK") {
                    $("#inputpai").val((msg[1] === "") ? 'NULL' : msg[1]);
                    $("#inputnome").val(msg[2]);
                    $("#inputslug").val(msg[3]);
                    $("#inputdescricao").val(msg[4]);
                    $("#inputestado").val(msg[5]);
                }
            }
        });
    });

    $(document).on('click', '.btnChangeEstado', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "./actions/blogCategory.php",
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
                        $("#btnEstado-" + id).html('<span class="glyphicon glyphicon-eye-close"></span>');
                    } else {
                        //ativo 1
                        $("#btnEstado-" + id).removeClass('btn-danger');
                        $("#btnEstado-" + id).addClass('btn-success');
                        $("#btnEstado-" + id).html('<span class="glyphicon glyphicon-eye-open"></span>');
                    }
                }
            }
        });
    });

    $("#btn-edit").click(function () {
        var formURL = $("#formcat").attr('action');
        var postData = $("#formcat").serialize();

        $.ajax({
            url: formURL,
            type: "POST",
            data: postData + "&action=edit",
            dataType: "html",
            success: function (msg) {
                //alert(msg);
                var msg = msg.split("|");
                if (msg[0] === "OK") {
                    $("#listCategoria").load("?blogcategory #listCategoria", function (response, status, xhr) {
                        if (status == "success") {
                            $('#dataTables-category').DataTable(dataTableConfig());
                            //reset formulario
                            resetForm();
                        }
                    });
                }
            }
        });
        return false;
    });

    $('#btn-cancel').click(function () {
        resetForm();
    });

    $("#formcat").submit(function () {
        var formURL = $("#formcat").attr('action');
        var postData = $("#formcat").serialize();

        $.ajax({
            url: formURL,
            type: "POST",
            data: postData + "&action=add",
            dataType: "html",
            success: function (msg) {
                //alert(msg);
                var msg = msg.split("|");
                if (msg[0] === "OK") {
                    $("#listCategoria").load("?blogcategory #listCategoria", function (response, status, xhr) {
                        if (status == "success") {
                            $('#dataTables-category').DataTable(dataTableConfig());
                            resetForm();
                        }
                    });
                }
            }
        });
        return false;
    });

    $(document).on('click', '.btnRemove', function () {
        var id = $(this).attr('data-id');

        bootbox.confirm("Você têm certeza que deseja remover esta categoria, todas as postagens desta categoria também serão removidas do banco de dados?", function (result) {
            if (result) {
                $.ajax({
                    url: "./actions/blogCategory.php",
                    type: "POST",
                    data: "action=remove&id=" + id,
                    dataType: "html",
                    success: function (msg) {
                        //alert(msg);
                        var msg = msg.split("|");
                        if (msg[0] === "OK") {
                            $("#" + id).remove();
                            $("#selectpai").load("./?blogcategory #selectpai");

                            bootbox.alert("Categoria Removida com sucesso!", function () {
                                $("#listCategoria").load("?blogcategory #listCategoria", function (response, status, xhr) {
                                    if (status == "success") {
                                        $('#dataTables-category').DataTable(dataTableConfig());
                                    }
                                });
                            });
                        }
                    }
                });
            }
        });
    });

});