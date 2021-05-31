
$( document ).ready(function() {
$(document).on('click','.openform a',function (){
    $('#__list').hide();
    $('#__card').show();

});

    $(document).on('click','#reset',function (){
        $('#__list').show();
        $('#__card').hide();

    });
});