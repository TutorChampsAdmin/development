/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here.
    // For complete reference see:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config

    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbarGroups = [
        { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        { name: 'styles' },
        { name: 'colors' },
        { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'forms' },
        { name: 'tools' },
        //      { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
        //      { name: 'others' },


        //      { name: 'about' }
    ];

    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    config.removeButtons = 'Underline,Superscript,Image,Strike,Subscript,RemoveFormat,SpecialChar,HorizontalRule,Table,Blockquote,About,Source,Anchor,Cut,Copy,Paste';

    // Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';
    //config.removePlugins = 'elementspath';
    //config.resize_enabled = false;
    
//config.autoGrow_minHeight = 50;

config.extraPlugins = 'autolink';
config.height = '150px';
};
CKEDITOR.on('instanceReady', function(ev) {
    ev.editor.on('paste', function(evt) { 
        evt.data.dataValue = evt.data.dataValue.replace(/&nbsp;/g,'');
        evt.data.dataValue = evt.data.dataValue.replace(/<p><\/p>/g,'');
        evt.data.dataValue = evt.data.dataValue.replace(/<p><br><\/p>/g,'');
        console.log(evt.data.dataValue);
    }, null, null, 9);
});