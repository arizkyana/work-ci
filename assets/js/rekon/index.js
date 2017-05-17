var tableDataRekon = $('#table-data-rekon');

$(document).ready(function(){
    tableDataRekon.DataTable({
        processing: true,
        serverSide: true,
        ajax : {
            url : site_url + 'api/rekon/datatables',
            method: 'post'
        },
        columns : [
            {data: 'id_table'},
            {data: 'total_record_sms_match'},
            {data: 'total_record_dana_match'},
            {data: 'process_id'},
            {
                data: 'process_id',
                sortable: false,
                render: function(data, type, row, meta){
                    return "<a class='btn btn-sm btn-default'><i class='glyphicon glyphicon-eye-open'></i></a>";
                }
            }
        ]
    });
});