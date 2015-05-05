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
 * Strings for 'Multilang v2' plugin.
 *
 * @package   tinymce_moodlelang2
 * @copyright 2015 onwards Iñaki Arenaza & Mondragon Unibertsitatea
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['highlightcss'] = 'CSS for delimiters';
$string['highlightcss_desc'] = "CSS used to highlight the multi-language content delimiters.

If you want to display the language for the multilang blocks, you can use something like the following (this example is for the Basque language, colors are probably not the best ones):

<pre>
.multilang-begin:lang(eu):before {
    content: \"eu\";
    position: relative;
    top: -0.5em;
    font-weight: bold;
    background-color: #e05e5e;
    color: #ffffff;
}
</pre>
";
$string['highlight'] = 'Highlight delimiters';
$string['highlight_desc'] = 'Visually highlight the multi-language content delimiters (i.e., {mlang XX} and {mlang}) in the WYSIWYG editor';
$string['pluginname'] = 'Multi-Language Content (v2)';
$string['requiremultilang2'] = 'Require Multi-Language Content (v2) filter';
$string['requiremultilang2_desc'] = 'If enabled, the language drop down menu is visible only when the Multi-Language Content (v2) filter is enabled.';
$string['showalllangs'] = 'Show all languages';
$string['showalllangs_desc'] = 'If enabled, the language drop down menu will contain all the languages Moodle supports. If not, only the installed and enabled languages will be shown.';

/* All lang strings used from TinyMCE JavaScript code must be named 'pluginname:stringname', no need to create langs/en_dlg.js */
$string['moodlelang2:desc'] = 'Helps adding multilingual content (you need the Multi-Language Content (v2) filter enabled)';
$string['moodlelang2:language'] = 'Language';
