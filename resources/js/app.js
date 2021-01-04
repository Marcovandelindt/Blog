require('./bootstrap');

require('alpinejs');

$(document).ready(function () {
    if ($('.alert-box')[0]) {
        setTimeout(function () {
            $('.alert-box').fadeOut(500);
        }, 5000);
    }
 });