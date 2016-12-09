$(document).ready(function () {
    $(".button-collapse").sideNav();
    $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrain_width: false,
            hover: true,
            gutter: 0,
            belowOrigin: true,
            alignment: 'left'
        }
    );
    $('.slider').slider({
        full_width: true,
        indicators: false,
        height: 300
    });
    $('.collapsible').collapsible();
    $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            in_duration: 300, // Transition in duration
            out_duration: 200, // Transition out duration
            starting_top: '4%', // Starting top style attribute
            ending_top: '10%' // Ending top style attribute
        }
    );
    Materialize.updateTextFields();
    $('select').material_select();
});
function getFormData(form) {
    var data = form.serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});
    return data;
}

function showValidation(rs) {
    jQuery.each(rs, function () {
        jQuery.each(this, function () {
            toastr.error(this);
        })
    });
}
