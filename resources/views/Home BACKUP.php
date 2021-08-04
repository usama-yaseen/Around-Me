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

    <link rel="stylesheet" href="StyleSheet.css">
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
        <div class="w-100 text-center">
            <form class="w-100 d-flex justify-content-center" id="SearchForm">
                <input id="searchField" class="form-control rounded-pill" type="text" placeholder="Search Users">
                <span id="searchFieldLogo" class="btn p-0 rounded-circle">
                    <i class="fas fa-search text-secondary" onclick='alert("Clicked");' style="font-size:24px;">
                    </i>
                </span>
            </form>
        </div>
    </nav>

    <div id="NewsFeed">
        <div id="Center-Newsfeed">
            <div id="CreatePost" class="bg-white d-flex justify-content-center p-3">
                <img class="rounded-circle Message-Person-DP" id="createpostimage" src="">
                <div data-toggle="modal" data-target="#CreatePostModal" class="rounded-pill btn w-100 border d-inline-block ml-2 p-3">What's on your mind, Person?
                </div>
            </div>

            <!-- Create Post -->
            <div class="modal fullscreen fade" data-keyboard="false" data-backdrop="static" id="CreatePostModal" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Create post</h4>
                            <span>
                                <a href="#" class="close bg-secondary rounded-circle mt-0 mr-0 p-1" data-dismiss="modal">
                                    <svg width="26px" height="26px" viewBox="-4 -4 24 24">
                                        <line x1="2" x2="14" y1="2" y2="14" stroke-linecap="round" stroke-width="2" stroke="#bec2c9"></line>
                                        <line x1="2" x2="14" y1="14" y2="2" stroke-linecap="round" stroke-width="2" stroke="#bec2c9"></line>
                                    </svg></a>
                            </span>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" id="CreatePostDialogueBox">
                            <img class="rounded-circle Message-Person-DP" id="modalimage" src="">
                            <span id="modalname"></span>
                            <form action="/Home/addPost" method="post" enctype="multipart/form-data" class="w-100" id="CreatePostForm">
                                @csrf
                                <div id="CreatPostData">
                                    <textarea id="CreatePostTextArea" name="CreatePostTextArea" class="mt-3 border w-100" style="resize:none;" rows="5" placeholder="What's on your mind, Person?"></textarea>
                                </div>
                                <img id="previewImg" class="w-75 mb-2">
                                <input type="hidden" name="username" id="username">
                                <input type="hidden" name="nameofuser" id="nameofuser">
                                <div id="Add-Item" class="rounded bg-white w-75 p-3">
                                    <label class="m-0" for="file-input">
                                        <i id="ImgUploadIcon" class="fas fa-images fa-2x btn m-auto p-0">Add
                                            Image/Video</i>
                                    </label>
                                    <input id="file-input" onchange="openFile(event)" type="file" name="pictoupload" class="d-none" accept="image/*">
                                </div>
                            </form>
                            <button onclick='callPost()' class="btn btn-primary rounded-pill w-100">Post</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- To Show The Image On Click -->
            <div class="modal fade" id="View-Img-Modal" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content " style="width: 100%; background-color: rgba(0, 0, 0, 0);">
                        <div class="modal-body p-0 m-0">
                            <!-- <img src="TO BE SETTTTTTTTTTTTTTTTTTTTTTTTT" width="100%" height="auto"> -->
                            <img src="Images/TestPost2.jpg" width="100%" height="auto">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="Right-Aside" class="d-none border-left px-3 d-xl-block">

    <div id="Adds" class="d-flex flex-column">
        <span id="Sponsored" class="text-center">Sponsored</span>
    </div>

    <div id="Messages" class="d-flex flex-column">
        <span id="Contacts" class="text-left pt-3 px-3 border-top d-flex justify-content-between ">
            <div>
                Contacts
            </div>
            <div>
                <a href="#">
                    <i class="fa fa-search"></i></a>
            </div>
        </span>

        <div id="Message-Box">
            <ul class="list-group list-group-flush">
            </ul>
        </div>
    </div>

    <div id="Chat-Box" class="shadow-lg bg-white">
        <div id="ChatBoxTop" class="py-2 pl-2 shadow-lg d-flex justify-content-between">
            <span>
                <img class="rounded-circle Message-Person-DP" src="Images/Profile Pic.jpeg ">
                <span class="Message-Person-Name">Dummy Text</span>
            </span>
            <span id="Chat-Right-Side" class="px-3">
                <a href="Javascript:ChatdeTrigger()">
                    <svg width="26px" height="26px" viewBox="-4 -4 24 24">
                        <line x1="2" x2="14" y1="2" y2="14" stroke-linecap="round" stroke-width="2" stroke="#bec2c9"></line>
                        <line x1="2" x2="14" y1="14" y2="2" stroke-linecap="round" stroke-width="2" stroke="#bec2c9"></line>
                    </svg></a>
            </span>
        </div>
        <input type="hidden" id="sendmessageto">
        <div id="ChatBoxCenter" class="p-2 d-flex flex-column overflow-auto">

            <div id="InitialProfilePicture" class="d-flex flex-column justify-content-center">
                <img class="rounded-circle align-self-center mb-2" width="70px" height="70px" src="">
                <p class=" align-self-center" style="font-weight: 600;"></p>
            </div>
            <div id="Chat">
                <ul class="list-group list-group-flush">
                </ul>
            </div>
            <a name="bottom"></a>
        </div>
        <div id="ChatBoxBottom" class="p-2 shadow-lg d-flex position-absolute fixed-bottom ">
            <span>
                <form action="">
                    <input type="text" id="typetext" onkeypress="send(event)" placeholder="Aa">
                </form>
            </span>

            <!-- <a id="Attach-File" href="#" class="p-1">
                            <i class="fa fa-paperclip MessageIcon"></i>
                        </a> -->
            <a id="Send-Message" href="#" onclick="Type_and_Sent();return false;" class="p-1 ">
                <i class="far fa-paper-plane MessageIcon"></i>
            </a>
            <a id="BottomLink" href="#bottom"></a>
        </div>
    </div>
