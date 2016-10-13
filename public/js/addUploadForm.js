$(document).ready(function () {
    $('.field').hide();

    $('#type_of_animation').on('change', function () {
        var select = $("#type_of_animation option:selected").val();

        switch (select) {
            case '':
                $('.field').hide();
            case "1":
                $('.field').hide();
                $('#carouselOption').show();

                break;
            case "2":
                $('.field').hide();
                $('#videoOption').show();

                break;
            case "3":
                $('.field').hide();
                $('#smthOption').show();

                break;
            default:                
                $('.field').hide();


        }
    });
});


