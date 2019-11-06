function GetForm() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status ==  200){
            document.getElementById('user').remove();
            document.getElementById('Username').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "register.php", true);
    xhttp.send();
}

