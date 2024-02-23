import Datepicker from "../helpers/datepicker";

class Date {
    static datePicker = {
        id: '#datepicker',
    };

    static init () {
        Datepicker.init({
            ...this.datePicker,
            startDate: '+2d',
        });

        $(this.datePicker.id).on('changeDate', function() {
            const date = $(this).datepicker('getFormattedDate');

            Livewire.dispatch('date-updated', { date: date });
        });
    }
}

export default Date;
