<?php
//for view
function qd_view_1($arg)
{
    ?>
    <script type="text/javascript">
        var basicDemo = (function () {
            //Adding event listeners
            function _addEventListeners() {
                
                jQuery('#showWindowButton').click(function () {
                    jQuery('#window').jqxWindow('open');
                });
            };
            //Creating all page elements which are jqxWidgets
            function _createElements() {
                jQuery('#showWindowButton').jqxButton({ width: '70px' });
                
            };
            //Creating the demo window
            function _createWindow() {
                jQuery('#window').jqxWindow({
                    showCloseButton: true,
                    autoOpen: false,
                    
                    showCollapseButton: false, height: 500, width: 750,
                    initContent: function () {
                        jQuery('#window').jqxWindow('focus');
                    }
                });
            };
            return {
                config: {
                    dragArea: null
                },
                init: function () {
                    //Creating all jqxWindgets except the window
                    _createElements();
                    //Attaching event listeners
                    _addEventListeners();
                    //Adding jqxWindow
                    _createWindow();
                }
            };
        } ());
        jQuery(document).ready(function () {  
            //Initializing the demo
            basicDemo.init();
        });
    </script>
    
    <div id="jqxWidget">
        <div style="float: left;">
            <div>
                <input type="text" value="-1" name="return-value" id="return-value" />
                <br />
                <input type="button" value="Choose..." id="showWindowButton" />
            </div>
            
        </div>
        <div style="margin-top: 50px; display: none;" id="mainDemoContainer">
            <div id="window">
                <div id="windowHeader">
                    Title
                </div>
                <div style="overflow: hidden;" id="windowContent">
                    <script>
                    jQuery(document).ready(function(){
                        jQuery("#getvalue").click(function(){
                            var re = jQuery('#qdframe').contents().find('#qd-windows-result').val();
                            alert("Selected ID: "+re);
                            jQuery('#window').jqxWindow('close');
                            jQuery('#return-value').val(re);
                        });
                    });

                    </script>
                    <button id="getvalue">GET VALUE</button>
                    <hr />
                    <iframe id="qdframe" width="100%" height="100%" src="<?=get_admin_url()?>admin.php?page=qd_sub_page_2"></iframe>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php
}
qd_view_1($view_arg);
