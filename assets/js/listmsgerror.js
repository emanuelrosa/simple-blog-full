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

jQuery(function ($) {
    $('#dataTables-msg').DataTable(dataTableConfig());

    $(document).on('click', '.btn-edit', function () {
        var post = $(this).attr('data-id');

        bootbox.confirm("Você têm certeza que deseja Alterar a situação desta mensagem?", function (result) {
            if (result) {
                $.ajax({
                    url: "./actions/institutional.php",
                    type: "POST",
                    data: "action=editmsgerror&id=" + post,
                    dataType: "html",
                    success: function (msg) {
                        //alert(msg);
                        var msg = msg.split("|");
                        if (msg[0] === "OK") {
                            bootbox.alert("Postagem Removida com sucesso!", function () {
                                $("#listMsg").load("?errormessage #listMsg", function (response, status, xhr) {
                                    if (status == "success") {
                                        $('#dataTables-msg').DataTable(dataTableConfig());
                                    }
                                });
                            });
                        }
                    }
                });
            }
        });

    });
    $(document).on('click', '.btn-remove', function () {
        var post = $(this).attr('data-id');

        bootbox.confirm("Você têm certeza que deseja remover esta postagem?", function (result) {
            if (result) {
                $.ajax({
                    url: "./actions/institutional.php",
                    type: "POST",
                    data: "action=removemsgerror&id=" + post,
                    dataType: "html",
                    success: function (msg) {
                        //alert(msg);
                        var msg = msg.split("|");
                        if (msg[0] === "OK") {
                            $("#" + post).remove();

                            bootbox.alert("Postagem Removida com sucesso!", function () {
                                $("#listMsg").load("?errormessage #listMsg", function (response, status, xhr) {
                                    if (status == "success") {
                                        $('#dataTables-msg').DataTable(dataTableConfig());
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