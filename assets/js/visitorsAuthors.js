function dataTableConfig() {
    var conf = {
        responsive: true,
        "aoColumns": [
            {"bSortable": false}, null, {"bSortable": false}, null
        ],
        "aaSorting": [[3, "ASC"]],
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
    $('#dataTables-listPost').DataTable(dataTableConfig());
});