$(document).ready(function() {
    $("#grid").kendoGrid({
        pageable: {
            pageSize: 10,
            numeric: true,
            responsive: false
        },
        sortable: true,
        filterable: true,
        columnMenu: true,
        resizable: true,
    });


    // Get the modal
    let modal = document.querySelector("#formModal");

    // Get the button that opens the modal
    let btn = document.querySelector("#modalBtn");

    // Get the <span> element that closes the modal
    let span = document.querySelector(".close");

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
});