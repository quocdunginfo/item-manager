<?php
//for view
function qd_view_1($arg)
{
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            // prepare the data
            var theme = 'classic';
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'title' },
                    { name: 'id' }
                ],
                url: 'data.php',
                root: 'Rows',
                beforeprocessing: function (data) {
                    source.totalrecords = data[0].TotalRows;
                },
                sort: function () {
                    // update the grid and send a request to the server.
                    jQuery("#jqxgrid").jqxGrid('updatebounddata');
                }
            };
            var dataadapter = new jQuery.jqx.dataAdapter(source);
            // initialize jqxGrid
            jQuery("#jqxgrid").jqxGrid(
                {
                    width: 600,
                    source: dataadapter,
                    theme: theme,
                    autoheight: true,
                    pageable: true,
                    virtualmode: true,
                    sortable: true,
                    rendergridrows: function () {
                        return dataadapter.records;
                    },
                    columns: [
                        { text: 'Post title', datafield: 'title', width: 250 },
                        { text: 'Post id', datafield: 'id', width: 200 }
                    ]
                });
        });
    </script>

    <?php
    foreach($arg['list_obj'] as $item)
    {
        echo $item->id.'-'.$item->post_title.'<br>';
    }

    //var_dump($arg);
    ?>

<?php
}
qd_view_1($view_arg);
