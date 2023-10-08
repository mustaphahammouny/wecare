import 'bootstrap-select';
import 'bootstrap-select/sass/bootstrap-select.scss';

class Selectpicker {
    static init (param) {
        $(param.id).selectpicker();
    }
}

export default Selectpicker;
