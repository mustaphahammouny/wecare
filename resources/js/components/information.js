import Select2 from "../helpers/select2";

class Information {
    static selectCity = {
        id: '#select-city',
    };

    static init() {
        // Selectpicker.init(this.selectCity);

        // $(this.selectCity.id).on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
        //     const city = $(this).selectpicker('val');

        //     Livewire.dispatch('city-updated', { city: city });
        // });

        Select2.init(this.selectCity);

        $(this.selectCity.id).on('select2:select', function (e) {
            const city = e.params.data.id;

            Livewire.dispatch('city-updated', { city: city });
        });
    }
}

export default Information;
