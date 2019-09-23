(function() {
    $("#tabstrip").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    });

    $(".grid").kendoGrid({
        height: 876,
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
})();