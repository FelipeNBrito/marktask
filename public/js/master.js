$(document).ready(function() {
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
    $('.modal').modal();
    $('.collapsible').collapsible();
    $('select').material_select();
});

function deleteRegister(idForm) {
    $('#'+idForm).submit();
}