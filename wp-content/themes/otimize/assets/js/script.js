var app = (function(document, $) {
    $('header nav a').click(function(e) {
        e.preventDefault();
        var args = { scrollTop: $(this.hash).offset().top };

        if (window.matchMedia("(min-width: 768px)").matches) {
            args = { scrollTop: $(this.hash).offset().top - $('#header').innerHeight() };
        }

        $('html, body').animate(args, 800);
    })
})(document, jQuery);