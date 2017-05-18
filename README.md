
# moodlelang2 Multi-language content Moodle plugin for TinyMCE editor

This plugin will add a drop down menu to the TinyMCE text editor in
Moodle that allows to add language tags to the selected content. These
tags are the same used by the multilang2 content filter. The list of
languages shown in the dropdown can contain either the full list of
Moodle languages, or just the languages available on the site. 

It can also visually highlight the language tags to make them more
prominent.

The plugin adds a custom capability (tinymce/moodlelang2:viewlanguagemenu)
that controls whether the language selection dropdown menu (and associated
highlighting) is available or not. This capability is assigned by default to
all roles based on the user archetype. So you need to **remove** this capability
from those roles you don't want to have the selection dropdown menu available.
Thanks to Michael Milette for the initial idea and implementation approach.

# Compatibility

The plugin has been tested and confirmed to work with the following components
and versions:

 * Moodle 2.7 and later
 * Google Chrome 42 and later
 * Microsoft Internet Explorer 11, and IE 9, 10 (tested in emulation mode)
 * Mozilla Firefox 37 and later

# Installation

To install the plugin, copy the files to lib/editor/tinymce/plugins/moodlelang2

