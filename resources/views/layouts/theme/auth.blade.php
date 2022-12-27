
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | CITech - Soluciones Tecnológicas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('ubold/assets/images/favicon.ico') }}">

		<!-- App css -->
		<link href="{{ asset('ubold/assets/css/config/material/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
		<!-- icons -->
		<link href="{{ asset('ubold/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

<body class="loading auth-fluid-pages pb-0">


    @yield('content')


    <!-- Vendor js -->
    <script src="{{ asset('ubold/assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('ubold/assets/js/app.min.js') }}"></script>


</body>

</html>
