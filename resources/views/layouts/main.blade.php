<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>R&R System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}" color="#6366f1">
        <link rel="shortcut icon" href="{{ asset('assets/favicon/favicon.ico') }}">
        
        <meta name="msapplication-TileColor" content="#080032">
        <meta name="msapplication-config" content="{{ asset('assets/favicon/browserconfig.xml') }}">
        <meta name="theme-color" content="#ffffff">
        
        <!-- Vendor Styles -->
        <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
        <link rel="stylesheet" media="screen" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
        
        <!-- Main Theme Styles + Bootstrap -->
        <link rel="stylesheet" media="screen" href="{{ asset('assets/css/theme.min.css') }}">
        
      

        <!-- Theme mode -->
        <script>
            let mode = window.localStorage.getItem('mode'),
                root = document.getElementsByTagName('html')[0];
            if (mode !== null && mode === 'dark') {
            root.classList.add('dark-mode');
            } else {
            root.classList.remove('dark-mode');
            }
        </script>
        

        
    </head>
    
    <body>

        @include('inc.navbar')
        
        @yield('content')
        
        {{-- @include('inc.footer') --}}

        <!-- Vendor Scripts -->
        <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
        <script src="assets/vendor/jarallax/dist/jarallax.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Main Theme Script -->
        <script src="assets/js/theme.min.js"></script>

        <script>
            // Get references to the input, label, and image elements
            const imageUploadInput = document.querySelectorAll('input[name="image_proof"]');
            const proofOfResolutionElements = document.querySelectorAll('img[id^="proofOfResolution-"]');
            const changePictureBtns = document.querySelectorAll('button[id^="changePictureBtn-"]');

            // Add a click event listener to each changePictureBtn button
            changePictureBtns.forEach((changePictureBtn, index) => {
                changePictureBtn.addEventListener('click', function () {
                    // When the button is clicked, trigger a click event on the hidden input element
                    imageUploadInput[index].click();
                });
            });

            // Add an event listener to each input element to handle the file selection
            imageUploadInput.forEach((imageUploadInput, index) => {
                imageUploadInput.addEventListener('change', function () {
                    // Handle the selected file here (e.g., upload it to a server, display a preview, etc.)
                    const selectedFile = imageUploadInput.files[0];

                    if (selectedFile) {
                        // Create a FileReader to read the selected image file
                        const reader = new FileReader();

                        // Define a function to execute when the FileReader has loaded the image
                        reader.onload = function (e) {
                            // Set the source of the proofOfResolution element to the newly selected image
                            proofOfResolutionElements[index].src = e.target.result;
                        };

                        // Read the selected file as a data URL, triggering the onload function
                        reader.readAsDataURL(selectedFile);
                    }
                });
            });

        </script>
    </body>
</html>
