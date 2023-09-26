jQuery(document).ready(function($) {
    $('.js-example-basic-multiple').select2();
    $('.sand_header_logo_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.sand_header_logo_img').attr('src', attachment.url);
            $('.sand_header_logo_img_url').val(attachment.url);
        })
        .open();
    });  

    $('.sand_sticky_logo_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.sand_sticky_logo_img').attr('src', attachment.url);
            $('.sand_sticky_logo_img_url').val(attachment.url);
        })
        .open();
    }); 

    $('.sand_favicon_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.sand_favicon_img').attr('src', attachment.url);
            $('.sand_favicon_img_url').val(attachment.url);
        })
        .open();
    }); 

    $('.sand_footer_logo_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.sand_footer_logo_img').attr('src', attachment.url);
            $('.sand_footer_logo_img_url').val(attachment.url);
        })
        .open();
    });

    $('.sand_breadcrumb_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.sand_breadcrumb_img').attr('src', attachment.url);
            $('.sand_breadcrumb_img_url').val(attachment.url);
        })
        .open();
    });


    $('.slider_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.slider_img').attr('src', attachment.url);
            $('.slider_img_url').val(attachment.url);
        })
        .open();
    }); 

    $('.about_first_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.about_first_img').attr('src', attachment.url);
            $('.about_first_img_url').val(attachment.url);
        })
        .open();
    }); 
    
    $('.about_second_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.about_second_img').attr('src', attachment.url);
            $('.about_second_img_url').val(attachment.url);
        })
        .open();
    }); 

    $('.first_location_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.first_location_img').attr('src', attachment.url);
            $('.first_location_img_url').val(attachment.url);
        })
        .open();
    }); 

    $('.second_location_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.second_location_img').attr('src', attachment.url);
            $('.second_location_img_url').val(attachment.url);
        })
        .open();
    }); 

    $('.third_location_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.third_location_img').attr('src', attachment.url);
            $('.third_location_img_url').val(attachment.url);
        })
        .open();
    }); 

    /************************************************************************************/
    $('.first_about_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.first_about_img').attr('src', attachment.url);
            $('.first_about_img_url').val(attachment.url);
        })
        .open();
    }); 
    /*************************************************************************************/
    $('.first_contact_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.first_contact_img').attr('src', attachment.url);
            $('.first_contact_img_url').val(attachment.url);
        })
        .open();
    });
});

   