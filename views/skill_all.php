<?php
function qd_view_1($arg)
{
    $tmp = Qdskill::toJSON($arg['list_obj']);
    //echo $tmp;
    ?>
    
    <div>
        <script>
        jQuery(document).ready(function() {
            jQuery("#qdNew").click(function(){
                jQuery("#qdID").val("");
                jQuery("#qdTitle").val("");
                jQuery("#qdSubmit").val("Add");
            });
        });
        
        
        </script>
        <button class="jqx-info" id="qdNew">New</button>
        <br />
        <form action="" method="post">
        <input type="hidden" name="id" value="<?=$arg['obj']->id?>" id="qdID" />
        <input type="hidden" name="page" value="<?=$arg['page']?>" id="qdPage" />
        <label for="qdTitle">Title:</label>
        <input type="text" value="<?=$arg['obj']->title?>" name="title" id="qdTitle" />
        
        <input type="submit" value="Submit" class="jqx-info" name="submit" id="qdSubmit" />
        </form>
    </div>
    <hr />
    <script type="text/javascript">
        jQuery(document).ready(function () {
            var data = '<?=$tmp?>';
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'id', type: 'string' },
                    { name: 'title', type: 'string' }
                ],
                localdata: data
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            jQuery("#jqxgrid").jqxGrid(
            {
                width: 600,
                source: dataAdapter,
                columnsresize: true,
                columns: [
                    { text: 'ID', datafield: 'id', width: 100},
                    { text: 'Nick name', datafield: 'title'}
                ]
            });
            jQuery("#jqxgrid").jqxGrid('selectionmode', 'singlerow');
            // display selected row index.
            jQuery("#jqxgrid").on('rowselect', function (event) {
                var datarow = jQuery("#jqxgrid").jqxGrid('getrowdata', event.args.rowindex);
                jQuery("#qdID").val(datarow.id);
                jQuery("#qdTitle").val(datarow.title);
                jQuery("#qdSubmit").val("Update");
                
            });
        });
    </script>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana;">
        <div id="jqxgrid">
        </div>
    </div>

    
    <script type="text/javascript">
        jQuery(document).ready(function () {
            var quotes = ["<?=$arg['msg']?>"];
            if(quotes[0]!="")
            {
                jQuery("#jqxNotification").jqxNotification({ width: "100%", appendContainer: "#qdContainer", opacity: 0.9, autoClose: true, template: "info" });
                //jQuery("#openNotification").jqxButton();
                jQuery("#notificationContent").html(quotes[0]);
                jQuery("#jqxNotification").jqxNotification("open");
            }
            
        });
    </script>
    <div id="jqxNotification">
        <div id="notificationContent">
        </div>
    </div>
    <div id="qdContainer" style="width: 600px; margin-top: 15px; background-color: #F2F2F2; overflow: auto;">
    </div>
    
    <?php
}
qd_view_1($view_arg);
