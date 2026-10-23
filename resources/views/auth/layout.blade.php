<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <title>@yield('title') · Not Defteri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.3.0/index.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admintema/css/adminlte.min.css') }}">
</head>
<body class="@yield('body-class', 'login-page') bg-body-secondary">
<main class="@yield('box-class', 'login-box')">
    @yield('content')
    <p class="text-center mt-3"><a href="{{ url('/') }}"><i class="bi bi-arrow-left me-1"></i>Blog ana sayfasına dön</a></p>
</main>
<script>
document.querySelectorAll('[data-password-toggle]').forEach(function (button) {
    button.addEventListener('click', function () {
        const input = document.getElementById(button.dataset.target);
        const icon = button.querySelector('.bi');
        const showPassword = input.type === 'password';

        input.type = showPassword ? 'text' : 'password';
        button.setAttribute('aria-pressed', String(showPassword));
        button.setAttribute('aria-label', showPassword ? 'Şifreyi gizle' : 'Şifreyi göster');
        icon.classList.toggle('bi-eye', !showPassword);
        icon.classList.toggle('bi-eye-slash', showPassword);
    });
});
</script>
</body>
</html>
