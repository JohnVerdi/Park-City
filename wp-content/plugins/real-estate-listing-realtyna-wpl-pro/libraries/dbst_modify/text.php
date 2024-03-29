<?php
/** no direct access * */
defined('_WPLEXEC') or die('Restricted access');

if($type == 'text' and !$done_this)
{
?>
<div class="fanc-body">
	<div class="fanc-row fanc-button-row-2">
        <span class="ajax-inline-save" id="wpl_dbst_modify_ajax_loader"></span>
        <?php if($dbst_id and (wpl_global::check_addon('mls') or wpl_global::check_addon('importer')) and $dbst_id >= 3000): ?><input class="wpl-button button-2" type="button" onclick="convert_dbst('<?php echo $__prefix; ?>', <?php echo $dbst_id; ?>, 'select');" value="<?php echo __('Convert to Select', 'wpl'); ?>" id="wpl_dbst_convert_button" /><?php endif; ?>
		<input class="wpl-button button-1" type="button" onclick="save_dbst('<?php echo $__prefix; ?>', <?php echo $dbst_id; ?>);" value="<?php echo __('Save', 'wpl'); ?>" id="wpl_dbst_submit_button" />
	</div>
	<div class="col-wp">
		<div class="col-fanc-left" id="wpl_flex_general_options">
			<div class="fanc-row fanc-inline-title">
				<?php echo __('General Options', 'wpl'); ?>
			</div>
			<?php
				/** include main file **/
				include _wpl_import('libraries.dbst_modify.main.main', true, true);
			?>
		</div>
		<div class="col-fanc-right" id="wpl_flex_specific_options">
			<div class="fanc-row fanc-inline-title">
				<?php echo __('Specific Options', 'wpl'); ?>
			</div>
			<?php
				/** include specific file **/
				include _wpl_import('libraries.dbst_modify.main.'.($kind == 2 ? 'user' : '').'specific', true, true);
			?>
            <?php if(wpl_global::check_addon('pro')): ?>
            <div class="fanc-row fanc-inline-title">
                <span>
                    <?php echo __('Params', 'wpl'); ?>
                </span>
			</div>
			<div class="fanc-row">
				<label for="<?php echo $__prefix; ?>opt_if_zero"><?php echo __('If Zero', 'wpl'); ?></label>
                <select name="<?php echo $__prefix; ?>opt_if_zero" id="<?php echo $__prefix; ?>opt_if_zero">
                    <option <?php echo (isset($options['if_zero']) and $options['if_zero'] == 1) ? 'selected="selected"' : ''; ?> value="1"><?php echo __('Show', 'wpl'); ?></option>
                    <option <?php echo (isset($options['if_zero']) and $options['if_zero'] == 0) ? 'selected="selected"' : ''; ?> value="0"><?php echo __('Hide', 'wpl'); ?></option>
                    <option <?php echo (isset($options['if_zero']) and $options['if_zero'] == 2) ? 'selected="selected"' : ''; ?> value="2"><?php echo __('Show Text', 'wpl'); ?></option>
                </select>
			</div>
            <div class="fanc-row">
				<label for="<?php echo $__prefix; ?>opt_call_text"><?php echo __('Text', 'wpl'); ?></label>
                <input type="text" name="<?php echo $__prefix; ?>opt_call_text" id="<?php echo $__prefix; ?>opt_call_text" value="<?php echo (isset($options['call_text']) ? $options['call_text'] : 'Call'); ?>" />
			</div>
            <?php endif; ?>
		</div>
	</div>
    <div class="col-wp">
        <div class="col-fanc-left">
        	<div class="fanc-row fanc-inline-title">
                <?php echo __('Accesses', 'wpl'); ?>
            </div>
            <?php
				/** include accesses file **/
				include _wpl_import('libraries.dbst_modify.main.accesses', true, true);
            ?>
        </div>
    </div>
</div>
<?php
    $done_this = true;
}