$(document).ready(function() {
    // Summernote Short Description
    $('#short_description').summernote({
        height: 124,
    })
    // Summernote Detailed Description
    $('#detailed_description').summernote({
        height: 230,
    })
    // Summernote Image Description
    $('#image_description').summernote({
        height: 124,
    })
    // Summernote Image Description
    $('#config_value_textarea').summernote({
        height: 124,
    })

    $('#short_description, #detailed_description, #image_description, #config_value_textarea').summernote({
        tabsize: 2,
        minHeight: 124,
        placeholder: 'Nhập nội dung....',
        focus: true,
    })
});
