/**
 * Created by macbook on 08.11.2017.
 */


$(document).ready(function(){
    $('.pending').hide();
    $('#submbutton').parents('form').submit(function(e){
        e.preventDefault();

        var data = $(this).serialize();

        $('.pending').show();
        $('#submbutton').hide();

        $.post(window.location.href, data, function(success){

            alert('Товары успешно загружены');
            console.log(success);
            $('.pending').hide();
            $('#submbutton').show();
        }).fail(function() {

            alert('Произощла ошибка');

            $('.pending').hide();
            $('#submbutton').show();
        });
    });
});