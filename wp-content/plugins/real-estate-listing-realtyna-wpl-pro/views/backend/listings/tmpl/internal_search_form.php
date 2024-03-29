<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');
?>
<div class="panel-wp lm-search-form-wp">
    <h3><?php echo __("Search", 'wpl'); ?></h3>

    <div id="wpl_listing_manager_search_form_cnt" class="panel-body">
        <div class="pwizard-panel">
            <div class="pwizard-section">
                <div class="prow">
                    <?php $current_value = wpl_request::getVar('sf_select_listing', '-1'); ?>
                    <div class="wpl_listing_manager_search_form_element_cnt">
                        <select name="sf_select_listing" id="sf_select_listing">
                            <option value="-1"><?php echo __('Listing', 'wpl'); ?></option>
                            <?php foreach ($this->listings as $listing): ?>
                                <option
                                    value="<?php echo $listing['id']; ?>" <?php echo($current_value == $listing['id'] ? 'selected="selected"' : ''); ?>><?php echo __($listing['name'], 'wpl'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php $current_value = wpl_request::getVar('sf_select_property_type', '-1'); ?>
                    <div class="wpl_listing_manager_search_form_element_cnt">
                        <select name="sf_select_property_type" id="sf_select_property_type">
                            <option value="-1"><?php echo __('Property Type', 'wpl'); ?></option>
                            <?php foreach ($this->property_types as $property_type): ?>
                                <option
                                    value="<?php echo $property_type['id']; ?>" <?php echo($current_value == $property_type['id'] ? 'selected="selected"' : ''); ?>><?php echo __($property_type['name'], 'wpl'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php if (wpl_users::is_administrator() and count($this->users)): ?>
                        <?php $current_value = wpl_request::getVar('sf_select_user_id', '-1'); ?>
                        <div class="wpl_listing_manager_search_form_element_cnt">
                            <select name="sf_select_user_id" id="sf_select_user_id">
                                <option value="-1"><?php echo __('User', 'wpl'); ?></option>
                                <?php foreach ($this->users as $user): ?>
                                    <option
                                        value="<?php echo $user->ID; ?>" <?php echo($current_value == $user->ID ? 'selected="selected"' : ''); ?>><?php echo __($user->user_login, 'wpl'); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <?php $current_value = wpl_request::getVar('sf_select_confirmed', '-1'); ?>
                    <div class="wpl_listing_manager_search_form_element_cnt">
                        <select name="sf_select_confirmed" id="sf_select_confirmed">
                            <option value="-1"><?php echo __('Confirm Status', 'wpl'); ?></option>
                            <option
                                value="1" <?php echo($current_value == '1' ? 'selected="selected"' : ''); ?>><?php echo __('Confirmed', 'wpl'); ?></option>
                            <option
                                value="0" <?php echo($current_value == '0' ? 'selected="selected"' : ''); ?>><?php echo __('Unconfirmed', 'wpl'); ?></option>
                        </select>
                    </div>

                    <?php $current_value = wpl_request::getVar('sf_select_finalized', '-1'); ?>
                    <div class="wpl_listing_manager_search_form_element_cnt">
                        <select name="sf_select_finalized" id="sf_select_finalized">
                            <option value="-1"><?php echo __('Finalize Status', 'wpl'); ?></option>
                            <option
                                value="1" <?php echo($current_value == '1' ? 'selected="selected"' : ''); ?>><?php echo __('Finalized', 'wpl'); ?></option>
                            <option
                                value="0" <?php echo($current_value == '0' ? 'selected="selected"' : ''); ?>><?php echo __('Unfinalized', 'wpl'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="prow">
                    
                    <?php $current_value = wpl_request::getVar('sf_select_mls_id', ''); ?>
                    <div class="wpl_listing_manager_search_form_element_cnt">
                        <input type="text" name="sf_select_mls_id" id="sf_select_mls_id" value="<?php echo $current_value; ?>"
                               placeholder="<?php echo __('Listing ID', 'wpl'); ?>"/>
                    </div>

                    <?php $current_value = wpl_request::getVar('sf_locationtextsearch', ''); ?>
                    <div class="wpl_listing_manager_search_form_element_cnt">
                        <input type="text" name="sf_locationtextsearch" id="sf_locationtextsearch"
                               value="<?php echo $current_value; ?>"
                               placeholder="<?php echo __('Location', 'wpl'); ?>"/>
                    </div>

                    <?php $current_value = wpl_request::getVar('sf_textsearch_textsearch', ''); ?>
                    <div class="wpl_listing_manager_search_form_element_cnt">
                        <input type="text" name="sf_textsearch_textsearch" id="sf_textsearch_textsearch"
                               value="<?php echo $current_value; ?>"
                               placeholder="<?php echo __('Text Search', 'wpl'); ?>"/>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="prow wpl-btn-wp">
        <div class="wpl_listing_manager_search_form_element_cnt">
            <button class="wpl-button button-1" onclick="wpl_search_listings();"><?php echo __('Search', 'wpl'); ?></button>
            <span class="wpl_reset_button" onclick="wpl_reset_listings();"><?php echo __('Reset', 'wpl'); ?></span>
        </div>
    </div>
</div>