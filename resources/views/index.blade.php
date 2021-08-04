<!DOCTYPE html>
<html lang="en">

<head>
    <title>Around Me</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.ntawesome.com/2663848d2d.js" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="Login.css">

    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>


    <!-- <input type="password" name="password" id="AjaxTestInput" placeholder="Enter password">
    <button id="AjaxPostTest" onclick="postdata()">Ajax Post</button>
    <button id="AjaxTestButton" onclick="loadData()">Ajax Test</button>
    <p id="AjaxTest">
    </p> -->

    <div class="container-fluid pl-0" id="Center">
        <div class="row d-flex">
            <div id="Left" class="col-lg-7 p-0 d-flex  align-content-stretch justify-content-center">
                <img src="./Images/Logo.png" class="align-self-center">
            </div>

            <div id="Right" class="col-lg-5 d-flex flex-column justify-content-center align-items-center">

                <img src="./Images/Logo.png " style="width:50px;height:50px">
                <h1>
                    Know about everything around you
                </h1>
                <h2>
                    <a href="/signup">Sign Up</a>
                </h2>

                <div id="FormElements">
                    <form id="registration">
                        <input type="email" class="LoginInputs" name="email" placeholder="User Name" id="usr">
                        <input type="password" class="LoginInputs" name="password" placeholder="Password " id="pwd">
                        <div style="text-align: center;">
                            <a class="nav-link d-inline ml-2 mr-4" href="/forgot">Forgot Password</a>

                            <button type="button" onclick="authenticate()" class="btn btn-primary ml-5">Login<a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="row bg-dark d-flex my-0 ml-0 justify-content-center">
        <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Help Center</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Terms of Service</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Privacy Policy</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Cookie Policy</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Ads info</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Blog</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Status</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Careers</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Brand Resources</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Advertising</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Marketing</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Around Me for Business</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Developers</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Directory</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">Settings</a>
        <a class="py-0 px-2 h-25 text-light " href=" # ">© 2021 Around Me, Inc.</a>
    </footer>
    <!-- <img id="previewImg" class="w-75 d-block mb-2"> -->

    <!-- <form action="/imgtest" method="POST" enctype="multipart/form-data">
        <input type="text" value="Hello">
        <input type="file" name="pics" maxlength="30" size="30">
        <input type="submit" value="Submit">
    </form> -->
    <!-- <input type="file" id="HelloWorld" onchange="abc()" name="pic">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> -->
    <script>
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // function abc() {
        //     alert("here");
        //     var formData = new FormData();
        //     alert("here");
        //     var media = document.getElementById('HelloWorld');
        //     formData.append('pic', media.files[0]);
        //     alert(media.files[0].name);
        //     jQuery.ajax({
        //         url: '/imgtest',
        //         type: "POST",
        //         data: {
        //             "_token": $('#token').val(),
        //             forma: formData,
        //         },
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(data) {
        //             alert('Success');
        //         },
        //         error: function(xhr) {
        //             alert('Sorry.');
        //             alert(xhr.responseText);
        //         }
        //     });
        // }
    </script>
    <!-- <input id="file-reterieve" onclick="returnimg()" type="button" value="Read">
 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function show() {
            // var file = $('#file-input')[0].files[0];

            // formData.append("name", "hellowordl");
            // $.ajax({
            //     type: "POST",
            //     enctype: 'multipart/form-data',
            //     url: "/imgtest",
            //     data: formData,
            //     processData: false,
            //     contentType: false,
            //     success: function(data) {
            //         alert("here")
            //         alert(data);
            //     }
            // });
        }
    </script>

    <script>
        jQuery.validator.addMethod("customEmail", function(value, element) {
            return this.optional(element) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
        }, "Please enter valid email address!");

        var $registrationForm = $('#registration');
        if ($registrationForm.length) {

            $registrationForm.validate({
                rules: {
                    //username is the name of the textbox
                    email: {
                        required: true,
                        customEmail: true
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    email: {
                        required: 'Please enter email!',
                        email: 'Please enter valid email!'
                    },
                    password: {
                        required: 'Please enter password!'
                    },
                },

                errorPlacement: function(error, element) {
                    error.insertAfter(element);

                }
            });
        }
    </script>
    <script>
        function authenticate() {
            if ($("#registration").valid()) {
                $.ajax({
                    type: "POST",
                    url: "/Home",
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: $("#usr").val(),
                        password: $("#pwd").val(),
                    },
                    success: function(data) {
                        if (data == "/Home") {
                            sessionStorage.setItem("username", $("#usr").val());
                            window.location.replace(data);
                        } else {
                            alert(data);
                        }
                    },
                    error: function(errs) {
                        alert(err.responseText);
                    }
                });
            }
        }

        // function loadData() {
        //     xhttp = new XMLHttpRequest();
        //     xhttp.onload = function() {
        //         $("#AjaxTest").html(xhttp.responseText);
        //         //OnLoad is executed when a response is returned
        //     }
        //     xhttp.open("GET", "/datatestajax", true);
        //     xhttp.send();
        // }

        // function postdata() {
        //     xhttp = new XMLHttpRequest();
        //     xhttp.open("POST", "/dataposttest/abc");
        //     // request.setRequestHeader("Content-type", "text/plain");
        //     xhttp.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

        //     var Pass = $("#AjaxTestInput").val();

        //     xhttp.onload = function() {
        //         alert(xhttp.responseXML);
        //         $("#AjaxTest").html(xhttp.responseText);
        //         //OnLoad is executed when a response is returned
        //     }
        //     xhttp.send(Pass);
        // }

        // function loadData() {
        //     $.ajax({
        //         type: "GET",
        //         url: "/datatestajax",
        //         success: function(result) {
        //             $("#AjaxTest").text(result[0].username);
        //             alert(JSON.stringify(result));
        //             $("#AjaxTest").css("border", "1px solid red")
        //         }
        //     })
        // }

        // function postdata() {
        //     var Pass = $("#AjaxTestInput").val();
        //     alert("here");
        //     $.ajax({
        //         type: "POST",
        //         url: "/dataposttest",
        //         data: {
        //             _token: "{{ csrf_token() }}",
        //             data: Pass,
        //             emailname: $("#usr").val(),
        //         },
        //         success: function(result) {
        //             alert(result);
        //         }
        //     });
        // }
    </script>
</body>

</html>