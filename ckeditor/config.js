/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    config.filebrowserBrowseUrl = "http://localhost/concac/ckfinder/ckfinder.html&qu­ot";
    config.filebrowserImageBrowseUrl = "http://localhost/website/ckfinder/ckfinder.html?type=Images&CKEditor=content&CKEditorFuncNum=1&langCode=vi";
    //
    config.filebrowserFlashBrowseUrl = "http://localhost/website/ckfinder/ckfinder.html?type=Flash";
    //
    config.filebrowserUploadUrl = "http://localhost/website/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
    //
    config.filebrowserImageUploadUrl = "http://localhost/website/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
    //
    config.filebrowserFlashUploadUrl = "http://localhost/website/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"
};
