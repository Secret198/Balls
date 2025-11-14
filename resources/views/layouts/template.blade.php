<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>

    <!-- CSS, scripts, etc. -->
</head>
<body>
    <a href="/">Home</a>
    <button id="fi">FI</button>
    <button id="en">EN</button>
    <div class="container">
        @yield('content')
    </div>

    <script>
        const fi = document.getElementById("fi")
        const en = document.getElementById("en")

        fi.addEventListener("click", () => {
            window.location.href = "/locale/fi"
        })
        en.addEventListener("click", () => {
            window.location.href = "/locale/en"
        })
    </script>
</body>
</html>