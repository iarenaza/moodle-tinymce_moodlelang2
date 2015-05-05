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

$string['highlightcss'] = 'CSS para los delimitadores';
$string['highlightcss_desc'] = "CSS usado para destacar los delimitadores del contenido multi-idioma.

Si desea mostrar el idioma para los bloque multi-idioma, puede usar algo como lo siguiente (este ejemplo es para el idioma Euskera, seguramente los colores no son los mejores posibles):

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
$string['highlight'] = 'Destacar los delimitadores';
$string['highlight_desc'] = 'Destacar visualmente los delimitadores del contenido multi-idioma (esto es, {mlang XX} y {mlang}) en el editor WYSIWYG';
$string['pluginname'] = 'Contenido Multi-Idioma (v2)';
$string['requiremultilang2'] = 'Requerir el filtro de Contenido Multi-Idioma (v2)';
$string['requiremultilang2_desc'] = 'Si se habilita, el menú desplegable de selección de idiomas solo es visible cuando esté habilitado el filtro de Contenido Multi-Idioma (v2).';
$string['showalllangs'] = 'Mostrar todos los idiomas';
$string['showalllangs_desc'] = 'Si se habilita, el menú desplegable de selección de idiomas contendrá todos los idiomas soportados por Moodle. En caso contrario, sólo se mostrarán los idiomas instalados y habilitados';

/* All lang strings used from TinyMCE JavaScript code must be named 'pluginname:stringname', no need to create langs/en_dlg.js */
$string['moodlelang2:desc'] = 'Ayuda a añadir contenido multi-idioma (necesita tener habilitado el filtro de Contenido Multi-Idioma (v2))';
$string['moodlelang2:language'] = 'Idioma';
