(function() {
    $("#tabstrip").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    });

    $("#sub-tabstrip").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    });

    $(document).ready(function() {
        $(".grid").kendoGrid({
            height: 485,
            sortable: true
        });
        $(".sub-grid").kendoGrid({
            height: 436,
            sortable: true
        });
    });
})();