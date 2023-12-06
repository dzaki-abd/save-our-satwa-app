const backToTopButton = document.getElementById('back-to-top');

window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if ( document.body.scrollTop > 20 || document.documentElement.scrollTop > 20 ) {
        backToTopButton.style.display = 'block';
    } else {
        backToTopButton.style.display = 'none';
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}