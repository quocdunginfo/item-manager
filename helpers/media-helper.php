<?php
/**
 * Init media uploader
 */
function qd_media_choose($btnID, $txtID, $getID=true)
{
    wp_enqueue_media();
    ?>
    <script>
    // Uploading files
    var <?=$btnID?>_file_frame;
     
      jQuery('#<?=$btnID?>').live('click', function( event ){
     
        event.preventDefault();
     
        // If the media frame already exists, reopen it.
        if ( <?=$btnID?>_file_frame ) {
          <?=$btnID?>_file_frame.open();
          return;
        }
     
        // Create the media frame.
        <?=$btnID?>_file_frame = wp.media.frames.<?=$btnID?>_file_frame = wp.media({
          title: jQuery( this ).data( 'uploader_title' ),
          button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
          },
          multiple: false  // Set to true to allow multiple files to be selected
        });
     
        // When an image is selected, run a callback.
        <?=$btnID?>_file_frame.on( 'select', function() {
          // We set multiple to false so only get one image from the uploader
          attachment = <?=$btnID?>_file_frame.state().get('selection').first().toJSON();
          jQuery('#<?=$txtID?>').val(<?=$getID===true?'attachment.id':'attachment.url'?>);
          // Do something with attachment.id and/or attachment.url here
        });
     
        // Finally, open the modal
        <?=$btnID?>_file_frame.open();
      });
    </script>
    <?php
}
