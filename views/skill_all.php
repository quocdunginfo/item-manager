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
                jQuery("#qdDesc").val("");
                jQuery("#qdPercent").val("");
                jQuery("#qdProfileId").val("");
                jQuery("#qdAvatar").val("");
                jQuery("#qdAvatarImg").attr("src","");
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
        }
        </script>
        <form action="" method="post" onsubmit="qdSetProfile()">
        <input type="hidden" name="id" value="<?=$arg['obj']->id?>" id="qdID" />
        <input type="hidden" name="page" value="<?=$arg['page']?>" id="qdPage" />
        <label for="qdTitle">Title:</label>
        <input type="text" value="<?=$arg['obj']->title?>" name="title" id="qdTitle" />
        <br />
        <label for="qdDesc">Description:</label>
        <input type="text" value="<?=$arg['obj']->desc?>" name="desc" id="qdDesc" />
        <br />
        <label for="qdPercent">Percent:</label>
        <input type="text" value="<?=$arg['obj']->percent?>" name="percent" id="qdPercent" />
        <input type="hidden" value="-1" name="qdprofile_id" id="qdProfileId" />
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
        <label for="jqxAvatar">Avatar ID:</label>
        <img id="qdAvatarImg" src="<?=$arg['obj']==null?'':$arg['obj']->qd_getAvatarLink()?>" width="50" height="50" />
        <input type="text" value="<?=$arg['obj']->avatar?>" name="avatar" id="qdAvatar" />
        <?=qd_media_choose('qdAvatarChoose', 'qdAvatar', true)?>
        <button type="button" id="qdAvatarChoose">Choose...</button>
        <br />
        <label for="jqxAvatar">Is big skill:</label>
        <input type="checkbox" name="isbigskill" id="qdBigSkill" <?=$arg['obj']->isbigskill==1?'checked:"checked"':''?> />
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
                    { name: 'percent', type: 'int' },
                    { name: 'qdprofile_id', type: 'int' },
                    { name: '_qdprofile_nickname', type: 'string' },
                    { name: 'avatar', type: 'int' },
                    { name: 'isbigskill', type: 'int' },  
                    { name: '_avatar_link', type: 'string' }                   
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
                    { text: 'Percent', datafield: 'percent', width: 100,
                        cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties)
                        {
                            return value + ' %';
                        }
                    },
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
                jQuery("#qdPercent").val(datarow.percent);
                jQuery("#qdAvatar").val(datarow.avatar);
                jQuery("#qdAvatarImg").attr("src",datarow._avatar_link);
                jQuery( "#qdBigSkill").prop('checked', datarow.isbigskill==1?true:false);
                
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
