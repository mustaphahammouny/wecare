import Select2 from "../helpers/select2";

class Booking {
    static selectStatus = {
        id: '#select-status',
    };

    static init() {
        Select2.init(this.selectStatus);

        $(this.selectStatus.id).on('select2:select', function (e) {
            const status = e.params.data.id;

            Livewire.dispatch('status-updated', { status: status });
        });
    }
}

export default Booking;
