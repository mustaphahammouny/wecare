class Event {
    static btnScrollToTop = ".scrollToHome";
    static btnDropdown = ".dropbtn";
    static btnSidebar = ".dashboard_sidebar_toggle_icon";
    static accordionCollapse = ".accordion-collapse";

    static init() {
        this.openDropDown();
        this.toggleSidebar();
        this.scrollToTop();
        this.toggleAccordionItem();
    }

    static scrollToTop() {
        $(window).on("scroll", () => {
            if ($(window).scrollTop() > 300) {
                $(this.btnScrollToTop).addClass("show");
            } else {
                $(this.btnScrollToTop).removeClass("show");
            }
        });

        $(document).on("click", this.btnScrollToTop, (e) => {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "300");
        });
    }

    static openDropDown() {
        $(document).on("click", this.btnDropdown, () => {
            document.getElementById("myDropdown").classList.toggle("show");
        });
    }

    static toggleSidebar() {
        $(document).on("click", this.btnSidebar, () => {
            $(".dashboard.dashboard_wrapper").toggleClass(
                "dsh_board_sidebar_hidden"
            );
        });
    }

    static toggleAccordionItem() {
        $(document)
            .on("show.bs.collapse", this.accordionCollapse, (e) => {
                $(e.target)
                    .parent(".accordion-item")
                    .addClass("active", 1000);
            })
            .on("hide.bs.collapse", this.accordionCollapse, (e) => {
                $(e.target)
                    .parent(".accordion-item")
                    .removeClass("active", 1000);
            });
    }
}

export default Event;
