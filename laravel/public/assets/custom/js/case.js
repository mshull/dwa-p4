$(function() {

    $('#submit-action').click(function(e){
        e.preventDefault();
        var formObj = $('#action-form');
        var formData = {
            type: $('#action-type').val(),
            deadline: $('#action-deadline').val().replace(" -",","),
            title: $('#action-title').val(),
            body: $('#action-body').val(),
            user: $('#action-user').val()
        };
        if (!formData.title.length) {
            return toastr.error("Please fill in the action title to continue.", "Problem Occured");
        }
        $.ajax({
            type: 'post',
            url: formObj.attr('action'),
            data: formData,
            dataType: 'json',
            success: function(data){
                location.reload();
            },
            error: function(data){
                return toastr.error(data, "Error");
            }
        });
    });

    $('#submit-note').click(function(e){
        e.preventDefault();
        var formObj = $('#note-form');
        var formData = {
            title: $('#note-title').val(),
            body: $('#note-body').val()
        };
        if (!formData.body.length) {
            return toastr.error("Please fill in the note content box to continue.", "Problem Occured");
        }
        $.ajax({
            type: 'post',
            url: formObj.attr('action'),
            data: formData,
            dataType: 'json',
            success: function(data){
                location.reload();
            },
            error: function(data){
                return toastr.error(data, "Error");
            }
        });
    });

    /*
    $('#submit-note').click(function(e){
        e.preventDefault();
        if (!$("#file-doc").val().length) {
            return toastr.error("Please select a file to continue.", "Problem Occured");
        }
        $("#file-form").submit();
    });
    */

    // global settings 
    $.fn.editable.defaults.inputclass = '';
    $.fn.editable.defaults.url = '/case/update';

    // array of editable fields
    var editables = [
        '#edit-case-calls',
        '#edit-case-defendant',
        '#edit-case-type',

        '#edit-contact-first-name',
        '#edit-contact-last-name',
        '#edit-contact-home-phone',
        '#edit-contact-work-phone',
        '#edit-contact-mobile-phone',
        '#edit-contact-emergency-phone',
        '#edit-contact-address',
        '#edit-contact-address-more',
        '#edit-contact-city',
        '#edit-contact-state',
        '#edit-contact-postal-code',
        '#edit-contact-email',
        '#edit-contact-birth-year',

        '#edit-user-first-name',
        '#edit-user-last-name',
        '#edit-user-email'
    ];

    // apply editable
    for (var i=0; i<editables.length; i++) {
        $(editables[i]).editable();
    }

});