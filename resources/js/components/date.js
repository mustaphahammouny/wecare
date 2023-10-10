import Datepicker from "../helpers/datepicker";

class Date {
    static datePicker = {
        id: '#datepicker',
    };

    static init () {
        const startDate = moment().add(1, 'days').format('DD/MM//YYYY');

        Datepicker.init({
            ...this.datePicker,
            startDate,
        });

        $(this.datePicker.id).on('changeDate', function() {
            const date = $(this).datepicker('getFormattedDate');

            Livewire.dispatch('date-updated', { date: date });
        });
    }
}

export default Date;
