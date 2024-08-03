$(document).ready(function(){
    // load gallery on page load
    loadGallery();

    // Form submission for image upload
    $('#uploadImage').on('submit', function(e){
        e.preventDefault(); // Prevent default form submission
        var file_data = $('#image').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: 'src/upload.php', // PHP script to process upload
            type: 'POST',
            dataType: 'text', // what to expect back from the server
            cache: false,
            data: new FormData(this), // Form data for upload
            processData: false,
            contentType: false,
            success: function(response){
                let jsonData = JSON.parse(response);
                if(jsonData.status == 1){
                    $('#image').val(''); // Clear the file input
                    loadGallery(); // Fetch and display updated images
                    $('#upload-status').html('<div class="alert alert-success">'+jsonData.message+'</div>');
                } else {
                    $('#upload-status').html('<div class="alert alert-success">'+jsonData.message+'</div>'); // Display error message
                }
            }
        });
    });
});

// Function to load the gallery from server
function loadGallery() {
    $.ajax({
        url: 'src/fetch-images.php', // PHP script to fetch images
        type: 'GET',
        success: function(response){
            let jsonData = JSON.parse(response);
            $('#gallery').html(''); // Clear previous images
            if(jsonData.status == 1){
                $.each(jsonData.data, function(index, image){
                    $('#gallery').append('<div class="col-md-3"><img src="assets/uploads/'+image.file_name+'" class="img-responsive img-thumbnail"></div>'); // Display each image
                });
            } else {
                $('#gallery').html('<p>No images found...</p>'); // No images found message
            }
        }
    });
}
