// select menus
$(document).ready(function(){
    $('select').formSelect();
  });

// autofill dropdown for gearbox
$(function() {
    $("#transmission").on('change', function() {
        if (($('#transmission option:selected').text()) == "Automaat"){
            $('#gears').val("7");
            $('#gears').formSelect();
        } else {
            $('#gears').val("5");
            $('#gears').formSelect();
        }
    });
});