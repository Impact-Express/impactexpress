$("#tabstrip").kendoTabStrip({
    animation:  {
        open: {
            effects: "fadeIn"
        }
    }
});

$(document).ready(function() {
    $(".grid").kendoGrid({
        sortable: true
    });
});