require('./bootstrap');
require('../../public/js/kendo/kendo.all.min');
$('.wrapper').kendoRippleContainer();

// Any code that needs to run in the entire app goes here...

//TODO: refactor this to be used on any form
$('.disable-on-click').on('click',function() {
    $(this).val('Please wait ...')
        .attr('disabled','disabled');
    $('#delete-form-'+$(this).data('form')).submit();
});




// class App {
//     constructor() {
//         this.mobileNav();
//     }
// }
// // Use the prototype syntax for now, later change to class property syntax
// App.prototype.mobileNav = function() {
//     let hamburgerButton = document.querySelector('.hamburger');
//     let mobileNav = document.querySelector('.mobile-nav');

//     function openMobile() {
//         mobileNav.classList.add('open');
//     }

//     function closeMobile() {
//         mobileNav.classList.remove('open');
//     }

//     hamburgerButton.addEventListener('click', openMobile);
//     mobileNav.addEventListener('click', closeMobile);
// };

// new App();
