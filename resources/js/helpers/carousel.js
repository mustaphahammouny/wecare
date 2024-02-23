import "owl.carousel";
import "owl.carousel/src/scss/owl.carousel.scss";

class Carousel {
    static init(param) {
        return $(param.id).owlCarousel({
            loop: true,
            items: 1,
            margin: 0,
            dots: true,
            nav: false,
            rtl: $("html").attr("dir") === "rtl",
            animateOut: "slideOutDown",
            animateIn: "fadeIn",
            smartSpeed: 1000,
            autoplay: 5000,
            autoplayHoverPause: true,
        });
    }

    static initTestemonial(param) {
        return $(param.id).owlCarousel({
            loop: true,
            margin: 50,
            center: false,
            dots: true,
            nav: true,
            rtl: $("html").attr("dir") === "rtl",
            autoplayHoverPause: false,
            autoplay: true,
            singleItem: true,
            smartSpeed: 1200,
            navText: [
                '<i class="far fa-arrow-left-long"></i>',
                '<i class="far fa-arrow-right-long"></i>',
            ],
            // navContainerClass: "owl-nav",
            // navClass: ["owl-prev", "owl-next"],
            responsive: {
                0: {
                    items: 1,
                    center: false,
                },
                480: {
                    items: 1,
                    center: false,
                },
                600: {
                    items: 1,
                    center: false,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1200: {
                    items: 3,
                },
            },
        });
    }
}

export default Carousel;
