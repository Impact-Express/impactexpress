(function() {
    $("#grid").kendoGrid({
        dataSource: {
            schema: {
                model: {
                    fields: {
                        weight: { type: "number" },
                        zone1: { type: "number" },
                        zone2: { type: "number" },
                        zone3: { type: "number" },
                        zone4: { type: "number" },
                        zone5: { type: "number" },
                        zone6: { type: "number" },
                        zone7: { type: "number" },
                        zone8: { type: "number" },
                        zone9: { type: "number" },
                        zone10: { type: "number" },
                    }
                }
            },
        },
        pageable: {
            pageSize: 17,
            numeric: true,
            responsive: false
        },
        sortable: true,
        filterable: true,
        columnMenu: true,
        resizable: true
    });
})();
