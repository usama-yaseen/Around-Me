@extends('Layout.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Around Me</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/2663848d2d.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="Location.css">
</head>

<body onload="getLocation()">
    @section('content')
    <div id="Center" class="col p-0 m-0">
        <div id="Location">
            <iframe id="Map" src="" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#Message-Box ul li a").click(ChatTrigger);
        });

        function ChatTrigger() {
            document.getElementById("Chat-Box").style.display = "block";
        }

        function ChatdeTrigger() {
            document.getElementById("Chat-Box").style.display = "none";
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                l.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {

            var latlon = position.coords.latitude + "," + position.coords.longitude;
            document.getElementById("Location").style.display = "block";

            document.getElementById("Map").src = "https://maps.google.com/maps?q=" + latlon + "&z=15&output=embed";
        }
    </script>
    @stop
</body>

</html>