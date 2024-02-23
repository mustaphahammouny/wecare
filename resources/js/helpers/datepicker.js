import 'bootstrap-datepicker';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';

class Datepicker {
    static init(param) {
        return $(param.id).datepicker({
            format: 'dd/mm/yyyy',
            weekStart: 1,
            todayHighlight: true,
            maxViewMode: 0,
            startDate: param.startDate,
            templates: {
                leftArrow: '<i class="far fa-circle-left fa-2x"></i>',
                rightArrow: '<i class="far fa-circle-right fa-2x"></i>'
            },
        });
    }
}

export default Datepicker;
