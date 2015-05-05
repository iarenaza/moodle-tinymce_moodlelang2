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
 * Plugin for Moodle 'moodlelang2' drop down menu.
 *
 * @package   tinymce_moodlelang2
 * @author    Iñaki Arenaza <iarenaza@mondragon.edu>
 * @copyright 2015 onwards Iñaki Arenaza & Mondragon Unibertsitatea
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

(function() {
    tinymce.create('tinymce.plugins.MoodlelangPlugin', {
        /**
         * Holds the list of available moodle languague packs
         *
         * @private
         */
        _langs : {},
        _highlight : 0,
        _highlight_css : '',
        _already_highlighted : 0,

        _span_multilang_begin : '<span class="multilang-begin mceNonEditable" data-mce-contenteditable="false" lang="%lang" xml:lang="%lang">{multilang %lang}</span>',
        _span_multilang_end : '<span class="multilang-end mceNonEditable" data-mce-contenteditable="false">{multilang}</span>',

        /**
         * Convert {multilang xx} and {multilang} strings to spans, so we can style them visually.
         * Remove superflous whitespace while at it.
         */
        _add_visual_styling : function(ed, content) {
            if (ed.plugins.moodlelang2._already_highlighted){
                return content;
            }

            if (!content) {
                content = ed.getContent();
            }

            // Work around for Chrome behaviour: apparently we can't do the .replace() on the
            // _span_multilang_begin property, so we use a temporary variable instead.
            var begin_str = ed.plugins.moodlelang2._span_multilang_begin;
            content = content.replace(new RegExp('{\\s*multilang\\s+([^}]+?)\\s*}', 'ig'), function(match, p1) {
                return begin_str.replace(new RegExp('%lang', 'g'), p1);
            });
            content = content.replace(new RegExp('{\\s*multilang\\s*}', 'ig'), ed.plugins.moodlelang2._span_multilang_end);

            ed.plugins.moodlelang2._already_highlighted = 1;
            return content;
        },

        /**
         * Remove the spans we added in _add_visual_styling() to leave only the {multilang xx} and {multilang} tags.
         * Also make sure we lowercase the multilang 'tags'
         */
        _remove_visual_styling : function(ed) {
            if (!ed.plugins.moodlelang2._already_highlighted){
                return;
            }

            tinymce.each(ed.dom.select('span.multilang-begin'), function(span) {
                ed.dom.setOuterHTML(span, span.innerHTML.toLowerCase());
            });
            tinymce.each(ed.dom.select('span.multilang-end'), function(span) {
                ed.dom.setOuterHTML(span, span.innerHTML.toLowerCase());
            });

            ed.plugins.moodlelang2._already_highlighted = 0;
        },

        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            ed.onInit.add(function(ed) {
                ed.plugins.moodlelang2._highlight = tinymce.util.JSON.parse(ed.getParam('moodlelang2_highlight'));

                if (ed.plugins.moodlelang2._highlight) {
                    ed.plugins.moodlelang2._highlight_css = tinymce.util.JSON.parse(ed.getParam('moodlelang2_css'));
                    ed.dom.addStyle(ed.plugins.moodlelang2._highlight_css);
                    ed.setContent(ed.plugins.moodlelang2._add_visual_styling(ed, ed.getContent()));
                }
            });

            ed.onBeforeGetContent.add(function(ed, o) {
                if (o.source_view && o.source_view == true) {
                    // If the user clicks on 'Cancel' or the close button on the html
                    // source code dialog view, make sure we re-add the visual styling.
                    var onClose = function(window) {
                        var ed = window.editor;
                        ed.windowManager.onClose.remove(onClose);
                        ed.setContent(ed.plugins.moodlelang2._add_visual_styling(ed, ed.getContent()));
                    }
                    ed.windowManager.onClose.add(onClose);

                    if (ed.plugins.moodlelang2._highlight) {
                        ed.plugins.moodlelang2._remove_visual_styling(ed);
                    }
                }
            });

            ed.onBeforeSetContent.add(function(ed, o) {
                if (o.source_view && o.source_view == true) {
                    if (ed.plugins.moodlelang2._highlight) {
                        o.content = ed.plugins.moodlelang2._add_visual_styling(ed, o.content);
                    }
                }
            });

            // Add an observer to the onPreProcess event to remove the highlighting spans while saving the content.
            ed.onPreProcess.add(function(ed, o) {
                if (o.save && o.save == true) {
                    if (ed.plugins.moodlelang2._highlight) {
                        ed.plugins.moodlelang2._remove_visual_styling(ed);
                        // Even if we have called _remove_visual_styling(), we are actually working
                        // on a copy of the content here. The original content of the editor is still
                        // highlighted, so keep the right state for _already_highlighted.
                        ed.plugins.moodlelang2._already_highlighted = 1;
                    }
                }
            });
        },

        /**
         * Creates control instances based in the incoming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc. then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use in order to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            switch (n) {
            case 'moodlelang2':
                var ed = tinymce.activeEditor;
                var langMenu = cm.createListBox('moodlelang2', {
                    title : 'moodlelang2.language',

                    onselect : function(v) {
                       if (ed.selection.getContent() != '') {
                            v = v.trim();
                            if (v != '') {
                                var text = ed.selection.getContent();
                                var newtext;
                                if (ed.plugins.moodlelang2._highlight) {
                                    // Work around for Chrome behaviour: apparently we can't do the .replace() on the
                                    // _span_multilang_begin property, so we use a temporary variable instead.
                                    var begin_str = ed.plugins.moodlelang2._span_multilang_begin;
                                    newtext = begin_str.replace(new RegExp('%lang', 'g'), v) + text + ed.plugins.moodlelang2._span_multilang_end;
                                } else {
                                    newtext = '{multilang ' + v +'}' + text + '{multilang}';
                                }
                                ed.selection.setContent(newtext);
                            }
                        }
                    },
                });

                // Retrieve the list of available languages and add them to the dropdown menu.
                ed.plugins.moodlelang2._langs = tinymce.util.JSON.parse(ed.getParam('moodlelang2_langs'));
                for (var lang in ed.plugins.moodlelang2._langs) {
                    langMenu.add(ed.plugins.moodlelang2._langs[lang], lang);
                }

                return langMenu;
            }

            return null;
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Moodlelang plugin',
                author : 'Iñaki Arenaza <iarenaza@mondragon.edu>',
                authorurl : 'https://www.linkedin.com/in/iarenaza',
                infourl : 'http://moodle.org',
                version : "1.0"
            };
        },

    });

    // Register plugin
    tinymce.PluginManager.add('moodlelang2', tinymce.plugins.MoodlelangPlugin);
})();

