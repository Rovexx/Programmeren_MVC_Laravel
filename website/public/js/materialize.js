//select menus
$(document).ready(function(){
    $('select').formSelect();
  });

//autofill dropdown for gearbox
$(function() {
         
    $("#1").on('change', function() {
        if (($('#1 option:selected').text()) == "Automaat"){
            $('#2').val("");
            $('#2').formSelect();
        } else {
            $('#2').val("4");
            $('#2').formSelect();
        }
    });
});