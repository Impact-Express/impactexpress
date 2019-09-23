(function() {
    // Get the modal
    let modalSales = document.querySelector("#formModalSales");
    let modalCost = document.querySelector("#formModalCost");

    // Get the button that opens the modal
    let btnSales = document.querySelector("#modalBtnSales");
    let btnCost = document.querySelector("#modalBtnCost");

    // Get the <span> element that closes the modal
    let spanSales = document.querySelector("#closeSales");
    let spanCost = document.querySelector("#closeCost");

    // When the user clicks on the button, open the modal
    btnSales.onclick = function() {
        modalSales.style.display = "block";
    };
    btnCost.onclick = function() {
        modalCost.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    spanSales.onclick = function() {
        modalSales.style.display = "none";
    };
    spanCost.onclick = function() {
        modalCost.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modalSales || event.target === modalCost) {
            modalSales.style.display = "none";
            modalCost.style.display = "none";
        }
    };

    $(".files").kendoUpload({
        multiple: false
    });

    $("#grid").kendoGrid({
        pageable: {
            pageSize: 10,
            numeric: true,
            responsive: false
        },
        sortable: true,
        filterable: true,
        columnMenu: true,
        resizable: true
    });
})();
