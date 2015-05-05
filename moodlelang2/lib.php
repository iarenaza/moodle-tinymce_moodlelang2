<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();

/**
 * Plugin for Moodle 'Multilingual content' drop down menu.
 *
 * @package   tinymce_moodlelang2
 * @copyright 2015 onwards Iñaki Arenaza & Mondragon Unibertsitatea
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tinymce_moodlelang2 extends editor_tinymce_plugin {
    /** @var array list of buttons defined by this plugin */
    protected $buttons = array('moodlelang2');

    protected function update_init_params(array &$params, context $context,
            array $options = null) {

        if ($this->get_config('requiremultilang2', 1)) {
            // If multi-language content filter (v2) is disabled, do not add drop down menu.
            $filters = filter_get_active_in_context($context);
            if (!array_key_exists('multilang2', $filters)) {
                return;
            }
        }

        if ($row = $this->find_button($params, 'formatselect')) {
            // Add button after 'formatselect'.
            $this->add_button_after($params, $row, 'moodlelang2', 'formatselect');
        } else {
            // Add this button in the end of the first row (by default 'formatselect' button should be in the first row).
            $this->add_button_after($params, 1, 'moodlelang2');
        }

        // We need to pass the list of languages to tinymce.
        if ($this->get_config('showalllangs')) {
            $langs = get_string_manager()->get_list_of_languages();
        } else {
            $langs = get_string_manager()->get_list_of_translations();
        }

        asort($langs);
        $params['moodlelang2_langs'] = json_encode($langs);

        if ($highlight = $this->get_config('highlight', 1)) {
            $params['moodlelang2_highlight'] = json_encode($highlight);
        }

        require_once(dirname(__FILE__) .'/default-css.php');
        if ($highlight_css = $this->get_config('highlight_css', $moodlelang2_default_css)) {
            $params['moodlelang2_css'] = json_encode($highlight_css);
        }

        // Add JS file, which uses default name.
        $this->add_js_plugin($params);
    }
}
