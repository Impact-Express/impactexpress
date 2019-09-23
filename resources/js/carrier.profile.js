(function() {
    $("#tabstrip").kendoTabStrip({
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
    });

    let statusModal = document.querySelector("#statusFormModal");
    let statusBtn = document.querySelector("#statusModalBtn");
    let statusSpan = document.querySelector(".statusModalClose");
    let closeBtn = document.querySelector(".statusModalCloseButton");
    statusBtn.onclick = function() {
        statusModal.style.display = "block";
    };
    statusSpan.onclick = function(e) {
        statusModal.style.display = "none";
    };
    closeBtn.onclick = function(e) {
        statusModal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target === statusModal)
        {
            event.target.style.display = "none";
        }
    };
})();