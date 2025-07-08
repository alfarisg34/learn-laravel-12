<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('images/logoUmkm.png') }}" rel="icon">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin">
    </script>
    <script>
        tinymce.init({
            selector: '#desc',
            menubar: false,
            branding: false,
            // plugins: 'advlist lists link image media table preview',
            plugins: 'advlist lists link table preview image code',
            toolbar: 'undo redo | blocks | bold italic underline | bullist numlist | link image media | table | preview',

            images_upload_handler: function(blobInfo, success, failure) {
                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                const tokenTag = document.querySelector('meta[name="csrf-token"]');
                if (!tokenTag) {
                    console.error('CSRF token not found.');
                    failure("CSRF token not found.");
                    return;
                }

                const csrfToken = tokenTag.getAttribute('content');

                // ✅ Return the fetch call (THIS IS THE IMPORTANT FIX)
                return fetch('/admin/upload-image', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(json => {
                        if (json.location) {
                            success(json.location);
                        } else {
                            failure(json.message || 'Upload failed');
                        }
                    })
                    .catch((error) => {
                        failure('HTTP Error: ' + error.message);
                    });
            }
        });
    </script>
</head>
