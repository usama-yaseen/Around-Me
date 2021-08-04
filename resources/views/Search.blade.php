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

    <link rel="stylesheet" href="/search.css">
    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

@section('content')
<div id="Center" class="col p-0">
    <nav class="navbar navbar-expand text-center navbar-dark">
        <img src="Images/Logo.png" width="50px" alt="Logo Top">
        <div class="w-100 text-center position-relative">
            <form class="w-100 d-flex justify-content-center" id="SearchForm">
                <input id="searchField" autocomplete="off" class="form-control rounded-pill" type="text" placeholder="Search Users">
                <span id="searchFieldLogo" class="btn p-0 rounded-circle">
                    <i class="fas fa-search text-secondary" onclick='search()' style="font-size:24px;">
                    </i>
                </span>
            </form>
        </div>
    </nav>

    <hr class="w-75" style="color: grey;">
    <div id="SearchResults" class="border-top w-100">
    </div>

</div>

<script>
    function search() {
        $.ajax({
            type: "GET",
            url: "/searchbyname/" + $("#searchField").val(),
            success: function(data) {
                $("#SearchResults").html("");

                if (data != "None") {
                    $.each(data, function(index, value) {
                        $.ajax({
                            type: "GET",
                            url: "/getFriendReq/" + value.username,
                            success: function(reqstatus) {
                                if (reqstatus == "Not Found.") {
                                    SearchResult(value.ProfileIMG, value.username, value.Name, "primary", "user-plus", "Add Friend");
                                } else {
                                    if (reqstatus[0].RequestStatus == 'Accepted') {
                                        SearchResult(value.ProfileIMG, value.username, value.Name, "success", "user", "Friends");
                                    } else {
                                        SearchResult(value.ProfileIMG, value.username, value.Name, "warning", "user", "Pending");
                                    }
                                }
                            },
                            error: function(ab) {
                                alert(ab.responseText);
                            },
                        });
                    });
                } else {
                    $("#SearchResults").append('<h1 class="text-secondary m-5">No Match</h1>');
                }
            },
            error: function(abc) {
                alert(abc.responseText);
            },
        });
    }

    function SearchResult(img, user, name, color, icon, text) {
        $("#SearchResults").append(
            `
            <div class="ml-3 mt-3 d-flex w-50 border bg-white shadow-lg rounded-pill">
                <div>
                    <img src="${img}" class="cardImg rounded-circle">
                </div>
                <div class="ml-2 mr-5 py-2 w-100">
                    <a href="/Profile/${user}" class="d-flex d-flex justify-content-left">
                        <h4 class="h-25">${name}</h4>
                    </a>
                    <input type="hidden" value=${user}>
                    <button type="button" onclick="friendreq(this)" class="btn btn-${color}"><i class="fa fa-${icon} text-white mr-3 "></i>${text}</button>
                </div>
            </div>
            `);
    }

    function friendreq(ButtonClicked) {
        let val = $(ButtonClicked).prev().val();
        if ($(ButtonClicked).text() == "Add Friend") {
            $.ajax({
                type: "POST",
                url: "/sendrequest",
                data: {
                    _token: '{{ csrf_token() }}',
                    sendreq: val,
                },
                success: function(data) {
                    $(ButtonClicked).removeClass('btn-primary').addClass('btn-warning');
                    $(ButtonClicked).html('<i class="fa fa-user text-white mr-3 "></i>Pending');
                },
                error: function(abc) {
                    alert(abc.responseText);
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "/cancelfriendorfriendreq",
                data: {
                    _token: '{{ csrf_token() }}',
                    req: val,
                },
                success: function(data) {
                    $(ButtonClicked).removeClass('btn-success btn-warning').addClass('btn-primary');
                    $(ButtonClicked).html('<i class="fa fa-user-plus text-white mr-3 "></i>Add Friend');
                },
                error: function(abc) {
                    alert(abc.responseText);
                }
            });
        }
    }
</script>

@stop