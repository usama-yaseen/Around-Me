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

    <link rel="stylesheet" href="/Profile.css">
</head>

<body>
    <span id="TOP" class="bg-primary fixed-bottom rounded ml-3 py-2 px-4" style="width: fit-content;">
        <a href="#">
            <i class="fas fa-angle-double-up fa-2x NavIcons"></i>
        </a>
    </span>
    <span id="Videos" class="bg-primary rounded py-2 px-3" style="width: fit-content;">
        <a href="#ProfileVideos">
            <i class="fas fa-video fa-2x NavIcons"></i>
        </a>
    </span>
    <div class="container-fluid" id="DataContainer" style="min-width: 460px;">
        <div class="row sticky-top">
            <nav class="navbar bg-primary navbar-dark navbar-expand col shadow-lg d-flex justify-content-center">
                <a class="navbar-brand position-absolute" href="/Profile/{{$user}}" style="left: 20px;">
                    <img src="/{{$ownimg}}" title="Profile" class="rounded-circle" alt="Profile" style="width:40px;height:40px">
                </a>

                <ul class="navbar-nav d-flex justify-content-end ml-5 pl-5 w-100" id="TopNav">
                    <li class="nav-item">
                        <a class="nav-link" title="Search" href="/search"><i class="fa fa-search fa-2x"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" title="Home" href="/Home"><i class="fa fa-home fa-2x"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" title="Messenger" href="/messages"><i class="fa fa-envelope fa-2x"></i></a>
                    </li>
                    <li class="nav-item dropdown dropleft">
                        <a class="nav-link dropdown" title="Notifications" type="button" onclick="return false" data-toggle="dropdown" href="/">
                            <i class="far fa-bell fa-2x"></i>
                            <span class="badge badge-warning">{{$count}}<span>
                        </a>
                        <!-- Code for the FRIEND REQUESTS -->
                        <div class="dropdown-menu overflow-atuo bg-white rounded" style="height:400px;width:400px">
                            @foreach($noti as $notificationdata)
                            <div style="height: fit-content;" class="ml-5 mt-3 pt-2 d-flex w-75 border bg-white shadow-lg rounded">
                                <div>
                                    <img src="/{{$notificationdata->ProfileIMG}}" style="width: 50px;height: 50px;" class="ml-2 rounded-circle">
                                </div>
                                <div class="ml-2 py-2 w-100">
                                    <a href="/Profile/{{$notificationdata->username}}" class="d-flex text-dark d-flex justify-content-left">
                                        <h4 class="h-25">{{$notificationdata->Name}}</h4>
                                    </a>
                                    <button type="button" onclick="notiresponse(this)" class="btn btn-success"><i class="fa fa-user-plus text-white mr-3 "></i>Accept</button>
                                    <input type="hidden" value="{{$notificationdata->username}}">
                                    <button type="button" onclick="notiresponse(this)" class="btn btn-danger"><i class="fa fa-times text-white mr-3 "></i>Cancel</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/location"><i class="fas fa-compass fa-2x"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/settings"><i class="fas fa-cog fa-2x"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><i class="fas fa-door-open fa-2x"></i></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div id="ProfileInfo" class="col-12 d-lg-none px-0 pb-5 mb-3 border-bottom flex-column">
                <div class="card d-flex pt-3">
                    <img src="/{{ $image }}" class="cardImg align-self-center rounded-circle">
                    <div class="card-body d-flex flex-column">
                        <h4 class="align-self-center"> {{ $Name }} </h4>
                    </div>
                </div>

                <div id="ProfileDescription" class="bg-white mx-4 p-4">
                    {{ $bio }}
                </div>
            </div>

            <div id="ProfileInfo" style="top:15vh" class="col-lg-5 d-none d-lg-block sticky-top col-12 px-0 pb-5 mb-3 border-bottom flex-column">
                <div class="card d-flex pt-3">
                    <img src="/{{ $image }}" class="cardImg align-self-center rounded-circle">
                    <div class="card-body d-flex flex-column">
                        <h4 class="align-self-center"> {{ $Name }} </h4>
                    </div>
                </div>

                <div id="ProfileDescription" class="bg-white mx-4 p-4">
                    {{ $bio }}
                </div>
            </div>

            <div id="ProfileData" class="col px-3 mt-5 mt-lg-3">
                <div>
                    <h2 class="text-center">
                        Images/Photos
                    </h2>
                    <div id="ShowProfileImage" class="d-flex justify-content-center flex-wrap">
                        @if (count($Images) > 0)
                        @foreach($Images as $Img)
                        <a href="#" class="ImgDiv ModalLink" onclick="openimg(this);return false;">
                            <div class="m-auto">
                                <img src="/{{$Img->ImgRef}}" width="100%">
                            </div>
                        </a>
                        @endforeach
                        @else
                        <h3 class="text-secondary text-center">NO IMAGES/Photos FOUND</h3>
                        @endif
                    </div>
                </div>
                <!-- To Show The Image On Click -->
                <div class="modal fade" id="View-Img-Modal" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.8);">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content " style="width: 100%; background-color: rgba(0, 0, 0, 0);">
                            <div class="modal-body p-0 m-0">
                                <img src="TO BE SETTTTTTTTTTTTTTTTTTTTTTTTT" width="100%" height="auto">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3" id="ProfileVideos">
                    <h2 class="text-center">
                        Videos
                    </h2>
                    <div id="ShowProfileVideos" class="d-flex flex-wrap">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Script>
        for (let i = 0; i < 2; i++) {
            ShowVids("Videos/Mercedes Glk - 1406.mp4");
            ShowVids("Videos/Test Tubes - 5451.mp4");
            ShowVids("Videos/Laboratory - 76396.mp4");
            ShowVids("Videos/Science - 5453.mp4");
        }

        function openimg(clickedimg) {
            let imgclicked = $(clickedimg).find("img").attr("src");
            $("#View-Img-Modal").find("img").attr("src", imgclicked);
            $("#View-Img-Modal").modal("show");
        }

        function ShowVids(Vids) {
            $("#ShowProfileVideos").append(`
            <div class="VidDiv shadow-lg">
                <video width="100%" controls>
                    <source src="/${Vids}">
                </video>
            </div>
            `)
        }

        function notiresponse(ButtonClicked) {
            var val = "";
            var URL = "";
            if ($(ButtonClicked).text() == "Accept") {
                val = $(ButtonClicked).next().val();
                URL = "/acceptreq";
            } else {
                val = $(ButtonClicked).prev().val();
                URL = "/cancelfriendorfriendreq";
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
    </Script>

</body>

</html>