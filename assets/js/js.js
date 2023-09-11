var heder = document.getElementById('header');
var mobileMenu = document.getElementById('mobile-menu');
var headerHeight = heder.clientHeight;
    mobileMenu.onclick = function() {
        var isClosed = header.clientHeight === headerHeight;
            if (isClosed) {
                heder.style.height = 'auto';
            } else {
                heder.style.height = null;
            }
    }