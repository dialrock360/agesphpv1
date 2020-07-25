$(document).ready(function () {
    $('table.display').DataTable({
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }]
    });
});


