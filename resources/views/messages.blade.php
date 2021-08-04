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

    <link rel="stylesheet" href="Messages.css">
</head>

<body>
    <div class="container-fluid" id="DataContainer" style="min-width: 460px;">
        <div class="row sticky-top">
            <nav class="navbar bg-primary navbar-dark navbar-expand col shadow-lg d-flex justify-content-center">
                <a class="navbar-brand position-absolute" href="/Profile/{{$NameOfUser}}" style="left: 20px;">
                    <img src="{{$image}}" title="Profile" class="rounded-circle" alt="Profile" style="width:40px;height:40px">
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
                        <a class="nav-link" href="/logout"><i class="fas fa-door-open fa-2x"></i></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div id="Left-Aside" class="col-3 px-0 d-flex">
                <div id="Contact-Names" class="d-flex flex-column w-100 align-self-center">
                    <span id="Contact-box-Heading" class="text-left pt-3 px-3 d-flex justify-content-between">
                        <div class="d-none d-lg-block">
                            Contacts
                        </div>
                        <div>
                            <!-- <a href="#">
                                <i class="fa fa-search"></i></a> -->
                        </div>
                    </span>

                    <div id="Contacts" class="w-75">
                        <ul class="list-group list-group-flush">

                        </ul>
                    </div>
                </div>
            </div>

            <div id="Center" class="col p-0 d-flex justify-content-center">
                <div id="Chat-Box" class="shadow-lg bg-white align-self-center">
                    <div id="ChatBoxBottom" class="p-2 shadow-lg bg-white sticky-top d-flex ">
                        <span class="w-100 d-flex">
                            <form action="" class="w-100">
                                <input type="text" id="typetext" autocomplete="off" onkeypress="send(event)" placeholder="Aa">
                            </form>
                        </span>

                        <!-- <a id="Attach-File" href="#" class="p-1">
                            <i class="fa fa-paperclip MessageIcon"></i>
                        </a> -->

                        <input type="hidden" id="sendmessageto">
                        <a id="Send-Message" href="#" onclick="Type_and_Sent();return false;" class="p-1 ">
                            <i class="far fa-paper-plane MessageIcon"></i>
                        </a>
                        <a id="BottomLink" href="#bottom"></a>
                    </div>

                    <div id="ChatContainer">
                        <div id="ChatBoxCenter" class="p-2 d-flex flex-column">
                            <div id="InitialProfilePicture" class="d-flex flex-column justify-content-center">
                                <img class="rounded-circle align-self-center mb-2" width="70px" height="70px" src="">
                                <p class=" align-self-center" style="font-weight: 600;">
                                </p>
                            </div>
                            <div id="Chat">
                                <ul id class="list-group list-group-flush">
                                </ul>
                            </div>
                            <a name="bottom"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // var username = sessionStorage.getItem("username");
        // var ProfileImg = sessionStorage.getItem("userImg");

        var username;
        var ProfileImg;

        //AJAX Query to get the username from sessions
        $.ajax({
            type: "GET",
            url: "/getinfo",
            success: function(data) {
                // alert(data['user']);
                // alert(data['image']);
                username = data['user'];
                ProfileImg = data['image'];
            },
            error: function(abc) {
                alert(abc.responseText);
            },
            async: false
        });

        $.ajax({
            type: "GET",
            url: "/messages/getFriends",
            success: function(data) {
                $.each(data, function(index, value) {

                    let searchFriend = value.Friend1;
                    if (searchFriend == username) {
                        searchFriend = value.Friend2;
                    }
                    $.ajax({
                        type: "GET",
                        url: "/getUserData/" + searchFriend,
                        success: function(data) {
                            let ProfileImg = data[0].ProfileIMG;
                            let ProfileName = data[0].Name;
                            let ProfileUsername = data[0].username;

                            CreateChatContact(ProfileImg, ProfileName, ProfileUsername);
                        },
                        error: function(abc) {
                            alert(abc.responseText);
                        }
                    });
                });
            },
            error: function(abc) {
                alert(abc.responseText);
            }
        });


        function ChatTrigger(abc) {
            ChatdeTrigger();


            let ChatBoxImg = $(abc).find("img").attr("src");
            let ChatBoxName = $(abc).find("span").text();
            let otheruser = $(abc).find("input").val();

            $("#ChatBoxTop span img").attr("src", ChatBoxImg);
            $("#ChatBoxTop span span").text(ChatBoxName);

            $("#InitialProfilePicture img").attr("src", ChatBoxImg);
            $("#InitialProfilePicture p").text(ChatBoxName);

            $.ajax({
                type: "POST",
                url: "/messages/getChat",
                data: {
                    _token: '{{ csrf_token() }}',
                    other: otheruser,
                },
                success: function(data) {
                    $.each(data, function(index, value) {

                        let sender = value.Sender;
                        if (sender == username) {
                            SentMessage(ProfileImg, value.message);
                        } else {
                            ReceivedMessage(ChatBoxImg, value.message);
                        }
                    });
                    $("#sendmessageto").val(otheruser);
                    document.getElementById("BottomLink").click();
                },
                error: function(abc) {
                    alert(abc.responseText);
                }
            });

            //Genereate The Messages that we get from the Database
            // ReceivedMessage(ChatBoxImg, "Test Received Message.");
            // for (let i = 0; i < 20; i++) {
            //     ReceivedMessage(ChatBoxImg, "Test Received Message.");
            //     SentMessage("Images/Profile Pic.jpeg", "Test Sent Message.")
            // }
            // SentMessage("Images/Profile Pic.jpeg", "Test Sent Message.")

            document.getElementById("Chat-Box").style.display = "block";
        }

        function ChatdeTrigger() {
            document.getElementById("Chat-Box").style.display = "none";
            $("#Chat ul").html("");
        }

        function Type_and_Sent() {
            let msg = $("#typetext").val();
            if (msg.length == 0) {
                alert("Empty Messages are not allowed!")
            } else {
                SentMessage(ProfileImg, msg);
                $("#typetext").val("");
                document.getElementById("BottomLink").click();

                // alert(username);
                // alert(msg);
                $.ajax({
                    type: "POST",
                    url: "/messages/sendMessage",
                    data: {
                        _token: '{{ csrf_token() }}',
                        other: $("#sendmessageto").val(),
                        MSG: msg,
                    },
                    error: function(abc) {
                        alert(abc.responseText);
                    }
                });
            }
        }

        function CreateChatContact(ContactImg, AddName, Profileusername) {
            $("#Contacts ul").append(`
            <li class="list-group-item p-0">
                <a href="#" onclick="ChatTrigger(this);return false;" class="text-decoration-none text-dark">
                    <div class="MessagePerson d-flex  py-2 px-3">
                        <input type="hidden" value="${Profileusername}">
                        <img class="rounded-circle Message-Person-DP" src="${ContactImg}">
                        <span class="Message-Person-Name d-none d-lg-block">${AddName}</span>
                    </div>
                </a>
            </li>
        `)
        }

        function ReceivedMessage(ReceivingPersonImg, ReceivingPerson_s_Message) {

            $("#Chat ul").append(`
            <li class="Received list-group-item pb-2 pt-0 pl-0">
                <div class="ReceivedImage">
                    <img class=" rounded-circle" src="${ReceivingPersonImg}">
                </div>
                <div class="p-2 ReceivedMessage">
                    ${ReceivingPerson_s_Message}
                </div>
            </li>
            `)
        }

        function SentMessage(SendingPersonImg, SendingPerson_s_Message) {
            $("#Chat ul").append(`
            <li class="Sent d-flex justify-content-end list-group-item text-right pb-2 pt-0 pr-0">
                <div class="p-2 SentMessage bg-primary text-white">
                    ${SendingPerson_s_Message}
                </div>
                <div class="SentImage">
                    <img class="rounded-circle" src="${SendingPersonImg}">
                </div>
            </li>
            `)
        }

        //To Send the Message when the enter key is pressed
        function send(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("Send-Message").click();
            }
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
    </script>

</body>

</html>