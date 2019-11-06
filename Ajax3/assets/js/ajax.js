
$(document).ready(function () {
            $('#user').on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "ajax/getoneuser.php",
                    data: {},
                    beforeSend: () => {
                       $('#user').fadeOut(10)
                        $('#Username').empty();
                    },
                    success: function (response) {
                        $('#Username').html('<h4>'+response+'<h4>')
                        $('#user').fadeIn(100)
                    },
                    error: function () {
                        console.error('error')
                    }
                })
            })



    $('#forminscription').submit( function (e) {
         e.preventDefault();
         var form = $('#forminscription')
         $('#error_pseudo').empty();
         $('#error_email').empty();
         $('#error_password').empty();
         $.ajax({
             type: "POST",
             url: form.attr("action"),
             data: form.serialize(),
             //commenter la ligne lors des tests
             //dataType : "json",
             beforeSend: () => {
                 $('#user').empty()
                 $('#Username').empty();
             },
             success: function(response){
                 console.log(response)
             },
             error: function () {
                 console.error('error')
             }
         })
     })

 })


