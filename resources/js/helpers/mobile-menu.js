import 'mmenu-js';
import 'mmenu-js/src/mmenu';

class MobileMenu {
    static init() {
        if ($('#menu').length == 0) {
            return;
        }

        return new Mmenu(
            '#menu',
            {
                navbar: {
                    title: "Menu",
                },
                searchfield: {
                    add: false,
                    addTo: "#contacts",
                },
                offCanvas: {
                    position: "left-front",
                },
            },
            {}
        );
    }
}

export default MobileMenu;