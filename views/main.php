<?php
//for view
function qd_view_1($arg)
{
    ?>
    <form action="" method="post" onsubmit="qdSetValue()">
    <input type="hidden" name="default_profile_id" value="" id="qdDefaultProfileId" />
    <script type="text/javascript">
    function qdSetValue()
    {
        var item = jQuery("#jqxProfile").jqxComboBox('getSelectedItem');
        jQuery("#qdDefaultProfileId").val(item.value);
    }
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
            jQuery(document).ready(function () {    
                 <?php
                 if($arg['default_profile_id']>0)
                 {
                    ?>
                    var profile_item = jQuery("#jqxProfile").jqxComboBox('getItemByValue', <?=$arg['default_profile_id']?>);
                    jQuery("#jqxProfile").jqxComboBox('selectItem', profile_item ); 
                    <?php
                 }
                 ?>   
            });
        </script>
        <label for="jqxProfile">Default Profile: </label>
        <div id='jqxProfile'>
        </div>
        <input type="submit" name="submit" class="jqx-info" value="Update" />
    </form>
    
    
    <?php  
}
qd_view_1($view_arg);
