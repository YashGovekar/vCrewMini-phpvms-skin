<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<?php
/* Show any extra fields */
if($field_list) {
	foreach($field_list as $field) {
?>
        <div class="input-field col m6 s12">
        <?php
        if($field->type == 'dropdown') {
            echo "<select class='validate' required='' name=\"{$field->fieldname}\">";
            $values = explode(',', $field->value);
            if(is_array($values))
            {       
                foreach($values as $val)
                {
                    $val = trim($val);
                    echo "<option value=\"{$val}\">{$val}</option>";
                }
            }
        
            echo '</select>';
        } elseif($field->type == 'textarea') {
            echo '<textarea class="validate" name="'.$field->fieldname.'"></textarea>';
        } else {
            echo '<input type="text" class="validate" placeholder="'.$field->title.'" name="'.$field->fieldname.'" value="'.Vars::POST($field->fieldname).'" />';
        }
		
		echo '</div>';
	}
}
?>