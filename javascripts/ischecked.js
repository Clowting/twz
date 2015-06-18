/**
 * Created by Thijs on 18/06/2015.
 */
$(document).ready(function(){
    $('input[type="checkbox"]').on('change', function() {
        var checked = $(this).prop('checked');
        var value = $(this).val();
        var attrName = $(this).prop('name');
        var data = {isChecked: checked, id: value, date: attrName};

        console.log(checked);

        $.ajax({
            url: "updateBeschikbaarheid.php",
            type: "POST",
            data: data
        });
    });
});