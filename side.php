<?php
/**
 * 侧边栏
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div id="sidebar" style="background-color: rgba(255, 255, 255, 0.6);">
    <?php
    $widgets = !empty($options_cache['widgets1']) ? unserialize($options_cache['widgets1']) : array();
    doAction('diff_side');
    foreach ($widgets as $val) {
        $widget_title = @unserialize($options_cache['widget_title']);
        $custom_widget = @unserialize($options_cache['custom_widget']);
        if (strpos($val, 'custom_wg_') === 0) {
            $callback = 'widget_custom_text';
            if (function_exists($callback)) {
                call_user_func($callback, htmlspecialchars($custom_widget[$val]['title']), $custom_widget[$val]['content'], $val);
            }
        } else {
            $callback = 'widget_' . $val;
            if (function_exists($callback)) {
                preg_match("/^.*\s\((.*)\)/", $widget_title[$val], $matchs);
                $wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title[$val];
                call_user_func($callback, htmlspecialchars($wgTitle));
            }
        }
    }
    if (_g('ad_side') == 'open') echo ' <div id="adsides"><ul>'._g('ad_side_text').'</ul></div>';
    ?>

</div></div></div>