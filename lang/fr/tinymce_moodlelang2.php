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

$string['highlightcss'] = 'CSS pour séparateurs';
$string['highlightcss_desc'] = "CSS utilisé pour mettre en évidence les délimiteurs de contenus multilingues.

Si vous souhaitez afficher la langue pour les blocs {mlang}, vous pouvez utiliser quelque chose comme ce qui suit (cet exemple s'applique à la langue Française)&nbsp;:

<pre>
.multilang-begin:lang(fr):before {
    content: \"fr\";
    position: relative;
    top: -0.5em;
    font-weight: bold;
    background-color: #e05e5e;
    color: #ffffff;
}
</pre>
";
$string['highlight'] = 'mettre en évidence les délimiteurs';
$string['highlight_desc'] = "Mettre en évidence visuellement les délimiteurs multilingues (c.-à-d. {mlang XX} et {mlang}) dans l'éditeur WYSIWYG.";
$string['pluginname'] = 'Contenu multilingue (v2)';
$string['requiremultilang2'] = 'Exige le filtre Contenu multilingue (v2)';
$string['requiremultilang2_desc'] = 'Si activé, le menu déroulant des langues sera visible uniquement lorsque le filtre Contenu multilingue (v2) est activé.';
$string['showalllangs'] = 'Afficher toutes les langues';
$string['showalllangs_desc'] = 'Si activé, le menu déroulant des langues contiendra toutes les langues supporté dans Moodle. Si pas activé, seules les langues installées et activées apparaitront.';

/* All lang strings used from TinyMCE JavaScript code must be named 'pluginname:stringname', no need to create langs/en_dlg.js */
$string['moodlelang2:desc'] = 'Aide à ajouter du contenu multilingue (le filtre Contenu multilingue (v2) doit être activé)';
$string['moodlelang2:language'] = 'Langue';
