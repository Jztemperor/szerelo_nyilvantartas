<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
    <title>Dashboard</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="is-preload" onload="routeToDashboard()">
    @include('includes._dashboard-menu')
    @yield('content')

    <script>
        const metaElements = document.querySelectorAll('meta[name="csrf-token"]');
        const csrf = metaElements.length > 0 ? metaElements[0].content : "";
        function routeToDashboard() {
            event.preventDefault();
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", "/content/dashboard", true);
            xhttp.send();
        }
        function routeToWorksheets() {
            event.preventDefault();
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", "/content/worksheets", true);
            xhttp.send();
        }
        function routeToWorkers() {
            event.preventDefault();
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", "/content/workers", true);
            xhttp.send();
        }
        function routeToInbox() {
            event.preventDefault();
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", "/content/inbox", true);
            xhttp.send();
        }
    </script>
</body>
</html>
