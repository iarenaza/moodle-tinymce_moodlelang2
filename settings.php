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

/**
 * Multi-language integration settings.
 *
 * @package   tinymce_moodlelang2
 * @copyright 2015 onwards Iñaki Arenaza & Mondragon Unibertsitatea
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require(dirname(__FILE__) . '/default-css.php');

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configcheckbox('tinymce_moodlelang2/requiremultilang2',
        get_string('requiremultilang2', 'tinymce_moodlelang2'), get_string('requiremultilang2_desc', 'tinymce_moodlelang2'), 1));
    $settings->add(new admin_setting_configcheckbox('tinymce_moodlelang2/showalllangs',
        get_string('showalllangs', 'tinymce_moodlelang2'), get_string('showalllangs_desc', 'tinymce_moodlelang2'), 0));
    $settings->add(new admin_setting_configcheckbox('tinymce_moodlelang2/highlight',
        get_string('highlight', 'tinymce_moodlelang2'), get_string('highlight_desc', 'tinymce_moodlelang2'), 0));
    $settings->add(new admin_setting_configtextarea('tinymce_moodlelang2/highlight_css',
        get_string('highlightcss', 'tinymce_moodlelang2'), get_string('highlightcss_desc', 'tinymce_moodlelang2'), $moodlelang2_default_css, PARAM_RAW));
}
