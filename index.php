<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Spellingchecker</title>

    <script>
        $(document).ready(function() {


            $("#myButton").click(function() {
                // $("#resultaten").html( $("#woord").val() );
                $.post("woordcheck.php", {
                        woord: $("#woord").val()
                    },
                    function(data, status) {
                        if (status == "success") {
                            $("#resultaten").html(data);
                        } else $("#resultaten").html("<b>connection failure</b>");
                    });
            });


        });
    </script>

</head>

<body>
    <p>Voer een woord in om te checken</p>
    <input type="text" id="woord">
    <button id="myButton">check!</button>
    <br><br>
    <div id="resultaten"></div>

</body>

</html>