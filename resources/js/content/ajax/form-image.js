$(document).on('click', '.chooseImage', function(){
    var name = $(this).data('name');

    $('.chooseImage').removeClass('active');
    $(this).addClass('active');
});

$(".mediaLibrary").select2({
    templateResult: formatState,
    templateSelection: formatState
});


$(".mediaLibraryMultiple").select2({
    templateResult: formatState,
    templateSelection: formatState,
    multiple: true,
});



// function formatState (opt) {
//     if (!opt.id) {
//         return opt.text.toUpperCase();
//     }

//     var optimage = $(opt.element).attr('data-image');
//     console.log(optimage)
//     if(!optimage){
//        return opt.text.toUpperCase();
//     } else {
//         var $opt = $(
//            '<span><img src="' + optimage + '" width="30px" /> ' + opt.text.toUpperCase() + '</span>'
//         );
//         return $opt;
//     }
// };

// $(document).on('click', '.chooseImageLibrary', function(){

// });

// $(document).on('click', '.uploadFileCancel', function(){

// });

// $(document).on('click', '.uploadFileSave', function(){
//     // $(this).parent("form").submit();
//      $('#imageUpload').submit();
// });

// $(document).on('submit', '.imageUpload', function(){

// });

// $(document).on('click', '.chooseImageUpload', function(){
//     $(this).siblings('.uploadImagePreview').first().children('input').click()
// });
// $(document).on('change', '.inputImageUpload', function(event){
//     var reader = new FileReader();
//     reader.onload = function(){
//       var output = document.getElementById('chooseImageOutput');
//       output.src = reader.result;
//     };
//     reader.readAsDataURL(event.target.files[0]);
// });









