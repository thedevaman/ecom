<!DOCTYPE html>
<html lang="en">
<head>
   
    @include('admin.layout.head')

</head>
<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    @include('admin.layout.nav')
    @include('admin.layout.sidebar')
        @yield('content')
    @include('admin.layout.footer')
    @include('admin.layout.script')
    </div>
</body>
</html>