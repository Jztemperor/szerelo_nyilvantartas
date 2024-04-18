<h1>Szia marci!</h1>
<div id="content">Felhasználó: </div>
<div id="content-email">Email: </div>
<script>

    function routeToTest() {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var obj = JSON.parse(this.response);
                document.getElementById("content").innerHTML += obj['username']
                document.getElementById("content-email").innerHTML += obj['email']
            }
        }
        xhttp.open("GET", "/api/testapi", true);
        xhttp.send();
    }
    routeToTest()
</script>
