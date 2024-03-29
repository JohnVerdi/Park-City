<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');

/** set params **/
$wpl_properties = isset($params['wpl_properties']) ? $params['wpl_properties'] : array();
$property_id = isset($wpl_properties['current']['data']['id']) ? $wpl_properties['current']['data']['id'] : NULL;

/** Kind **/
$this->kind = isset($wpl_properties['current']['data']['kind']) ? $wpl_properties['current']['data']['kind'] : 0;
$kind_data = wpl_flex::get_kind($this->kind);

/** Parameters **/
$this->params = $params;

/** get params **/
$this->googlemap_type = isset($params['googlemap_type']) ? $params['googlemap_type'] : 0;
$this->googlemap_view = isset($params['googlemap_view']) ? $params['googlemap_view'] : 'ROADMAP';
$this->map_width = isset($params['map_width']) ? $params['map_width'] : 360;
$this->map_height = isset($params['map_height']) ? $params['map_height'] : 385;
$this->default_lt = isset($params['default_lt']) ? $params['default_lt'] : '38.685516';
$this->default_ln = isset($params['default_ln']) ? $params['default_ln'] : '-101.073324';
$this->default_zoom = isset($params['default_zoom']) ? $params['default_zoom'] : '14';
$this->infowindow_event = isset($params['infowindow_event']) ? $params['infowindow_event'] : 'click';
$this->overviewmap = isset($params['overviewmap']) ? $params['overviewmap'] : 0;
$this->get_direction = isset($params['get_direction']) ? $params['get_direction'] : 0;
$this->show_marker = (isset($kind_data['map']) and $kind_data['map'] != 'marker') ? 0 : 1;

/** Preview Property feature **/
$this->map_property_preview = 0;
$this->map_property_preview_show_marker_icon = 'price';

/* Get Google Place Option */
$this->google_place = isset($params['google_place']) ? $params['google_place'] : 0;
$this->google_place_radius = isset($params['google_place_radius']) ? $params['google_place_radius'] : 1000;

$this->markers = wpl_property::render_markers($wpl_properties);

/** WPL Demographic addon **/
$this->demographic_objects = array();
if(wpl_global::check_addon('demographic'))
{
    _wpl_import('libraries.addon_demographic');
    $this->demographic = new wpl_addon_demographic();
    
    $this->demographic_status = isset($params['demographic']) ? $params['demographic'] : 0;
    if($this->demographic_status) $this->_wpl_import($this->tpl_path.'.scripts.addon_demographic', true, true);
    
    $this->demographic_objects = isset($wpl_properties['current']['items']['demographic']) ? $wpl_properties['current']['items']['demographic'] : array();
}

// Include JavaScript files in footer or not
$wplformat = wpl_request::getVar('wpl_format', NULL);
$inclusion = strpos($wplformat, ':raw') !== false ? false : true;

/** load js codes **/
$this->_wpl_import($this->tpl_path.'.scripts.js', true, $inclusion);
$this->_wpl_import($this->tpl_path.'.scripts.pshow', true, $inclusion);
?>
<div class="wpl_googlemap_container wpl_googlemap_pshow" id="wpl_googlemap_container<?php echo $this->activity_id; ?>">
    <div class="wpl-map-add-ons"></div>
	<div class="wpl_map_canvas" id="wpl_map_canvas<?php echo $this->activity_id; ?>" style="height: <?php echo $this->map_height ?>px;"></div>
    <?php if($this->get_direction): ?>
    <div class="wpl-map-get-direction wpl-util-hidden">
        <form method="post" action="#" id="wpl_get_direction_form<?php echo $this->activity_id; ?>" onsubmit="return wpl_get_direction<?php echo $this->activity_id; ?>(<?php echo $this->markers[0]['googlemap_lt']; ?>, <?php echo $this->markers[0]['googlemap_ln']; ?>);" class="clearfix">
            <div class="wpl-map-get-direction-address-cnt">
                <input class="wpl-map-get-direction-address" type="text" placeholder="<?php echo __('From Address', 'wpl').' ...'; ?>" id="wpl_get_direction_addr<?php echo $this->activity_id; ?>" />
                <span class="wpl-map-get-direction-reset wpl-util-hidden" onclick="wpl_remove_direction<?php echo $this->activity_id; ?>();"></span>
            </div>
            <div class="wpl-map-get-direction-btn-cnt btn btn-primary">
                <input type="submit" value="" />
                <span><?php echo __('Get Direction', 'wpl'); ?></span>
            </div>
        </form>
        <?php if($this->get_direction == 2): ?>
        <div class="wpl_map_direction_text" id="wpl_map_direction_text<?php echo $this->activity_id; ?>"></div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>