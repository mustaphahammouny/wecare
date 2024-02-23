import 'bootstrap-select';
import 'bootstrap-select/sass/bootstrap-select.scss';

class Selectpicker {
    static init(param) {
        $.fn.selectpicker.Constructor.BootstrapVersion = '5';

        return $(param.id).selectpicker();
    }
}

export default Selectpicker;
