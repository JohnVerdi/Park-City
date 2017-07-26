<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');

if($type == 'gallery' and !$done_this)
{
	/** current value **/
	$current_value = wpl_request::getVar('sf_gallery', -1);
	
	$html .= '<input value="1" '.($current_value == 1 ? 'checked="checked"' : '').' name="sf'.$widget_id.'_gallery" type="checkbox" id="sf'.$widget_id.'_gallery" />
				<label for="sf'.$widget_id.'_gallery">'.__($field['name'], 'wpl').'</label>';

	$done_this = true;
}
elseif($type == 'date' and !$done_this)
{
	/** system date format **/
	$date_format_arr = explode(':', wpl_global::get_setting('main_date_format'));
	$jqdate_format = $date_format_arr[1];
	
	/** MIN/MAX extoptions **/
	$extoptions = explode(',', $field['extoption']);
	
	$min_value = (isset($extoptions[0]) and trim($extoptions[0]) != '') ? $extoptions[0] : '1990-01-01';
	$max_value = (isset($extoptions[1]) and trim($extoptions[1]) != '') ? $extoptions[1] : '2025-01-01';
	$show_icon = (isset($extoptions[2]) and trim($extoptions[2]) != '') ? $extoptions[2] : 0;
	
	$mindate = explode('-', $min_value);
	$maxdate = explode('-', $max_value);
	
	switch($field['type'])
	{
		case 'datepicker':
			$show = 'datepicker';
		break;
	}

	$html .= '<label>'.__($field['name'], 'wpl').'</label>';
	
	if($show == 'datepicker')
	{
		/** current value **/
		$current_min_value = wpl_request::getVar('sf_datemin_'.$field_data['table_column'], '');
		$current_max_value = wpl_request::getVar('sf_datemax_'.$field_data['table_column'], '');
		
    	$html .= '<div class="wpl_search_widget_from_container"><label for="sf'.$widget_id.'_datemin_'.$field_data['table_column'].'">'.__('Min', 'wpl').'</label><input type="text" placeholder="'.sprintf(__('Min %s', 'wpl'), __($field['name'], 'wpl')).'" name="sf'.$widget_id.'_datemin_'.$field_data['table_column'].'" id="sf'.$widget_id.'_datemin_'.$field_data['table_column'].'" value="'.($current_min_value != '' ? $current_min_value : '').'" /></div>';
    	$html .= '<div class="wpl_search_widget_to_container"><label for="sf'.$widget_id.'_datemax_'.$field_data['table_column'].'">'.__('Max', 'wpl').'</label><input type="text" placeholder="'.sprintf(__('Max %s', 'wpl'), __($field['name'], 'wpl')).'" name="sf'.$widget_id.'_datemax_'.$field_data['table_column'].'" id="sf'.$widget_id.'_datemax_'.$field_data['table_column'].'" value="'.($current_max_value != '' ? $current_max_value : '').'" /></div>';
		
		$html .= '
		<script type="text/javascript">
		wplj(document).ready(function()
		{
			wplj("#sf'.$widget_id.'_datemax_'.$field_data['table_column'].'").datepicker(
			{ 
				dayNamesMin: ["'.addslashes(__('SU', 'wpl')).'", "'.addslashes(__('MO', 'wpl')).'", "'.addslashes(__('TU', 'wpl')).'", "'.addslashes(__('WE', 'wpl')).'", "'.addslashes(__('TH', 'wpl')).'", "'.addslashes(__('FR', 'wpl')).'", "'.addslashes(__('SA', 'wpl')).'"],
				dayNames: 	 ["'.addslashes(__('Sunday', 'wpl')).'", "'.addslashes(__('Monday', 'wpl')).'", "'.addslashes(__('Tuesday', 'wpl')).'", "'.addslashes(__('Wednesday', 'wpl')).'", "'.addslashes(__('Thursday', 'wpl')).'", "'.addslashes(__('Friday', 'wpl')).'", "'.addslashes(__('Saturday', 'wpl')).'"],
				monthNames:  ["'.addslashes(__('January', 'wpl')).'", "'.addslashes(__('February', 'wpl')).'", "'.addslashes(__('March', 'wpl')).'", "'.addslashes(__('April', 'wpl')).'", "'.addslashes(__('May', 'wpl')).'", "'.addslashes(__('June', 'wpl')).'", "'.addslashes(__('July', 'wpl')).'", "'.addslashes(__('August', 'wpl')).'", "'.addslashes(__('September', 'wpl')).'", "'.addslashes(__('October', 'wpl')).'", "'.addslashes(__('November', 'wpl')).'", "'.addslashes(__('December', 'wpl')).'"],
				dateFormat: "'.addslashes($jqdate_format).'",
				gotoCurrent: true,
				minDate: new Date('.$mindate[0].', '.intval($mindate[1]).'-1, '.$mindate[2].'),
				maxDate: new Date('.$maxdate[0].', '.intval($maxdate[1]).'-1, '.$maxdate[2].'),
				changeYear: true,
				yearRange: "'.$mindate[0].':'.$maxdate[0].'",
				'.($show_icon == '1' ? 'showOn: "both", buttonImage: "'.wpl_global::get_wpl_asset_url('img/system/calendar2.png').'",' : '').'
				buttonImageOnly: true
			});

			wplj("#sf'.$widget_id.'_datemin_'.$field_data['table_column'].'").datepicker(
			{ 
				dayNamesMin: ["'.addslashes(__('SU', 'wpl')).'", "'.addslashes(__('MO', 'wpl')).'", "'.addslashes(__('TU', 'wpl')).'", "'.addslashes(__('WE', 'wpl')).'", "'.addslashes(__('TH', 'wpl')).'", "'.addslashes(__('FR', 'wpl')).'", "'.addslashes(__('SA', 'wpl')).'"],
				dayNames: 	 ["'.addslashes(__('Sunday', 'wpl')).'", "'.addslashes(__('Monday', 'wpl')).'", "'.addslashes(__('Tuesday', 'wpl')).'", "'.addslashes(__('Wednesday', 'wpl')).'", "'.addslashes(__('Thursday', 'wpl')).'", "'.addslashes(__('Friday', 'wpl')).'", "'.addslashes(__('Saturday', 'wpl')).'"],
				monthNames:  ["'.addslashes(__('January', 'wpl')).'", "'.addslashes(__('February', 'wpl')).'", "'.addslashes(__('March', 'wpl')).'", "'.addslashes(__('April', 'wpl')).'", "'.addslashes(__('May', 'wpl')).'", "'.addslashes(__('June', 'wpl')).'", "'.addslashes(__('July', 'wpl')).'", "'.addslashes(__('August', 'wpl')).'", "'.addslashes(__('September', 'wpl')).'", "'.addslashes(__('October', 'wpl')).'", "'.addslashes(__('November', 'wpl')).'", "'.addslashes(__('December', 'wpl')).'"],
				dateFormat: "'.addslashes($jqdate_format).'",
				gotoCurrent: true,
				minDate: new Date('.$mindate[0].', '.intval($mindate[1]).'-1, '.$mindate[2].'),
				maxDate: new Date('.$maxdate[0].', '.intval($maxdate[1]).'-1, '.$maxdate[2].'),
				changeYear: true,
				yearRange: "'.$mindate[0].':'.$maxdate[0].'",
				'.($show_icon == '1' ? 'showOn: "both", buttonImage: "'.wpl_global::get_wpl_asset_url('img/system/calendar2.png').'",' : '').'
				buttonImageOnly: true
			});
		});
		</script>';
	}
	
	$done_this = true;
}
elseif($type == 'feature' and !$done_this)
{
	switch($field['type'])
	{
		case 'checkbox':
			$show = 'checkbox';
		break;
		
		case 'yesno':
			$show = 'yesno';
		break;
		
		case 'select':
			$show = 'select';
		break;
    
        case 'option_single':
            
			$show = 'options';
            $multiple = false;
            
		break;
    
        case 'option_multiple':
            
			$show = 'options';
            $multiple = true;
            
		break;
	}
	
	/** current value **/
	$current_value = wpl_request::getVar('sf_select_'.$field_data['table_column'], -1);
	
	if($show == 'checkbox')
	{
		$html .= '<input value="1" '.($current_value == 1 ? 'checked="checked"' : '').' name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="checkbox" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_check" />
        	<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>';
	}
	elseif($show == 'yesno')
	{
		$html .= '<input value="1" '.($current_value == 1 ? 'checked="checked"' : '').' name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="checkbox" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_check yesno" />
        	<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>';
	}
	elseif($show == 'select')
	{
		$html .= '<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>
			<select data-placeholder="'.__($field['name'], 'wpl').'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_select">
				<option value="-1" '.($current_value == -1 ? 'selected="selected"' : '').'>'.__('Any', 'wpl').'</option>
				<option value="1" '.($current_value == 1 ? 'selected="selected"' : '').'>'.__('Yes', 'wpl').'</option>
				<option value="0" '.($current_value == 0 ? 'selected="selected"' : '').'>'.__('No', 'wpl').'</option>
			</select>';
	}
    elseif($show == 'options')
	{
        /** current value **/
        $current_value = explode(',', wpl_request::getVar('sf_feature_'.$field_data['table_column'], ''));
        if(trim($current_value[0]) == '') $current_value = array();
        
		$html .= '<label for="sf'.$widget_id.'_feature_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>
			<select data-placeholder="'.__($field['name'], 'wpl').'" name="sf'.$widget_id.'_feature_'.$field_data['table_column'].'" id="sf'.$widget_id.'_feature_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_select" '.($multiple ? 'multiple="multiple"' : '').'>';
        
		if(!$multiple) $html .= '<option value="">'.__('Any', 'wpl').'</option>';
        foreach($options['values'] as $option) $html .= '<option value="'.$option['key'].'" '.(in_array($option['key'], $current_value) ? 'selected="selected"' : '').'>'.__($option['value'], 'wpl').'</option>';
                
		$html .= '</select>';
	}
	
	$done_this = true;
}
elseif(($type == 'checkbox' or $type == 'tag') and !$done_this)
{
	switch($field['type'])
	{
		case 'checkbox':
			$show = 'checkbox';
		break;
		
		case 'yesno':
			$show = 'yesno';
		break;
		
		case 'select':
			$show = 'select';
		break;
	}
	
	/** current value **/
	$current_value = wpl_request::getVar('sf_select_'.$field_data['table_column'], -1);
	
	if($show == 'checkbox')
	{
		$html .= '<input value="1" '.($current_value == 1 ? 'checked="checked"' : '').' name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="checkbox" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_check" />
        	<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>';
	}
	elseif($show == 'yesno')
	{
		$html .= '<input value="1" '.($current_value == 1 ? 'checked="checked"' : '').' name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="checkbox" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_check yesno" />
        	<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>';
	}
	elseif($show == 'select')
	{
		$html .= '<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>
			<select data-placeholder="'.__($field['name'], 'wpl').'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_select">
				<option value="-1" '.($current_value == -1 ? 'selected="selected"' : '').'>'.__('Any', 'wpl').'</option>
				<option value="1" '.($current_value == 1 ? 'selected="selected"' : '').'>'.__('Yes', 'wpl').'</option>
			</select>';
	}
	
	$done_this = true;
}
elseif($type == 'listings' and !$done_this)
{
	$listings = wpl_global::get_listings();
	
	switch($field['type'])
	{
		case 'select':
			$show = 'select';
			$any = true;
			$multiple = false;
			$label = true;
		break;
		
		case 'multiple':
			$show = 'multiple';
			$any = false;
			$multiple = true;
			$label = true;
		break;
		
		case 'checkboxes':
			$show = 'checkboxes';
			$any = false;
			$label = true;
		break;
		
		case 'radios':
			$show = 'radios';
			$any = false;
			$label = true;
		break;

		case 'radios_any':
			$show = 'radios';
			$any = true;
			$label = true;
		break;
		
		case 'predefined':
			$show = 'predefined';
			$any = false;
			$label = false;
		break;
		
		case 'select-predefined':
			$show = 'select-predefined';
			$any = true;
			$label = true;
		break;
	}
	
	/** current value **/
	$current_value = wpl_request::getVar('sf_select_'.$field_data['table_column'], 0);
	
	if($label) $html .= '<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>';

	if($show == 'select')
	{
		$html .= '<select data-placeholder="'.__($field['name'], 'wpl').'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" onchange="wpl_listing_changed'.$widget_id.'(this.value);">';
		if($any) $html .= '<option value="-1">'.__($field['name'], 'wpl').'</option>';
        
		foreach($listings as $listing)
		{
			$html .= '<option value="'.$listing['id'].'" '.($current_value == $listing['id'] ? 'selected="selected"' : '').'>'.__($listing['name'], 'wpl').'</option>';
		}
		
		$html .= '</select>';
	}
	elseif($show == 'multiple')
    {
		/** current value **/
		$current_values = explode(',', wpl_request::getVar('sf_multiple_'.$field_data['table_column']));
	
        $html .= '<div class="wpl_searchwid_'.$field_data['table_column'].'_multiselect_container">
		<select data-placeholder="'.__($field['name'], 'wpl').'" class="wpl_searchmod_'.$field_data['table_column'].'_multiselect" id="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" name="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" multiple="multiple">';
		
        foreach($listings as $listing)
		{
            $html .= '<option value="'.$listing['id'].'" '.(in_array($listing['id'], $current_values) ? 'selected="selected"' : '').'>'.__($listing['name'], 'wpl').'</option>';
        }
		
        $html .= '</select></div>';
    }
	elseif($show == 'checkboxes')
	{
		/** current value **/
		$current_values = explode(',', wpl_request::getVar('sf_multiple_'.$field_data['table_column']));
		
		$i = 0;
		foreach($listings as $listing)
		{
			$i++;
			$html .= '<input '.(in_array($listing['id'], $current_values) ? 'checked="checked"' : '').' name="chk'.$widget_id.'_multiple_'.$field_data['table_column'].'" type="checkbox" value="'.$listing['id'].'" id="chk'.$widget_id.'_multiple_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_add_to_multiple'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="chk'.$widget_id.'_multiple_'.$field_data['table_column'].'_'.$i.'">'.__($listing['name'], 'wpl').'</label>';
		}
		
		$html .= '<input value="'.implode(',', $current_values).'" type="hidden" id="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" name="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" />';
	}
	elseif($show == 'radios')
	{
		$i = 0;
		if($any) $html .= '<input name="rdo'.$widget_id.'_select_'.$field_data['table_column'].'" type="radio" value="-1" id="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_select_radio'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__('Any', 'wpl').'</label>';
		
		foreach($listings as $listing)
		{
			$i++;
			$html .= '<input '.($current_value == $listing['id'] ? 'checked="checked"' : '').' name="rdo'.$widget_id.'_select_'.$field_data['table_column'].'" type="radio" value="'.$listing['id'].'" id="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_select_radio'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__($listing['name'], 'wpl').'</label>';
		}
		
		$html .= '<input value="'.$current_value.'" type="hidden" class="wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" onchange="wpl_listing_changed'.$widget_id.'(this.value);" />';
	}
	elseif($show == 'predefined')
	{
		$predefined_types = implode(',', $field['extoption']);
		$html .= '<input name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="hidden" value="'.$predefined_types.'" onchange="wpl_listing_changed'.$widget_id.'(this.value);" />';
	}
	elseif($show == 'select-predefined')
	{
		$html .= '<select data-placeholder="'.__($field['name'], 'wpl').'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" onchange="wpl_listing_changed'.$widget_id.'(this.value);">';
		if($any) $html .= '<option value="-1">'.__($field['name'], 'wpl').'</option>';
        
		foreach($listings as $listing)
		{
			if(in_array($listing['id'], $field['extoption'])) $html .= '<option value="'.$listing['id'].'" '.($current_value == $listing['id'] ? 'selected="selected"' : '').'>'.__($listing['name'], 'wpl').'</option>';
		}
		
		$html .= '</select>';
	}

	$done_this = true;
}
elseif($type == 'neighborhood' and !$done_this)
{
	switch($field['type'])
	{	
		case 'checkbox':
			$show = 'checkbox';
		break;
		
		case 'yesno':
			$show = 'yesno';
		break;
		
		case 'select':
			$show = 'select';
		break;
	}
	
	/** current value **/
	$current_value = wpl_request::getVar('sf_select_'.$field_data['table_column'], -1);

	if($show == 'checkbox')
	{
    	$html .= '<input value="1" '.($current_value == 1 ? 'checked="checked"' : '').' name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="checkbox" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_check" />
        	<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>';
	}
	elseif($show == 'yesno')
	{
    	$html .= '<input value="1" '.($current_value == 1 ? 'checked="checked"' : '').' name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="checkbox" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_check yesno" />
        	<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>';
	}
	elseif($show == "select")
	{
		$html .= '<label for="sf'.$widget_id.'_select_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>
			<select name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'_select">
				<option value="-1" '.($current_value == -1 ? 'selected="selected"' : '').'>'.__('Any', 'wpl').'</option>
				<option value="1" '.($current_value == 1 ? 'selected="selected"' : '').'>'.__('Yes', 'wpl').'</option>
				<option value="0" '.($current_value == 0 ? 'selected="selected"' : '').'>'.__('No', 'wpl').'</option>
			</select>';
	}
	
	$done_this = true;
}
elseif($type == 'number' and !$done_this)
{
	switch($field['type'])
	{
		case 'text':
			$show = 'text';
		break;
		
		case 'exacttext':
			$show = 'exacttext';
		break;
		
		case 'minmax':
			$show = 'minmax';
		break;
		
		case 'minmax_slider':
			$show = 'minmax_slider';
		break;
		
		case 'minmax_selectbox':
			$show = 'minmax_selectbox';
		break;
		
		case 'minmax_selectbox_plus':
			$show = 'minmax_selectbox_plus';
        break;
        
        case 'minmax_selectbox_minus':
			$show = 'minmax_selectbox_minus';
		break;
    
        case 'minmax_selectbox_range':
			$show = 'minmax_selectbox_range';
		break;
	}
	
	/** MIN/MAX extoptions **/
	$extoptions = isset($field['extoption']) ? explode(',', $field['extoption']) : array();
    
	$min_value = (isset($extoptions[0]) and trim($extoptions[0]) != '') ? $extoptions[0] : 0;
	$max_value = isset($extoptions[1]) ? $extoptions[1] : 100000;
	$division = isset($extoptions[2]) ? $extoptions[2] : 1000;
	$separator = isset($extoptions[3]) ? $extoptions[3] : ',';
	
    $html .= '<label>'.__($field['name'], 'wpl').'</label>';

	/** current values **/
	$current_min_value = max(stripslashes(wpl_request::getVar('sf_tmin_'.$field_data['table_column'], $min_value)), $min_value);
	$current_max_value = min(stripslashes(wpl_request::getVar('sf_tmax_'.$field_data['table_column'], $max_value)), $max_value);
    
	if($show == 'text')
	{
		/** current values **/
		$current_value = stripslashes(wpl_request::getVar('sf_text_'.$field_data['table_column'], ''));
		
    	$html .= '<input name="sf'.$widget_id.'_text_'.$field_data['table_column'].'" type="text" id="sf'.$widget_id.'_text_'.$field_data['table_column'].'" value="'.$current_value.'" placeholder="'.__($field['name'], 'wpl').'" />';
	}
	elseif($show == 'exacttext')
	{
		/** current values **/
		$current_value = stripslashes(wpl_request::getVar('sf_select_'.$field_data['table_column'], ''));
		
    	$html .= '<input name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="text" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" value="'.$current_value.'"  placeholder="'.__($field['name'], 'wpl').'"/>';
	}
    elseif($show == 'minmax')
    {
		$html .= '<label for="sf'.$widget_id.'_tmin_'.$field_data['table_column'].'">'.__('Min', 'wpl').'</label>';
		$html .= '<input name="sf'.$widget_id.'_tmin_'.$field_data['table_column'].'" type="text" id="sf'.$widget_id.'_tmin_'.$field_data['table_column'].'" value="'.$current_min_value.'" placeholder="'.__('Min', 'wpl').'" />';
        
		$html .= '<label for="sf'.$widget_id.'_tmax_'.$field_data['table_column'].'">'.__('Max', 'wpl').'</label>';
		$html .= '<input name="sf'.$widget_id.'_tmax_'.$field_data['table_column'].'" type="text" id="sf'.$widget_id.'_tmax_'.$field_data['table_column'].'" value="'.$current_max_value.'" placeholder="'.__('Max', 'wpl').'" />';
	}
	elseif($show == 'minmax_slider')
	{
		$html .= '<script type="text/javascript">
				wplj(function()
				{
					wplj("#slider'.$widget_id.'_range_'.$field_data['table_column'].'" ).slider(
					{
						step: '.$division.',
						range: true,
						min: '.(is_numeric($min_value) ? $min_value : 0).',
						max: '.$max_value.',
                        field_id: '.$field['id'].',
						values: ['.$current_min_value.', '.$current_max_value.'],
						slide: function(event, ui)
						{
							v1 = wpl_th_sep'.$widget_id.'(ui.values[0]);
							v2 = wpl_th_sep'.$widget_id.'(ui.values[1]);
							wplj("#slider'.$widget_id.'_showvalue_'.$field_data['table_column'].'").html(v1+" - "+ v2);
						},
						stop: function(event, ui)
						{
							wplj("#sf'.$widget_id.'_tmin_'.$field_data['table_column'].'").val(ui.values[0]);
							wplj("#sf'.$widget_id.'_tmax_'.$field_data['table_column'].'").val(ui.values[1]);
							'.((isset($this->ajax) and $this->ajax == 2) ? 'wpl_do_search_'.$widget_id.'();' : '').'
						}
					});
				});
				</script>';
		
		$html .= '<span class="wpl_search_slider_container">
				<input type="hidden" value="'.$current_min_value.'" name="sf'.$widget_id.'_tmin_'.$field_data['table_column'].'" id="sf'.$widget_id.'_tmin_'.$field_data['table_column'].'" /><input type="hidden" value="'.$current_max_value.'" name="sf'.$widget_id.'_tmax_'.$field_data['table_column'].'" id="sf'.$widget_id.'_tmax_'.$field_data['table_column'].'" />
				<span class="wpl_slider_show_value" id="slider'.$widget_id.'_showvalue_'.$field_data['table_column'].'">'.number_format((double) $current_min_value, 0, '', $separator).' - '.number_format((double) $current_max_value, 0, '', $separator).'</span>
				<span class="wpl_span_block" style="width: 92%; height: 20px;"><span class="wpl_span_block" id="slider'.$widget_id.'_range_'.$field_data['table_column'].'" ></span></span>
				</span>';
	}
    elseif($show == 'minmax_selectbox')
	{
    	$html .= '<select name="sf'.$widget_id.'_tmin_'.$field_data['table_column'].'" id="sf'.$widget_id.'_tmin_'.$field_data['table_column'].'">';
		
		$i = $min_value;
		$html .= '<option value="0" '.($current_min_value == $i ? 'selected="selected"' : '').'>'.sprintf(__('Min %s', 'wpl'), __($field_data['name'], 'wpl')).'</option>';
        
        $selected_printed = false;
        if($current_min_value == $i) $selected_printed = true;

		while($i < $max_value)
		{
			$html .= '<option value="'.$i.'" '.(($current_min_value == $i and !$selected_printed) ? 'selected="selected"' : '').'>'.$i.'</option>';
			$i += $division;
		}
		
		$html .= '<option value="'.$max_value.'" '.(($current_min_value == $i and !$selected_printed) ? 'selected="selected"' : '').'>'.$max_value.'</option>';
        $html .= '</select>';
        
        $html .= '<select name="sf'.$widget_id.'_tmax_'.$field_data['table_column'].'" id="sf'.$widget_id.'_tmax_'.$field_data['table_column'].'">';
        
        $i = $min_value;
		$html .= '<option value="999999999999" '.($current_max_value == $i ? 'selected="selected"' : '').'>'.sprintf(__('Max %s', 'wpl'), __($field_data['name'], 'wpl')).'</option>';
		
		$selected_printed = false;
        if($current_max_value == $i) $selected_printed = true;
        
		while($i < $max_value)
		{
			$html .= '<option value="'.$i.'" '.(($current_max_value == $i and !$selected_printed) ? 'selected="selected"' : '').'>'.$i.'</option>';
			$i += $division;
		}
		
		$html .= '<option value="'.$max_value.'">'.$max_value.'</option>';
        $html .= '</select>';
	}
    elseif($show == 'minmax_selectbox_plus')
	{
        $i = $min_value;
        
		$html .= '<select name="sf'.$widget_id.'_tmin_'.$field_data['table_column'].'" id="sf'.$widget_id.'_tmin_'.$field_data['table_column'].'">';
		$html .= '<option value="-1" '.($current_min_value == $i ? 'selected="selected"' : '').'>'.__($field['name'], 'wpl').'</option>';
		
        $selected_printed = false;
        if($current_min_value == $i) $selected_printed = true;
        
		while($i < $max_value)
		{
            if($i == '0')
			{
				$i += $division;
				continue;
			}
            
			$html .= '<option value="'.$i.'" '.(($current_min_value == $i and !$selected_printed) ? 'selected="selected"' : '').'>'.$i.'+</option>';
			$i += $division;
		}
		
		$html .= '<option value="'.$max_value.'">'.$max_value.'+</option>';
        $html .= '</select>';
    }
    elseif($show == 'minmax_selectbox_minus')
	{
        $i = $min_value;
        
		$html .= '<select name="sf'.$widget_id.'_tmax_'.$field_data['table_column'].'" id="sf'.$widget_id.'_tmax_'.$field_data['table_column'].'">';
		$html .= '<option value="-1" '.($current_max_value == $i ? 'selected="selected"' : '').'>'.__($field['name'], 'wpl').'</option>';
		
        $selected_printed = false;
        if($current_max_value == $i) $selected_printed = true;
        
		while($i < $max_value)
		{
            if($i == '0')
			{
				$i += $division;
				continue;
			}
            
			$html .= '<option value="'.$i.'" '.(($current_max_value == $i and !$selected_printed) ? 'selected="selected"' : '').'>-'.$i.'</option>';
			$i += $division;
		}
		
		$html .= '<option value="'.$max_value.'">-'.$max_value.'</option>';
        $html .= '</select>';
    }
    elseif($show == 'minmax_selectbox_range')
	{
        $i = $min_value;
        
        $current_between_value = stripslashes(wpl_request::getVar('sf_between_'.$field_data['table_column'], ''));
        
		$html .= '<select name="sf'.$widget_id.'_between_'.$field_data['table_column'].'" id="sf'.$widget_id.'_between_'.$field_data['table_column'].'">';
		$html .= '<option value="-1">'.__($field['name'], 'wpl').'</option>';
        
		while($i < $max_value)
		{
            $range_value = $i.':'.($i+$division);
			$html .= '<option value="'.$range_value.'" '.($current_between_value == $range_value ? 'selected="selected"' : '').'>'.number_format($i, 0, '.', ',').' - '.number_format(($i+$division), 0, '.', ',').'</option>';
			$i += $division;
		}
        
		$html .= '<option value="'.$max_value.'" '.($current_between_value == $max_value ? 'selected="selected"' : '').'>'.number_format($max_value, 0, '.', ',').'+</option>';
        $html .= '</select>';
	}
	
	$done_this = true;
}
elseif($type == 'property_types' and !$done_this)
{
	$property_types = wpl_global::get_property_types();

	switch($field['type'])
	{
		case 'select':
			$show = 'select';
			$any = true;
			$multiple = false;
			$label = true;
		break;
		
		case 'multiple':
			$show = 'multiple';
			$any = false;
			$multiple = true;
			$label = true;
		break;
		
		case 'checkboxes':
			$show = 'checkboxes';
			$any = false;
			$label = true;
		break;
		
		case 'radios':
			$show = 'radios';
			$any = false;
			$label = true;
		break;

		case 'radios_any':
			$show = 'radios';
			$any = true;
			$label = true;
		break;
		
		case 'predefined':
			$show = 'predefined';
			$any = false;
			$label = false;
		break;
		
		case 'select-predefined':
			$show = 'select-predefined';
			$any = true;
			$multiple = true;
			$label = true;
		break;
	}
	
	/** current value **/
	$current_value = stripslashes(wpl_request::getVar('sf_select_'.$field_data['table_column'], 0));
	
	if($label) $html .= '<label>'.__($field['name'], 'wpl').'</label>';
	
	if($show == 'select')
	{
		$html .= '<select data-placeholder="'.__($field['name'], 'wpl').'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field_data['table_column'].' wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" onchange="wpl_property_type_changed'.$widget_id.'(this.value);">';
		if($any) $html .= '<option value="-1">'.__($field['name'], 'wpl').'</option>';
		
		foreach($property_types as $property_type)
		{
			$html .= '<option class="wpl_pt_parent wpl_pt_parent'.$property_type['parent'].'" value="'.$property_type['id'].'" '.($current_value == $property_type['id'] ? 'selected="selected"' : '').'>'.__($property_type['name'], 'wpl').'</option>';
		}
		
		$html .= '</select>';
	}
	elseif($show == 'multiple')
    {
		/** current value **/
		$current_values = explode(',', stripslashes(wpl_request::getVar('sf_multiple_'.$field_data['table_column'])));
		
        $html .= '<div class="wpl_searchwid_'.$field_data['table_column'].'_multiselect_container">
		<select data-placeholder="'.__($field['name'], 'wpl').'" class="wpl_search_widget_field_'.$field_data['table_column'].' wpl_searchmod_'.$field_data['table_column'].'_multiselect" id="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" name="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" multiple="multiple">';
		
        foreach($property_types as $property_type)
		{
            $html .= '<option class="wpl_pt_parent wpl_pt_parent'.$property_type['parent'].'" value="'.$property_type['id'].'" '.(in_array($property_type['id'], $current_values) ? 'selected="selected"' : '').'>'.__($property_type['name'], 'wpl').'</option>';
        }
		
        $html .= '</select></div>';
    }
	elseif($show == 'checkboxes')
	{
		/** current value **/
		$current_values = explode(',', stripslashes(wpl_request::getVar('sf_multiple_'.$field_data['table_column'])));
		
		$i = 0;
		foreach($property_types as $property_type)
		{
			$i++;
			$html .= '<input '.(in_array($property_type['id'], $current_values) ? 'checked="checked"' : '').' name="chk'.$widget_id.'_select_'.$field_data['table_column'].'" type="checkbox" value="'.$property_type['id'].'" id="chk'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_add_to_multiple'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="chk'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__($property_type['name'], 'wpl').'</label>';
		}
		
		$html .= '<input value="'.implode(',', $current_values).'" type="hidden" id="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" name="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" />';
	}
	elseif($show == 'radios')
	{
		$i = 0;
		if($any) $html .= '<input name="rdo'.$widget_id.'_select_'.$field_data['table_column'].'" type="radio" value="-1" id="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_select_radio'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__('Any', 'wpl').'</label>';
		
		foreach($property_types as $property_type)
		{
			$i++;
			$html .= '<input '.($current_value == $property_type['id'] ? 'checked="checked"' : '').' name="rdo'.$widget_id.'_select_'.$field_data['table_column'].'" type="radio" value="'.$property_type['id'].'" id="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_select_radio'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__($property_type['name'], 'wpl').'</label>';
		}
		
		$html .= '<input value="'.$current_value.'" type="hidden" class="wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" onchange="wpl_property_type_changed'.$widget_id.'(this.value);" />';
	}
	elseif($show == 'predefined')
	{
		$predefined_types = implode(',', $field['extoption']);
		$html .= '<input name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="hidden" value="'.$predefined_types.'" onchange="wpl_property_type_changed'.$widget_id.'(this.value);" />';
	}
	elseif($show == 'select-predefined')
	{
		$html .= '<select data-placeholder="'.__($field['name'], 'wpl').'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field_data['table_column'].' wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" onchange="wpl_property_type_changed'.$widget_id.'(this.value);">';
		if($any) $html .= '<option value="-1">'.__($field['name'], 'wpl').'</option>';
        
		foreach($property_types as $property_type)
		{
			if(in_array($property_type['id'], $field['extoption'])) $html .= '<option class="wpl_pt_parent wpl_pt_parent'.$property_type['parent'].'" value="'.$property_type['id'].'" '.($current_value == $property_type['id'] ? 'selected="selected"' : '').'>'.__($property_type['name'], 'wpl').'</option>';
		}
		
		$html .= '</select>';
	}
	
	$done_this = true;
}
elseif($type == 'select' and !$done_this)
{
	switch($field['type'])
	{
		case 'select':
			$show = 'select';
			$any = true;
			$label = true;
		break;
		
		case 'multiple':
			$show = 'multiple';
			$any = false;
			$label = true;
		break;
		
		case 'checkboxes':
			$show = 'checkboxes';
			$any = false;
			$label = true;
		break;
		
		case 'radios':
			$show = 'radios';
			$any = false;
			$label = true;
		break;

		case 'radios_any':
			$show = 'radios';
			$any = true;
			$label = true;
		break;
		
		case 'predefined':
			$show = 'predefined';
			$any = false;
			$label = false;
		break;
	}
	
	/** current value **/
	$current_value = stripslashes(wpl_request::getVar('sf_select_'.$field_data['table_column'], -1));
	
	if($label) $html .= '<label>'.__($field['name'], 'wpl').'</label>';

	if($show == 'select')
	{
		$html .= '<select data-placeholder="'.__($field['name'], 'wpl').'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'">';
		if($any) $html .= '<option value="-1">'.__($field['name'], 'wpl').'</option>';
		
		foreach($options['params'] as $option)
		{
			if(!$option['enabled']) continue;

			$html .= '<option value="'.$option['key'].'" '.($current_value == $option['key'] ? 'selected="selected"' : '').'>'.__($option['value'], 'wpl').'</option>';
		}
		
		$html .= '</select>';
	}
	elseif($show == 'multiple')
    {
		/** current value **/
		$current_values = explode(',', stripslashes(wpl_request::getVar('sf_multiple_'.$field_data['table_column'])));
        if(trim($current_values[0]) == '') $current_values = array();
        
        $html .= '<div class="wpl_searchwid_'.$field_data['table_column'].'_multiselect_container">
		<select data-placeholder="'.__($field['name'], 'wpl').'" class="wpl_searchmod_'.$field_data['table_column'].'_multiselect" id="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" name="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" multiple="multiple">';
		
        foreach($options['params'] as $option)
		{
			if(!$option['enabled']) continue;

			$html .= '<option value="'.$option['key'].'" '.(in_array($option['key'], $current_values) ? 'selected="selected"' : '').'>'.__($option['value'], 'wpl').'</option>';
        }
		
        $html .= '</select></div>';
    }
	elseif($show == 'checkboxes')
	{
		/** current value **/
		$current_values = explode(',', stripslashes(wpl_request::getVar('sf_multiple_'.$field_data['table_column'])));
		
		$i = 0;
		foreach($options['params'] as $option)
		{
			if(!$option['enabled']) continue;

			$i++;
			$html .= '<input '.(in_array($option['key'], $current_values) ? 'checked="checked"' : '').' name="chk'.$widget_id.'_select_'.$field_data['table_column'].'" type="checkbox" value="'.$option['key'].'" id="chk'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_add_to_multiple'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="chk'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__($option['value'], 'wpl').'</label>';
		}
		
		$html .= '<input value="'.implode(',', $current_values).'" type="hidden" id="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" name="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" />';
	}
	elseif($show == 'radios')
	{
		$i = 0;
		if($any) $html .= '<input '.($current_value == -1 ? 'checked="checked"' : '').' name="rdo'.$widget_id.'_select_'.$field_data['table_column'].'" type="radio" value="-1" id="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_select_radio'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__('Any', 'wpl').'</label>';

		foreach($options['params'] as $option)
		{
			if(!$option['enabled']) continue;

			$i++;
           	$html .= '<input '.($current_value == $option['key'] ? 'checked="checked"' : '').' name="rdo'.$widget_id.'_select_'.$field_data['table_column'].'" type="radio" value="'.$option['key'].'" id="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_select_radio'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__($option['value'], 'wpl').'</label>';
		}
		
		$html .= '<input value="'.$current_value.'" type="hidden" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" />';
	}
	elseif($show == 'predefined')
	{
		$predefined_types = implode(',', $field['extoption']);
		$html .= '<input name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" type="hidden" value="'.$predefined_types.'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" />';
	}

	$done_this = true;
}
elseif(in_array($type, array('user_type', 'user_membership')) and !$done_this)
{
	switch($field['type'])
	{
		case 'select':
			$show = 'select';
			$any = true;
			$label = true;
		break;
		
		case 'multiple':
			$show = 'multiple';
			$any = false;
			$label = true;
		break;
		
		case 'checkboxes':
			$show = 'checkboxes';
			$any = false;
			$label = true;
		break;
		
		case 'radios':
			$show = 'radios';
			$any = false;
			$label = true;
		break;

		case 'radios_any':
			$show = 'radios';
			$any = true;
			$label = true;
		break;
	}
	
	/** current value **/
    $raw_options = $type == 'user_type' ? wpl_users::get_user_types(1) : wpl_users::get_wpl_memberships();
    
    $options = array();
    foreach($raw_options as $raw_option) $options[$raw_option->id] = array('key'=>$raw_option->id, 'value'=>(isset($raw_option->membership_name) ? $raw_option->membership_name : $raw_option->name));
    
	$current_value = stripslashes(wpl_request::getVar('sf_select_'.$field_data['table_column'], ''));
	
	if($label) $html .= '<label>'.__($field['name'], 'wpl').'</label>';

	if($show == 'select')
	{
		$html .= '<select data-placeholder="'.__($field['name'], 'wpl').'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" class="wpl_search_widget_field_'.$field['id'].'" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'">';
		if($any) $html .= '<option value="">'.__($field['name'], 'wpl').'</option>';
		
		foreach($options as $option) $html .= '<option value="'.$option['key'].'" '.($current_value == $option['key'] ? 'selected="selected"' : '').'>'.__($option['value'], 'wpl').'</option>';
		
		$html .= '</select>';
	}
	elseif($show == 'multiple')
    {
		/** current value **/
		$current_values = explode(',', stripslashes(wpl_request::getVar('sf_multiple_'.$field_data['table_column'])));
	
        $html .= '<div class="wpl_searchwid_'.$field_data['table_column'].'_multiselect_container">
		<select data-placeholder="'.__($field['name'], 'wpl').'" class="wpl_searchmod_'.$field_data['table_column'].'_multiselect" id="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" name="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" multiple="multiple">';
		
        foreach($options as $option) $html .= '<option value="'.$option['key'].'" '.(in_array($option['key'], $current_values) ? 'selected="selected"' : '').'>'.__($option['value'], 'wpl').'</option>';
		
        $html .= '</select></div>';
    }
	elseif($show == 'checkboxes')
	{
		/** current value **/
		$current_values = explode(',', stripslashes(wpl_request::getVar('sf_multiple_'.$field_data['table_column'])));
		
		$i = 0;
		foreach($options as $option)
		{
			$i++;
			$html .= '<input '.(in_array($option['key'], $current_values) ? 'checked="checked"' : '').' name="chk'.$widget_id.'_select_'.$field_data['table_column'].'" type="checkbox" value="'.$option['key'].'" id="chk'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_add_to_multiple'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="chk'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__($option['value'], 'wpl').'</label>';
		}
		
		$html .= '<input value="'.implode(',', $current_values).'" type="hidden" id="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" name="sf'.$widget_id.'_multiple_'.$field_data['table_column'].'" />';
	}
	elseif($show == 'radios')
	{
		$i = 0;
		if($any) $html .= '<input '.($current_value == -1 ? 'checked="checked"' : '').' name="rdo'.$widget_id.'_select_'.$field_data['table_column'].'" type="radio" value="-1" id="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_select_radio'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__('Any', 'wpl').'</label>';

		foreach($options as $option)
		{
			$i++;
           	$html .= '<input '.($current_value == $option['key'] ? 'checked="checked"' : '').' name="rdo'.$widget_id.'_select_'.$field_data['table_column'].'" type="radio" value="'.$option['key'].'" id="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'" onclick="wpl_select_radio'.$widget_id.'(this.value, this.checked, \''.$field_data['table_column'].'\');"><label for="rdo'.$widget_id.'_select_'.$field_data['table_column'].'_'.$i.'">'.__($option['value'], 'wpl').'</label>';
		}
		
		$html .= '<input value="'.$current_value.'" type="hidden" id="sf'.$widget_id.'_select_'.$field_data['table_column'].'" name="sf'.$widget_id.'_select_'.$field_data['table_column'].'" />';
	}

	$done_this = true;
}
elseif($type == 'textarea' and !$done_this)
{
	/** current value **/
	$current_value = stripslashes(wpl_request::getVar('sf_text_'.$field_data['table_column'], ''));
	
	$html .= '<label for="sf'.$widget_id.'_text_'.$field_data['table_column'].'">'.__($field['name'], 'wpl').'</label>
				<textarea name="sf'.$widget_id.'_text_'.$field_data['table_column'].'" id="sf'.$widget_id.'_text_'.$field_data['table_column'].'">'.$current_value.'</textarea>';

	$done_this = true;
}
elseif($type == 'price' and !$done_this)
{
	$default_min_value = 0;
	
	$unit_type = 4;
    $default_max_value = 1000000;
    $default_division_value = 1000;
	
	/** get units **/
	$units = wpl_units::get_units($unit_type);
    $current_listing = wpl_request::getVar('sf_select_listing', 0);
    $current_listing_parent = wpl_listing_types::get_parent($current_listing);
    
	/** MIN/MAX extoptions **/
	$extoptions = explode(',', $field['extoption']);
    
    /** MIN/MAX extoptions Rental **/
    $extoptions2 = explode(',', (isset($field['extoption2']) ? $field['extoption2'] : ''));
	
    $min_value = (isset($extoptions[0]) and trim($extoptions[0]) != '') ? $extoptions[0] : 0;
	$max_value = isset($extoptions[1]) ? $extoptions[1] : $default_max_value;
	$division = isset($extoptions[2]) ? $extoptions[2] : $default_division_value;
	$separator = isset($extoptions[3]) ? $extoptions[3] : ',';
    
    $min_value_rental = (isset($extoptions2[0]) and trim($extoptions2[0]) != '') ? $extoptions2[0] : $min_value;
	$max_value_rental = isset($extoptions2[1]) ? $extoptions2[1] : $max_value;
	$division_rental = isset($extoptions2[2]) ? $extoptions2[2] : $division;
	$separator_rental = isset($extoptions2[3]) ? $extoptions2[3] : $separator;
    
    // Detect the currency
    $current_unit = stripslashes(wpl_request::getVar('sf_unit_'.$field_data['table_column'], NULL));
    if(trim($current_unit) == '') $current_unit = wpl_request::getVar('wpl_unit'.$unit_type, NULL, 'COOKIE'); // From unit switcher
    if(trim($current_unit) == '') $current_unit = $units[0]['id']; // Default currency
    
	// If the currency is set by currency switcher then change the price ranges accordingly
	if(wpl_request::getVar('wpl_unit'.$unit_type, NULL, 'COOKIE'))
	{
		$cookie_unit = wpl_request::getVar('wpl_unit'.$unit_type, NULL, 'COOKIE');
        $rate = round(wpl_units::convert(1, $units[0]['id'], $cookie_unit));
        
        if(!$rate or (is_numeric($rate) and $rate <= 0)) $rate = 1;
        
        $min_value = $min_value*$rate;
        $max_value = $max_value*$rate;
        $division = $division*$rate;

        $min_value_rental = $min_value_rental*$rate;
        $max_value_rental = $max_value_rental*$rate;
        $division_rental = $division_rental*$rate;
	}
	
    /** current values **/
    $current_min_value = max(stripslashes(wpl_request::getVar('sf_min_'.$field_data['table_column'], $min_value)), $min_value);
	$current_max_value = min(stripslashes(wpl_request::getVar('sf_max_'.$field_data['table_column'], $max_value)), $max_value);
    
    $current_min_value_rental = max(stripslashes(wpl_request::getVar('sf_min_'.$field_data['table_column'], $min_value_rental)), $min_value_rental);
	$current_max_value_rental = min(stripslashes(wpl_request::getVar('sf_max_'.$field_data['table_column'], $max_value_rental)), $max_value_rental);
    
    if($current_listing_parent == 1)
    {
        $current_min_value_rental = $min_value_rental;
        $current_max_value_rental = $max_value_rental;
    }
    else
    {
        $current_min_value = $min_value;
        $current_max_value = $max_value;
    }
    
    $listing_fields = array(
        'sale'=>array('min'=>$min_value, 'max'=>$max_value, 'division'=>$division, 'separator'=>$separator, 'cur_min'=>$current_min_value, 'cur_max'=>$current_max_value),
        'rental'=>array('min'=>$min_value_rental, 'max'=>$max_value_rental, 'division'=>$division_rental, 'separator'=>$separator_rental, 'cur_min'=>$current_min_value_rental, 'cur_max'=>$current_max_value_rental)
    );
    
	switch($field['type'])
	{
		case 'minmax':
			$show = 'minmax';
			$input_type = 'text';