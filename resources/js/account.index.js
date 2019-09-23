let nameModal = document.querySelector("#nameFormModal");
let nameBtn = document.querySelector("#nameModalBtn");
let nameSpan = document.querySelector(".nameModalClose");
nameBtn.onclick = function() {
    nameModal.style.display = "block";
};
nameSpan.onclick = function() {
    nameModal.style.display = "none";
};

let emailModal = document.querySelector("#emailFormModal");
let emailBtn = document.querySelector("#emailModalBtn");
let emailSpan = document.querySelector(".emailModalClose");
emailBtn.onclick = function() {
    emailModal.style.display = "block";
};
emailSpan.onclick = function() {
    emailModal.style.display = "none";
};

let addressModal = document.querySelector("#addressFormModal");
let addressBtn = document.querySelector("#addressModalBtn");
let addressSpan = document.querySelector(".addressModalClose");
addressBtn.onclick = function() {
    addressModal.style.display = "block";
};
addressSpan.onclick = function() {
    addressModal.style.display = "none";
};

let phoneModal = document.querySelector("#phoneFormModal");
let phoneBtn = document.querySelector("#phoneModalBtn");
let phoneSpan = document.querySelector(".phoneModalClose");
phoneBtn.onclick = function() {
    phoneModal.style.display = "block";
};
phoneSpan.onclick = function() {
    phoneModal.style.display = "none";
};

window.onclick = function(event) {
    if (event.target === nameModal ||
        event.target === emailModal ||
        event.target === addressModal ||
        event.target === phoneModal)
    {
        event.target.style.display = "none";
    }
};