import select2 from 'select2';
import "/node_modules/select2/dist/css/select2.css";
import "select2-bootstrap-5-theme/dist/select2-bootstrap-5-theme.min.css";

select2();

class Select2 {
    static init(param) {
        return $(param.id).select2({
            theme: "bootstrap-5",
            minimumResultsForSearch: Infinity,
            placeholder: $(param.id).data('placeholder'),
            width: '100%',
        });
    }
}

export default Select2;
