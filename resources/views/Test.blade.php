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

    <link rel="stylesheet" href="StyleSheet.css">
</head>


@section('content')
<div id="Center" class="col p-0">
    <nav class="navbar navbar-expand bg-white text-center navbar-dark">
        <img src="Images/Logo.png" width="50px" alt="Logo Top">
        <form class="form-inline">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">person</span>
                </div>
                <input type="text" class="form-control" placeholder="Username">
            </div>
        </form>
    </nav>

    <div id="NewsFeed">
        <div id="Center-Newsfeed">
            <div id="CreatePost" class="bg-white d-flex justify-content-center p-3">
                <img class="rounded-circle Message-Person-DP" src="Images/Profile Pic.jpeg">
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
                            <img class="rounded-circle Message-Person-DP" src="Images/Profile Pic.jpeg">
                            <span>Person 1</span>
                            <div id="CreatPostData">
                                <form action="/action_page.php">
                                    <textarea id="CreatePostTextArea" class="mt-3 border w-100" style="resize:none;" rows="5" placeholder="What's on your mind, Person?"></textarea>
                                </form>
                            </div>
                            <img id="previewImg" class="w-75 mb-2">
                            <div class="w-50" style="border: 2px solid red;">
                                <video width="100%" controls>
                                    <source>
                                </video>
                            </div>

                            <div id="Add-Item" class="rounded bg-white w-75 p-3">
                                <label class="m-0" for="file-input">
                                    <i id="ImgUploadIcon" class="fas fa-images fa-2x btn m-auto p-0">Add
                                        Image/Video</i>
                                </label>
                                <input id="file-input" onchange="openFile(event)" class="d-none" type="file" accept="image/*">
                            </div>

                            <button onclick="callPost()" class="btn btn-primary rounded-pill w-100">Post</button>
                        </div>
                    </div>
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
                <span class="Message-Person-Name">Person 1</span>
            </span>
            <span id="Chat-Right-Side" class="px-3">
                <a href="Javascript:ChatdeTrigger()">
                    <svg width="26px" height="26px" viewBox="-4 -4 24 24">
                        <line x1="2" x2="14" y1="2" y2="14" stroke-linecap="round" stroke-width="2" stroke="#bec2c9"></line>
                        <line x1="2" x2="14" y1="14" y2="2" stroke-linecap="round" stroke-width="2" stroke="#bec2c9"></line>
                    </svg></a>
            </span>
        </div>

        <div id="ChatBoxCenter" class="p-2 d-flex flex-column overflow-auto">

            <div id="InitialProfilePicture" class="d-flex flex-column justify-content-center">
                <img class="rounded-circle align-self-center mb-2" width="70px" src="">
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
                    <input type="text" placeholder="Aa ">
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
        function ChatTrigger(abc) {
            ChatdeTrigger();

            document.getElementById("BottomLink").click();

            let ChatBoxImg = $(abc).find("img").attr("src");
            let ChatBoxName = $(abc).find("span").text();

            $("#ChatBoxTop span img").attr("src", ChatBoxImg);
            $("#ChatBoxTop span span").text(ChatBoxName);

            $("#InitialProfilePicture img").attr("src", ChatBoxImg);
            $("#InitialProfilePicture p").text(ChatBoxName);


            //Genereate The Messages that we get from the Database
            ReceivedMessage(ChatBoxImg, "Test Received Message.");
            for (let i = 0; i < 20; i++) {
                ReceivedMessage(ChatBoxImg, "Test Received Message.");
                SentMessage("Images/Profile Pic.jpeg", "Test Sent Message.")
            }
            SentMessage("Images/Profile Pic.jpeg", "Test Sent Message.")

            document.getElementById("Chat-Box").style.display = "block";
        }

        function ChatdeTrigger() {
            document.getElementById("Chat-Box").style.display = "none";
            $("#Chat ul").html("");
        }

        function Type_and_Sent() {
            SentMessage("Images/Profile Pic.jpeg", $("#ChatBoxBottom input").val());
            $("#ChatBoxBottom input").val("");
            document.getElementById("BottomLink").click();
        }
    </script>

    <script>

        $(document).ready(function() {


            for (let i = 0; i < 5; i++) {
                post("Aryan Khan", "09-Jun-2021", "#Pre", "Images/TestPost.JPG", 20);
                post("Aryan Khan", "09-Jun-2021", "#Pre-Finals Scnes are these onessssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss Scenes",
                    "Images/TestPost2.JPG", 20);
            }

            for (let i = 0; i < 2; i++) {
                CreateAdd("Images/Add1.jpg", "Add 1 Heading", "Add 1 text Lorem ipsum voluptas neque eius");
            }
            for (let i = 0; i < 5; i++) {
                CreateChatContact("Images/Profile Pic.jpeg", "Usama Yaseen");
                CreateChatContact("Images/ProfilePic2.jpg", "Aryan khan");
            }


            $(".ModalLink").click(function(event) {
                alert("Clicked.")
                var imgclicked = event.target;
                $("#View-Img-Modal").find("img").attr("src", imgclicked.src);
                $("#View-Img-Modal").modal("show");

            });
        });



        var openFile = function(event) {
            var input = event.target;

            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('previewImg');
                output.src = dataURL;

                document.getElementById("file-input").disabled = "true";
            };

            const file = document.querySelector('#file-input').files[0];
            reader.readAsDataURL(file);
        };

        function callPost() {
            let PostName = $('#ProfileOwner').text();
            //Get the current Date using JS
            let PostDate = "22-Jun-2021";
            let PostContent = $('#CreatePostTextArea').val();
            let PostImg = $('#previewImg').attr("src");

            post(PostName, PostDate, PostContent, PostImg, 0);
            document.getElementById("file-input").disabled = "false";
            $('#CreatePostTextArea').val("");
            $('#previewImg').attr("src", "");
            $('#CreatePostModal').modal('hide');
        }

        function post(PostName, PostDate, PostContent, PostImg, nLikes) {
            $("#CreatePost").after(`
            <div class="Post shadow-lg pb-3 my-4 border bg-white rounded">
                <div class="PostTop d-flex justify-content-between">
                    <div class="d-inline-flex p-2">
                        <img class="rounded-circle Post-Top-Img" src="Images/Profile Pic.jpeg">
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

                <a href="#" class="ModalLink" onclick="return false;">
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

        function CreateChatContact(ContactImg, AddName) {
            $("#Message-Box ul").append(`
            <li class="list-group-item p-0">
                <a href="#" onclick="ChatTrigger(this);return false;" class="text-decoration-none text-dark">
                    <div class="MessagePerson d-flex  py-2 px-3">
                        <img class="rounded-circle Message-Person-DP" src="${ContactImg}">
                        <span class="Message-Person-Name">${AddName}</span>
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
    </script>
    @stop
