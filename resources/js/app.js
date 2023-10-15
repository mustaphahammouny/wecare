import "./bootstrap";

// Components
import InformationComponent from "./components/information";
import DateComponent from "./components/date";

// Event
import Event from "./event";

// Helper
import MobileMenu from "./helpers/mobile-menu";

class App {
    static dir = $('meta[name="dir"]').attr("content");

    static components = {
        "components.information": InformationComponent,
        "components.date": DateComponent,
    };

    static init() {
        const self = this;

        document.addEventListener("DOMContentLoaded", () => {
            Event.init();
            MobileMenu.init();
        });

        document.addEventListener("livewire:navigated", () => {
            $("html, body").animate({ scrollTop: 0 }, "300");
            MobileMenu.init();
        });

        document.addEventListener("livewire:init", () => {
            Livewire.hook("component.init", ({ component }) => {
                if (self.components.hasOwnProperty(component.name)) {
                    self.components[component.name].init();
                }
            });
        });
    }
}

App.init();
