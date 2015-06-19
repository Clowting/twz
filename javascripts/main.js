$(document).ready(function() {

    $('.date-field').datepicker({
        format: "dd-mm-yyyy",
        todayBtn: "linked",
        language: "nl",
        calendarWeeks: true,
        autoclose: true
    });

    $("#tentamen-add").validate({
        debug: false,
        errorClass: 'alert alert-danger alert-form',
        highlight: function (element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        unhighlight: function (element, errorClass, validClass) {
            return false;  // ensure this function stops
        },
        //validClass: 'alert alert-success alert-form',
        errorElement: 'div',
        rules: {
            opleiding: {
                required: true
            },
            naam: {
                required: true,
                minlength: 2
            },
            opmerking: {
                required: false,
                minlength: 2
            },
            aantal: {
                required: true,
                digits: true
            },
            datum: {
                required: true
            },
            begintijd: {
                required: true
            },
            eindtijd: {
                required: true
            }
        },
        messages: {
            opleiding: {
                required:  "Kies a.u.b. een opleiding/academie."
            },
            naam: {
                required:  "Voer a.u.b. de 'naam' van het tentamen in.",
                minlength: "Voer a.u.b. minimaal 2 tekens in."
            },
            opmerking: {
                minlength: "Voer a.u.b. minimaal 2 tekens in."
            },
            aantal: {
                required: "Voer a.u.b. het aantal surveillanten in.",
                digits: "Voer a.u.b. een geldig getal in"
            },
            datum: {
                required: "Voer a.u.b. de datum van het tentamen in."
            },
            begintijd: {
                required: "Voer a.u.b. de begin tijd van het tentamen in."
            },
            eindtijd: {
                required: "Voer a.u.b. de eind tijd van het tentamen in."
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});

function timetableUnlink(sid, tid) {
    var data = {sid: sid, tid: tid};

    $.ajax({
        url: "timetableUnlink.php",
        type: "POST",
        data: data,
        success: function(result) {
            if(result == 'success') {

                $('#sid-' + sid + '-tid-' + tid).fadeOut(function() {
                    $('#sid-' + sid + '-tid-' + tid).remove();
                });
            }
        }
    });
}