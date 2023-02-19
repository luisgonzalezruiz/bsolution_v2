<script>
window.onload = function() {

    //Zona DataTable
    $(document).ready(function () {

        //console.log("test");

        // BOOTSTRAP TABLE - CUSTOM TOOLBAR
        // =================================================================
        // Require Bootstrap Table
        // http://bootstrap-table.wenzhixin.net.cn/
        // =================================================================
        var $table = $('#demo-custom-toolbar'), $remove = $('#demo-delete-row');

        $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
        });

        $remove.click(function () {
            var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
                return row.id
            });
            $table.bootstrapTable('remove', {
                field: 'id',
                values: ids
            });
            $remove.prop('disabled', true);
        });


    });

    $(window).on('load', function () {
        $('[data-toggle="table"]').show();
    });

    window.icons = {
        refresh: 'mdi mdi-refresh',
        toggle: 'fa-refresh',
        toggleOn: 'fa-toggle-on',
        toggleOff: 'fa-toggle-on',
        columns: 'fas fa-th-list',
        paginationSwitchDown: 'glyphicon-collapse-down icon-chevron-down'
    };

}


</script>
