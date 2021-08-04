<div class="container-fluid" id="DataContainer" style="min-width: 460px;">
        <div class="row sticky-top">
            <nav class="navbar bg-primary navbar-dark navbar-expand col d-md-none shadow-lg d-flex justify-content-center">
                <a class="navbar-brand position-absolute" style="left: 20px;" href="#">
                    <img src="Images/Logo.png" alt="logo" style="width:40px;">
                </a>

                <ul class="navbar-nav d-flex justify-content-end ml-5 pl-5 w-100" id="TopNav">
                    <li class="nav-item">
                        <a class="nav-link" href="/Home"><i class="fa fa-home fa-2x"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/messages"><i class="fa fa-inbox fa-2x"></i></a>
                    </li>
                    <li class="nav-item dropdown dropleft">
                        <a class="nav-link dropdown" type="button" onclick="return false" data-toggle="dropdown" href="/">
                            <i class="far fa-bell fa-2x"></i>
                            <span class="badge badge-warning">{{$count}}<span>
                        </a>
                        <!-- Code for the FRIEND REQUESTS -->
                        <div class="dropdown-menu overflow-atuo bg-dark rounded" style="height:400px;width:400px">
                            @foreach($noti as $notificationdata)
                            <div style="height: it-content;" class="ml-5 mt-3 pt-2 d-flex w-75 border bg-white shadow-lg rounded">
                                <div>
                                    <img src="{{$notificationdata->ProfileIMG}}" style="width: 50px;height: 50px;" class="ml-2 rounded-circle">
                                </div>
                                <div class="ml-2 py-2 w-100">
                                    <a href="/Profile/{{$notificationdata->username}}" class="d-flex text-decoration-none d-flex justify-content-left">
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
                        <a class="nav-link" href="/"><i class="fas fa-door-open fa-2x"></i></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div id="Left-Navbar" class="col-3 d-none p-0 d-md-flex bg-dark border-right flex-column">
                <div class="card d-flex py-4">
                    <img src=" {{ $image }} " class="cardImg align-self-center rounded-circle">
                    <div class="card-body d-flex flex-column">
                        <h4 class="align-self-center text-white">{{ $Name }}</h4>
                        <a href="/Profile/{{$NameOfUser}}" type="button" class="btn btn-primary w-50 align-self-center"><i class="far text-white mr-3 fa-user"></i>Profile</a>
                    </div>
                </div>

                <span class="text-left pl-4 my-3" style="font-size: 24px;">Menu</span>

                <nav class="navbar p-0">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item LeftNav pl-5">
                            <a class="nav-link" id="Newsfeed" href="/Home">
                                <div class="d-inline-block mr-4"><i class="fa fa-home "></i>
                                </div><span class="text-white">Newsfeed</span>
                            </a>
                        </li>
                        <li class="nav-item LeftNav pl-5">
                            <a class="nav-link" href="/messages">
                                <div class="d-inline-block mr-4"><i class="fas fa-inbox"></i>
                                </div><span class="text-white">Messages</span>
                            </a>
                        </li>
                        <li class="nav-item LeftNav pl-5">
                            <a class="nav-link" href="/notifications">
                                <div class="d-inline-block mr-4"><i class="fas fa-bell"></i>
                                </div><span class="text-white">Notifications</span>
                                <span class="badge badge-warning">{{$count}}<span>
                            </a>
                        </li>
                        <li class="nav-item LeftNav pl-5">
                            <a class="nav-link" href="/location">
                                <div class="d-inline-block mr-4"><i class="fas fa-compass "></i>
                                </div><span class="text-white">Location</span>
                            </a>
                        </li>
                        <li class="nav-item LeftNav pl-5">
                            <a class="nav-link" href="/settings">
                                <div class="d-inline-block mr-4"><i class="fas fa-cog "></i>
                                </div><span class="text-white">Settings</span>
                            </a>
                        </li>
                        <li class="nav-item LeftNav pl-5">
                            <a class="nav-link" href="/">
                                <div class="d-inline-block mr-4"><i class="fas fa-door-open "></i>
                                </div><span class="text-white">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            @yield('content')
        </div>
    </div>

    <script>
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
    </script>

    <!-- <script>
        var username = sessionStorage.getItem("username");

        $(document).ready(function() {

            ProfileTop();
        });

        function ProfileTop() {
            $.ajax({
                type: "GET",
                url: "/getUserData/" + username,
                success: function(data) {
                    // let ProfileImg = data[0].ProfileIMG;
                    // let ProfileName = data[0].Name;
                    // sessionStorage.setItem("userImg", data[0].ProfileIMG);
                    // sessionStorage.setItem("NameOfUser", ProfileName);

                    $("#Left-Navbar").prepend(
                        `
                `)
                },
                error: function(abc) {
                    alert(abc.responseText);
                }
            });
        }
    </script> -->