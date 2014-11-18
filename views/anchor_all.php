<?php
function qd_view_1($arg)
{
    $tmp = Qdanchor::toJSON($arg['list_obj']);
    //echo $tmp;
    ?>
    
    <div>
        <script>
        jQuery(document).ready(function() {
            jQuery("#qdNew").click(function(){
                jQuery("#qdID").val("");
                jQuery("#qdTitle").val("");
                jQuery("#qdDesc").val("");
                jQuery("#qdLocation").val("");
                jQuery("#qdPosition").val("");
                jQuery("#qdProfileId").val("");
                jQuery("#qdDateFrom").val(null);
                jQuery("#qdDateTo").val(null);
                jQuery("#jqxDateFrom").val(null);
                jQuery("#jqxDateTo").val(null);
                
                jQuery("#jqxProfile").jqxComboBox('clearSelection'); 
                jQuery("#qdSubmit").val("Add");
            });
        });
        
        
        </script>
        <button class="jqx-info" id="qdNew">New</button>
        <br />
        <script>
        function qdSetProfile()
        {
            var item = jQuery("#jqxProfile").jqxComboBox('getSelectedItem');
            jQuery("#qdProfileId").val(item.value);
            var date_from = jQuery("#jqxDateFrom").jqxDateTimeInput('getDate');
            jQuery("#qdDateFrom").val(date_from.getFullYear()+', '+date_from.getMonth()+', '+date_from.getDate());
            var date_to = jQuery("#jqxDateTo").jqxDateTimeInput('getDate');
            jQuery("#qdDateTo").val(date_to.getFullYear()+', '+date_to.getMonth()+', '+date_to.getDate());
             
        }
        </script>
        <form action="" method="post" onsubmit="qdSetProfile()">
        <input type="hidden" name="id" value="<?=$arg['obj']->id?>" id="qdID" />
        <input type="hidden" name="date_to" value="" id="qdDateTo" />
        <input type="hidden" name="date_from" value="" id="qdDateFrom" />
        <input type="hidden" name="qdprofile_id" value="" id="qdProfileId" />
        <input type="hidden" name="page" value="" id="qdPage" />
        <label for="qdTitle">Title:</label>
        <input type="text" value="<?=$arg['obj']->title?>" name="title" id="qdTitle" />
        <br />
        <label for="qdDesc">Description:</label>
        <input type="text" value="<?=$arg['obj']->desc?>" name="desc" id="qdDesc" />
        <br />
        <label for="qdLocation">Location:</label>
        <input type="text" value="<?=$arg['obj']->location?>" name="location" id="qdLocation" />
        <br />
        <label for="qdPosition">Position:</label>
        <input type="text" value="<?=$arg['obj']->position?>" name="position" id="qdPosition" />
        <br />
        <label for="jqxDateFrom">Date from:</label>
        <div>
            <script type="text/javascript">
                jQuery(document).ready(function () {               
                    // Create a jqxDateTimeInput
                    jQuery("#jqxDateFrom").jqxDateTimeInput({width: '250px', height: '25px'});
                    // Create a jqxDateTimeInput
                    jQuery("#jqxDateTo").jqxDateTimeInput({width: '250px', height: '25px'});
                });
            </script>
            <div id='jqxDateFrom'>
            </div>
        </div>
        <br />
        <label for="jqxDateTo">Date to:</label>
        <div>
            <div id='jqxDateTo'>
            </div>
        </div>
        <br />
        <script type="text/javascript">
            jQuery(document).ready(function () {               
                var data = '<?=Qdprofile::toJSON($arg['list_profile'])?>';
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'id' },
                        { name: 'nickname' }
                    ],
                    localdata: data
                };
                var dataAdapter = new jQuery.jqx.dataAdapter(source);
                // Create a jqxComboBox
                jQuery("#jqxProfile").jqxComboBox(
                {
                    selectedIndex: 0,
                    source: dataAdapter,
                    displayMember: "nickname",
                    valueMember: "id",
                    width: 200,
                    height: 25
                });
            });
        </script>
        <label for="jqxProfile">Profiles: </label>
        <div id='jqxProfile'>
        </div>
        
        <br />
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
                    { name: 'id', type: 'int' },
                    { name: 'title', type: 'string' },
                    { name: 'desc', type: 'string' },
                    { name: 'location', type: 'string' },
                    { name: 'position', type: 'string' },
                    { name: 'qdprofile_id', type: 'int' },
                    { name: '_qdprofile_nickname', type: 'string' },
                    { name: 'date_from', type: 'string' },  
                    { name: 'date_to', type: 'string' }                   
                ],
                localdata: data
            };
            var dataAdapter = new jQuery.jqx.dataAdapter(source);
            jQuery("#jqxgrid").jqxGrid(
            {
                width: 600,
                source: dataAdapter,
                columnsresize: true,
                columns: [
                    { text: 'ID', datafield: 'id', width: 100},
                    { text: 'Title', datafield: 'title', width: 150},
                    { text: 'Profile', datafield: '_qdprofile_nickname'},
                ]
            });
            jQuery("#jqxgrid").jqxGrid('selectionmode', 'singlerow');
            // display selected row index.
            jQuery("#jqxgrid").on('rowselect', function (event) {
                var datarow = jQuery("#jqxgrid").jqxGrid('getrowdata', event.args.rowindex);
                jQuery("#qdID").val(datarow.id);
                jQuery("#qdTitle").val(datarow.title);
                jQuery("#qdDesc").val(datarow.desc);
                jQuery("#qdPosition").val(datarow.position);
                jQuery("#qdLocation").val(datarow.location);
                jQuery("#jqxDateFrom").jqxDateTimeInput('setDate', datarow.date_from);
                jQuery("#jqxDateTo").jqxDateTimeInput('setDate', datarow.date_to);
                
                var profile_item = jQuery("#jqxProfile").jqxComboBox('getItemByValue', datarow.qdprofile_id);
                jQuery("#jqxProfile").jqxComboBox('selectItem', profile_item ); 
                jQuery("#qdSubmit").val("Update");
                
            });
            <?php
            if($arg['obj_index']>=0)
            {
                ?>
                var obj_index = <?=$arg['obj_index']?>;
                if (!isNaN(obj_index)) {
                    jQuery("#jqxgrid").jqxGrid('selectrow', obj_index);
                }
                <?php 
            }
            ?>
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
