$(document).ready(function () {
    // when opening the sidebar
    $('.nav-icon').on('click', function () {
        // open sidebar
        $('.menu').toggleClass('open');
    });

    // if dismiss or overlay was clicked
    $('#dismiss').on('click', function () {
        $('#sidenav').removeClass('open');
    });
});

//image preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result);
            $('#image-preview').hide();
            $('#image-preview').fadeIn(650);
        }
        $('#input_image_hd').val(input.files[0].name);
        reader.readAsDataURL(input.files[0]);
    }
}
$("#file-input").change(function() {
    readURL(this);
});
