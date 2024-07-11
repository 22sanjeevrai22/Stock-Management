<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Ansh Stock/Inventory Management System</title>

    @include('panel.layouts.styles')

</head>

<body>

    <div class="main-wrapper">

        @include('panel.layouts.header')

        @include('panel.layouts.sidebar')

        <div class="page-wrapper">
            @yield('content-section')
        </div>

    </div>


    @include('panel.layouts.scripts')
</body>


</html>
