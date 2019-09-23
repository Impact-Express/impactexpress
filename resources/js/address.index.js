// (function() {
    const form_speed = 400;

    // New Collection Address Form
    // Keep form open if there are errors
    if (!($('.collection-addresses #new-collection-address-form').find('input.is-invalid').length !== 0)) {
        $('#new-collection-address-form').hide();
    }

    // Show form on add button click
    $('.collection-addresses .new-btn').on('click', function() {
        $('#new-collection-address-form').show(form_speed);
        $('.collection-addresses .new-btn').hide();
    });

    // Hide form on cancel click
    $('.cancel-collection-address').on('click', function() {
        $('#new-collection-address-form').hide(form_speed);
        $('.collection-addresses .new-btn').show();
    });

    // New Delivery Address Form
    // Keep form open if there are errors
    if (!($('.delivery-addresses #new-delivery-address-form').find('input.is-invalid').length !== 0)) {
        $('#new-delivery-address-form').hide();
    }

    // Show form on add button click
    $('.delivery-addresses .new-btn').on('click', function() {
        $('#new-delivery-address-form').show(form_speed);
        $('.delivery-addresses .new-btn').hide();
    });

    // Hide form on cancel click
    $('.cancel-delivery-address').on('click', function() {
        $('#new-delivery-address-form').hide(form_speed);
        $('.delivery-addresses .new-btn').show();
    });

    // Edit address forms
    // Keep form open if there are errors
    let edit_forms = $('.address-edit-form');

    edit_forms.each(function() {
        let form = $(this);
        if (!(form.find('input.is-invalid').length !== 0)) {
            form.hide();
        }
    });

    // Show form on edit button click
    $('[id^="edit-btn-"]').on('click', function() {
        let id = $(this).data("n");
        $('#address-edit-form-' + id).show(form_speed);
    });

    $('[id^="cancel-edit-address-"]').on('click', function() {
        id = $(this).data("n");
        $('#address-edit-form-' + id).hide(form_speed);
    });

    $('.k-button.delete').on('click', function() {
        if (confirm('Really delete address?')) {
            let frm = $(this).siblings('form');
            frm.submit();
        }
    });
// })();