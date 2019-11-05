<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax 1</title>
</head>
<body>

<div id="demo">
    <h2>Ajax va changer le texte</h2>
    <button type="button" onclick="GetText()">Ajouter du texte</button>
    <div id="jsdemo"></div>

    <h2> GET </h2>
    <button type="button" onclick="GetText2()">Ajouter nom</button>
    <div id="jsdemo2"></div>

    <h2>POST</h2>
    <button type="button" onclick="GetText3()">Ajouter </button>
    <div id="jsdemo3"></div>
</div>

<script type="text/javascript">
    // Afficher du nouveau text
    function GetText() {

        if(window.XMLHttpRequest){
            // utiliser pour échanger les données entre serveur et application
            var xhttp = new XMLHttpRequest();
        }
        else {
            // IE 5/6
            var xhttp = new ActiveXObject("Microsoft.XMLHTTP")
        }
        // Quand les éléments vont changer, je veux que tu fasse quelque chose
        xhttp.onreadystatechange = function () {
            // Verifier deux choses : Statut 4 : request fini et reponse prete = tout est OK
            // ready state = O | 1 server pas connecte  | 2 recu requete mais pas prete...
            if (this.readyState == 4 && this.status ==  200){
                // il affiche le texte dans la bonne balise
                console.log(this.responseText);
                //ajouter le texte
                document.getElementById('jsdemo').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "ajax_info.html", true);
        xhttp.send();
    }


    function GetText2() {

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status ==  200){
                document.getElementById('jsdemo2').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "demo.php?nom=follin&prenom=emilie", true);
        xhttp.send();

    }


    function GetText3() {

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status ==  200){
                document.getElementById('jsdemo3').innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "demo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xhttp.send("nom=Lemarie&prenom=Lou");

    }
</script>

</body>
</html>