</div>
<script>
    var username = sessionStorage.getItem("username");
    var ProfileImg = sessionStorage.getItem("userImg");

    $(document).ready(function() {

        $.ajax({
            type: "GET",
            url: "/messages/getFriends/" + username,
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

        // for (let i = 0; i < 20; i++) {
        //     CreateChatContact("Images/Profile Pic.jpeg", "Usama Yaseen");
        //     CreateChatContact("Images/ProfilePic2.jpg", "Aryan khan");
        // }
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
                current: username,
                other: otheruser,
            },
            success: function(data) {
                $.each(data, function(index, value) {

                    let sender = value.Sender;
                    if (sender == username) {
                        SentMessage(sessionStorage.getItem("userImg"), value.message);
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
            // alert($("#sendmessageto").val());
            // alert(msg);
            $.ajax({
                type: "POST",
                url: "/messages/sendMessage",
                data: {
                    _token: '{{ csrf_token() }}',
                    current: username,
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
        $("#Message-Box ul").append(`
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

    // function ReceivedIMG(ReceivingPersonImg, ReceivedImg) {
    //     $("#Chat ul").append(`
    //     <li class="Received list-group-item pb-2 pt-0 pl-0">
    //         <div class="ReceivedImage">
    //             <img class=" rounded-circle" src="${ReceivingPersonImg}">
    //         </div>
    //         <div class="p-2 ReceivedMessage">
    //             <img src="${ReceivedImg}" class="w-100 p-1">
    //         </div>
    //     </li>
    //     `)
    // }

    // function SentIMG(SendingPersonImg, SentImg) {
    //     $("#Chat ul").append(`
    //     <li class="Sent d-flex justify-content-end list-group-item text-right pb-2 pt-0 pr-0">
    //         <div class="p-2 SentMessage bg-primary text-white">
    //             <img src="${SentImg}" class="w-100 p-1">
    //         </div>
    //         <div class="SentImage">
    //             <img class="rounded-circle" src="${SendingPersonImg}">
    //         </div>
    //     </li>
    //     `)
    // }

    function send(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("Send-Message").click();
        }
    }
</script>

<script>
    var username = sessionStorage.getItem("username");
    var ProfileImg = sessionStorage.getItem("userImg");
    var NameOfUser = sessionStorage.getItem("NameOfUser");

    $("#modalimage").attr("src", ProfileImg);
    $("#createpostimage").attr("src", ProfileImg);
    $("#modalname").text(NameOfUser);
    $(document).ready(function() {

        $.ajax({
            type: "GET",
            url: "/Home/getPost/" + username,
            success: function(data) {
                if (data == 'NONE') {
                    $("#CreatePost").after(`<h1 class="text-center mt-5 text-secondary">No Posts Yet</h1>`);
                } else {

                    $.each(data, function(index, value) {

                        let poster = value.username;
                        let postimage = value.ImgRef;
                        let posttext = value.Text;
                        let postDate = value.Date;

                        $.ajax({
                            type: "GET",
                            url: "/getUserData/" + poster,
                            success: function(data) {
                                let ProfileImg = data[0].ProfileIMG;
                                let ProfileName = data[0].Name;
                                post(ProfileImg, ProfileName, postDate, posttext, postimage, 20);
                            },
                            error: function(abc) {
                                alert(abc.responseText);
                            }
                        });
                    });
                }
            },
            error: function(abc) {
                alert(abc.responseText);
            }
        });

        for (let i = 0; i < 2; i++) {
            CreateAdd("Images/Add1.jpg", "Iphone 12 Ultra Max Whatever Pro", "Lorem ipsum voluptas neque eius");
        }
    });

    $("#CreatePostForm").validate({
        rules: {
            CreatePostTextArea: {
                required: true,
            }
        },
        messages: {
            CreatePostTextArea: {
                required: "Please write something.",
            }
        }
    });

    function postclick(clickedsrc) {
        let imgclicked = $(clickedsrc).find("img").attr("src");
        $("#View-Img-Modal").find("img").attr("src", imgclicked);
        $("#View-Img-Modal").modal('show');

    }

    var openFile = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('previewImg');
            output.src = dataURL;

        };

        const file = document.querySelector('#file-input').files[0];
        reader.readAsDataURL(file);
    };

    function callPost() {
        if ($("#CreatePostForm").valid()) {

            $("#username").val(username);

            $("#CreatePostForm").submit();

            let x = new Date();
            let PostDate = new Date().toJSON().slice(0, 10);
            let PostContent = $('#CreatePostTextArea').val();
            let PostImg = $('#previewImg').attr("src");



            post(PostUserImg, NameOfUser, PostDate, PostContent, PostImg, 0);

            $('#CreatePostTextArea').val("");
            $('#previewImg').attr("src", "");
            $('#CreatePostModal').modal('hide');

            post(PostUserImg, NameOfUser, PostDate, PostContent, PostImg, 0);

            $('#CreatePostTextArea').val("");
            $('#previewImg').attr("src", "");
            $('#CreatePostModal').modal('hide');
        }

    }

    function post(PostUserImg, PostName, PostDate, PostContent, PostImg, nLikes) {
        $("#CreatePost").after(`
            <div class="Post shadow-lg pb-3 my-4 border bg-white rounded">
                <div class="PostTop d-flex justify-content-between">
                    <div class="d-inline-flex p-2">
                        <img class="rounded-circle Post-Top-Img" src="${PostUserImg}">
                        <div class="Post-User-Name mt-2 ml-1">
                            ${PostName}
                        </div>
                    </div>
                    <span>
                        <div class="Post-Data m-2 p-2">
                            ${PostDate}
                        </div>
                    </span>
                </div>

                <div class="PostContentText mb-1 mx-3" style="word-wrap: break-word;">
                    ${PostContent}
                </div>

                <a href="#" onclick="postclick(this);return false;"; class="ModalLink";">
                    <div class="PostContentMedia p-0 m-0">
                        <img src="${PostImg}" width="458px">
                    </div>
                </a>


                <div class="PostReactions m-2 py-3 border-bottom d-flex justify-content-between">
                    <div class="Likes-CommentIcon">
                        <a href="#"><i class="far fa-thumbs-up fa-2x"></i></a>
                        <a href="#"><i class="far fa-comments fa-2x"></i></a>
                    </div>
                    <div class="Likes-CommentCount">
                        <span class="mr-1">${nLikes}</span>Like/s
                        <span>1 </span>Comment
                    </div>
                </div>

                <div class="PostComment d-flex justify-content-center align-content-center">
                    <img class="rounded-circle mt-1 mr-2" width="36px" height="36px" src="Images/Profile Pic.jpeg">
                    <input type="text" class="p-2 w-75 border rounded-pill" placeholder="Write a comment">
                    <i class="far fa-share-square fa-2x ml-2 pt-1"></i>
                </div>
            </div>

            `)
    }


    function CreateAdd(AddImg, AddHeading, AddText) {
        $("#Adds").append(`
            <a href="#" class="text-decoration-none">
                <div class="d-flex my-3 Add p-2 rounded">
                    <img src="${AddImg}" style="width:110px;height: 110px;border-radius: 10px;">
                    <span id="Add-Right-Side" class="d-flex flex-column justify-content-end ml-2">
                                    <span>${AddHeading}</span>
                    <p>
                        ${AddText}
                    </p>
                    </span>
                </div>
            </a>
            `)
    }
</script>
@stop