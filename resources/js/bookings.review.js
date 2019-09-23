$('.open-modal').on('click', function() {
    let id = $(this).data("modal");
    $('#details-modal__' + id).show();
});

$('.close-modal').on('click', function() {
    let id = $(this).data("modal");
    $('#details-modal__' + id).hide();
});

