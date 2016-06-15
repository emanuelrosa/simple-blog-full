/*
 Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://cksource.com/ckfinder/license
 */

        CKFinder.customConfig = function(config)
{
    // Define changes to default configuration here.
    // For the list of available options, check:
    // http://docs.cksource.com/ckfinder_2.x_api/symbols/CKFinder.config.html

    // Sample configuration options:
    // config.uiColor = '#BDE31E';
    // config.language = 'fr';
    // config.removePlugins = 'basket';

    config.filebrowserBrowseUrl = 'ckeditor/ckfinder/ckfinder.html',
            config.filebrowserImageBrowseUrl = 'ckeditor/ckfinder/ckfinder.html?type=Images',
            config.filebrowserFlashBrowseUrl = 'ckeditor/ckfinder/ckfinder.html?type=Flash',
            config.filebrowserUploadUrl = 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Fil­es',
            config.filebrowserImageUploadUrl = 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Ima­ges',
            config.filebrowserFlashUploadUrl = 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

};
