<div class="fl-builder-settings-section">
            
    <h3 class="fl-builder-settings-title"><?php _e('Include Example', 'fl-builder'); ?></h3>
            
    <p><?php _e('This tab was created using a file instead of a sections array!', 'fl-builder'); ?></p>
                    
    <table class="fl-form-table">
        <tr>
            <th><?php _e('Text', 'fl-builder'); ?></th>
            <td>
                <input type="text" name="included_text" value="<?php if(isset($settings->included_text)) echo $settings->included_text; ?>" class="text text-full">
            </td>                    
        </tr>
    </table>

</div>