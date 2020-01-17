$(function () {
    // var test_dropzone = new Dropzone("div#test-dropzone");
});


Dropzone.options.imageDropzone = {
    paramName: "image", // The name that will be used to transfer the file
    maxFilesize: 4, // MB
    clickable: true,
    // previewsContainer: "#preview_container",
    autoProcessQueue: true,
    acceptedFiles:".jpg,.jpeg,.png",
    // dictDefaultMessage: 'Drag an image here to upload, or click to select one',
    init: function () {
        // this.on("queuecomplete", function (file) {
        //     console.log('Upload complete.');
        // });
        this.on("success", function (file, response) {
            console.log(response.url);
            $('.dz-default').removeClass('dz-available');
            this.removeFile(file);
            setTimeout(() => {  $('#profile_image').attr('src', response.url); }, 500);

        });
        this.on("dragenter", function (event) {
            $('.dz-default').addClass('dz-available');
            console.log("dragged started!" + event);
        });
        this.on("dragleave", function (event) {
            $('.dz-default').removeClass('dz-available');

            console.log("dragged done!" + event)
        });
    },
    createImageThumbnails: false,
}


$(function(){
    $('#dropzone_open').click(function(){
        $('#image-dropzone').get(0).dropzone.hiddenFileInput.click();

    });
});
