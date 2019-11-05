<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax 2</title>

    <style>
        img {
            width: 10%;
            border-radius: 59%;
        }
    </style>
</head>
<body>

<a href="#" id="js_get_reponse">Vodka cocktail</a>

<ul id="list"></ul>

<div id="info"></div>


<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous">
</script>
<script type="text/javascript">
    $(document).ready(function () {

        //const variable1 = {name:'michel', age:12}
        //const variable2 = {name:'daniel', age:14}
        //const variable3 = {name:'bernard', age:16}
        // permet de faire les trois en meme temps
        // console.log({variable1, variable2, variable3})
        //console.log('%c Mes variables', 'color:pink;font-weight:bold')
        //console.table([variable1, variable2, variable3])


        $('#js_get_reponse').on( 'click' ,function(e){
            e.preventDefault();
           $.ajax({
               type: "GET",
               url: "https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=vodka",
               data: {},
               beforeSend : ()=> {
                  // $(this).fadeOut(1)
                   $('#js_get_reponse').fadeOut(1)
                   $('#info').fadeOut(1)
               },
               success: function (response) {

                 //  console.log(response)
                   $.each(response.drinks, function (i,item) {
                       $('#list').append('<li> <h4> ' + item.strDrink +" </h4> <img src=" + item.strDrinkThumb +  " > <a href='#' class='voirplus' data-id=" + item.idDrink +">Voir plus</a>  </li>" );
                    });

                   voirplus()
               },
               error: function()  {
                console.error('error')
               }
           })
        })


        function voirplus(){
            $('.voirplus').on('click', function (e) {
                e.preventDefault()
              //  console.log($(this).data('id'));
                $('#list').empty();
                $.ajax({
                    type: "GET",
                    url: "https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=" + $(this).data('id') ,
                    data: {},
                    beforeSend : ()=> {
                        $('#js_get_reponse').fadeIn(1)
                        $('#info').fadeIn(1)
                    },
                    success: function (response) {

                       // console.log(strDrink)
                        $.each(response.drinks, function (i,item) {

                            $('#info').html('<div><h2>' +item.strDrink + '</h2>' + "<img src=" + item.strDrinkThumb +  " > " + '<p>' + item.strInstructions +'</p> <p>' + item.strAlcoholic +'</p></div>');
                            var boisson = response.drinks[0]
                            for (var i = 0; i <=15; i++) {
                                var ingre = boisson['strIngredient'+i]
                                if(ingre != null && ingre != ""){
                                    $('#info').append('<p>'+ingre+'</p>')
                                }
                            }
                        })
                    },
                    error: function()  {
                        console.error('error')
                    }
                })
            })
        }

    })

</script>
</body>
</html>
