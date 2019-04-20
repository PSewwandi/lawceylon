<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
    <title>Lawceylon-Admin Panel</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')
        @section('content')
            @show
        @include('admin.layouts.footer')
    </div>
</body>
</html>