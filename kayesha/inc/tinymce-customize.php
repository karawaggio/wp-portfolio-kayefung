<?php
//tinyMCE base line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons') ){
    function base_extended_editor_mce_buttons($buttons) {
        // The settings are returned in this array. Customize to suite your needs.
        return array(
            'bold', 'italic','bullist', 'numlist', 'link', 'unlink', 'blockquote', 'outdent', 'indent', 'charmap', 'removeformat', 'spellchecker', 'fullscreen', 'wp_help'
        );
        /* WordPress Default
        return array(
            'bold', 'italic', 'strikethrough', 'separator', 
            'bullist', 'numlist', 'blockquote', 'separator', 
            'justifyleft', 'justifycenter', 'justifyright', 'separator', 
            'link', 'unlink', 'wp_more', 'separator', 
            'spellchecker', 'fullscreen', 'wp_adv'
        ); */
    }
    add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
}

// TinyMCE: Second line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons_2') ){
    function base_extended_editor_mce_buttons_2($buttons) {
        // The settings are returned in this array. Customize to suite your needs. An empty array is used here because I remove the second row of icons.
        return array('underline', 'justifyfull','pastetext', 'pasteword', 'removeformat','undo', 'redo', 'wp_help');
        /* WordPress Default
        return array(
            'formatselect', 'underline', 'justifyfull', 'forecolor', 'separator', 
            'pastetext', 'pasteword', 'removeformat', 'separator', 
            'media', 'charmap', 'separator', 
            'outdent', 'indent', 'separator', 
            'undo', 'redo', 'wp_help'
        ); */
    }
    add_filter("mce_buttons_2", "base_extended_editor_mce_buttons_2", 0);
}

