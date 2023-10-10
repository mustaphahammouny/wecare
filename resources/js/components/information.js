import Selectpicker from "../helpers/selectpicker";

class Information {
    static selectCity = {
        id: '#select-city',
    };

    static init () {
        Selectpicker.init(this.selectCity);

        $(this.selectCity.id).on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            const city = $(this).selectpicker('val');

            Livewire.dispatch('city-updated', { city: city });
        });
    }
}

export default Information;
