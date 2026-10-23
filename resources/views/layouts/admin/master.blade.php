<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <title>@yield('title', 'Yönetim Paneli') · Not Defteri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.3.0/index.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/styles/overlayscrollbars.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admintema/css/adminlte.min.css') }}">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
    @include('layouts.admin.header')
    @include('layouts.admin.sidebar')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">@yield('page-title', 'Panel')</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Yönetim</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('page-title', 'Panel')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content"><div class="container-fluid">@yield('content')</div></div>
    </main>
    @include('layouts.admin.footer')
</div>
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admintema/js/adminlte.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.querySelector('.sidebar-wrapper');
    if (wrapper && window.innerWidth > 992 && window.OverlayScrollbarsGlobal?.OverlayScrollbars) {
        window.OverlayScrollbarsGlobal.OverlayScrollbars(wrapper, {
            scrollbars: { theme: 'os-theme-light', autoHide: 'leave', clickScroll: true }
        });
    }
});
</script>
</body>
</html>
