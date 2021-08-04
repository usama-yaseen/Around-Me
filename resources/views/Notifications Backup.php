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

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <!-- Un Commenting this will result in image click modal not showing -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="/Notifications.css">
    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

@section('content')
<div id="Center" class="col p-0 ">
        @foreach($noti as $notificationdata)
        <div style="height: fit-content;" class="ml-5 my-3 d-flex w-75 border bg-white shadow-lg rounded-pill">
            <div>
                <img src="{{$notificationdata->ProfileIMG}}" style="width: 100px;height: 100px;" class="ml-5 rounded-circle">
            </div>
            <div class="ml-2 py-2 w-100">
                <a href="/Profile/{{$notificationdata->username}}" class="d-flex d-flex justify-content-left">
                    <h4 class="h-25">{{$notificationdata->Name}}</h4>
                </a>
                <button type="button" onclick="response(this)" class="btn btn-success"><i class="fa fa-user-plus text-white mr-3 "></i>Accept</button>
                <input type="hidden" value="{{$notificationdata->username}}">
                <button type="button" onclick="response(this)" class="btn btn-danger"><i class="fa fa-times text-white mr-3 "></i>Cancel</button>
            </div>
        </div>
        @endforeach
</div>

<script>

    function response(ButtonClicked) {
        var val="";
        var URL="";
        if($(ButtonClicked).text()=="Accept"){
             val= $(ButtonClicked).next().val();
             URL="/acceptreq";
        }
        else{
            val= $(ButtonClicked).prev().val();
            URL="/cancelfriendorfriendreq";
        }
        $.ajax({
            type: "POST",
            url: URL,
            data: {
                _token: '{{ csrf_token() }}',
                req: val,
            },
            success: function(data) {
                location.reload();
            },
            error: function(abc) {
                alert(abc.responseText);
            }
        });

    }
</script>

@stop