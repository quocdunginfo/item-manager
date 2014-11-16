<?php
function qd_view_1($arg)
{
    $tmp = Qdprofile::toJSON($arg['list_obj']);
    //echo $tmp;
    ?>
    
    <div>
        <script>
        jQuery(document).ready(function() {
            jQuery("#qdNew").click(function(){
                jQuery("#qdID").val("");
                jQuery("#qdNickname").val("");
                jQuery("#qdSubmit").val("Add");
            });
        });
        function qd_setSkill()
        {
            var value = jQuery('#qdSkill').jqxDropDownList('getSelectedItem');
            jQuery("#qdHiddenSkill").val(value.value);
        }
        
        </script>
        <button class="jqx-info" id="qdNew">New</button>
        <br />
        <form action="" method="post" id="qdForm" onsubmit="qd_setSkill()">
        <input type="hidden" name="id" value="<?=$arg['obj']->id?>" id="qdID" />
        <input type="hidden" name="page" value="<?=$arg['page']?>" id="qdPage" />
        <input type="hidden" name="skill_id" value="" id="qdHiddenSkill" />
        <label for="qdnickname">Nick name:</label>
        <input type="text" value="<?=$arg['obj']->nickname?>" name="nickname" id="qdNickname" />
        <br />
        <label for="qdSkill" style="float: left;">Skills: </label>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                var data2 = '<?=Qdskill::toJSON2($arg['list_skill'])?>';
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'id' },
                        { name: 'title' }
                    ],
                    localdata: data2
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxDropDownList
                jQuery("#qdSkill").jqxDropDownList({
                    selectedIndex: 0, source: dataAdapter, 
                    displayMember: "title", 
                    valueMember: "id", 
                    width: 200, 
                    height: 25
                });
            });
        </script>
        <div id="qdSkill" style="float: left;">
        </div>
        <input name="submit" type="submit" id="qdAddSkill" class="jqx-info" style="float: left;" value="Add skill to profile">
        <div style="clear: both;"></div>
        <hr />
        <script type="text/javascript">
            function qd_loadJsonToSavedList(data)
            {
                //load JSON for display Skill List
                //var data = datarow.skills_JSON;
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'id' },
                        { name: 'title' }
                    ],
                    localdata: data
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxListBox
                jQuery("#qdSavedSkill").jqxListBox({ source: dataAdapter, 
                    displayMember: "title", 
                    valueMember: "id", 
                    width: 200, 
                    height: 250
                });    
            }
            jQuery(document).ready(function () {
                <?php
                if(count($obj->skills)>0)
                {
                    ?>
                    qd_loadJsonToSavedList('<?=$obj->skills_JSON?>');
                    
                    <?php
                }
                else
                {
                    ?>
                    qd_loadJsonToSavedList('[]');
                    
                    <?php
                }
                
                
                ?>
            });
        </script>
        <div id='qdSavedSkill'>
        </div>
        <hr />
        
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
                    { name: 'nickname', type: 'string' },
                    { name: 'skills_JSON', type: 'string' }
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
                    { text: 'Nick name', datafield: 'nickname'},
                    { text: 'Skill JSON', datafield: 'skills_JSON'}
                ]
            });
            jQuery("#jqxgrid").jqxGrid('selectionmode', 'singlerow');
            // display selected row index.
            jQuery("#jqxgrid").on('rowselect', function (event) {
                var datarow = jQuery("#jqxgrid").jqxGrid('getrowdata', event.args.rowindex);
                jQuery("#qdID").val(datarow.id);
                jQuery("#qdNickname").val(datarow.nickname);
                jQuery("#qdSubmit").val("Update");
                //load json to saved listbox
                qd_loadJsonToSavedList(datarow.skills_JSON);
                            
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
