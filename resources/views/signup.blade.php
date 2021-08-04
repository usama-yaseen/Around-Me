<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.ntawesome.com/2663848d2d.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="SignUp.css">

    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div id="DataDiv">
        <div id="content" class="d-flex flex-column justify-content-center align-items-center h-100">

            <img src=" Images/Logo.png " style="width:200px;height:200px ">

            <h1>
                Stay Up-to-date with your Surroundings
            </h1>

            <!-- Button trigger modal -->
            <button type="button " class="btn btn-lg btn-primary w-25 " data-toggle="modal" data-target="#SignUpModal">
                SignUp
            </button>
            <!-- Modal -->

            <div class="modal fullscreen fade" data-keyboard="false" data-backdrop="static" id="SignUpModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg mx-auto">
                    <div class="modal-content">
                        <div class="modal-body">

                            <span>
                                <button id="Close" type="submit" onclick="revert()" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel
                                </button>

                                <img src="./Images/SignupLogo.png" id="LogoIMGMODAL" class="d-inline mb-3" style="width:100px;height:100px">
                            </span>
                            <h1 class="mb-3 text-white">
                                Create you Account
                            </h1>

                            <form class="w-100" method="POST" action="/Login" enctype="multipart/form-data" id="registration" role="form">
                                @csrf
                                <input type="text" autocomplete="off" name="name" class="LoginInputs form-control w-100" placeholder="Enter Name">
                                <input type="email" name="email" autocomplete="off" id="EmailForSignup" class="LoginInputs form-control w-100" placeholder="Enter email">
                                <input type="password" autocomplete="off"  id="password" name="password" class="LoginInputs form-control w-100" placeholder="Enter password">
                                <input type="password" autocomplete="off" id="cnfrmpassword" name="cnfrmpassword" class="LoginInputs form-control w-100" placeholder="Confirm password">
                                <input type="text" autocomplete="off" name="SecQues" class="LoginInputs form-control w-100" placeholder="Security Question">
                                <input type="text" autocomplete="off" name="Answer" class="LoginInputs form-control w-100" placeholder="Answer">
                                <label class="m-0 w-100 text-right" for="file-input">
                                    <i id="ImgUploadIcon" class="fas fa-images text-white fa btn my-auto m-auto p-0"><span class="d-inline-block ml-3" style="font-size: 16px;">Upload Profile Picture</span></i>
                                </label>
                                <input id="file-input" name="pic" oninput="changeIMG(event)" class="d-block btn btn-primary" type="file" accept="image/*">

                                <div class="gender" class="d-block">
                                    <input type="radio" id="Male" name="gender" class="form-contorl" />
                                    <label class="radio-inline text-white ml-1" for="Male">Male</label>
                                    <input type="radio" id="female" name="gender" class="form-contorl ml-3" />
                                    <label class="radio-inline text-white ml-1" for="Female">Female</label>
                                </div>

                                <span class="text-white">Data of Birth</span>
                                <p>
                                    This will not be shown publicly. Confirm your own age, even if this account is for a business, a pet, or something else.
                                </p>

                                <input type="date" name="date" class="d-block px-3 py-1">
                                <button id="Submit" type="button" onclick="checkusername()" class="btn d-block btn-success w-25 ">
                                    <i class="fas fa-user-plus mr-2"></i>SignUp</button>
                                <br>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-dark mt-2 " style="font-size: 24px; ">
                Already Have an Account?
                <a class="text-white bg-primary p-2 " style="border-radius: 10px; font-size:24px;font-weight: bold; " href="/">LogIn</a>
            </div>
        </div>
    </div>

    <footer class="row bg-dark d-flex my-0 ml-0 justify-content-center align-items-center ">
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

    <Script>
        var IMAGE = document.getElementById("LogoIMGMODAL").src;

        function revert() {
            document.getElementById("LogoIMGMODAL").style.borderRadius = "none";
            document.getElementById("LogoIMGMODAL").src = IMAGE;
        }
        
        function checkusername() {
            if ($("#registration").valid()) 
            {
                $.ajax({
                    type: "POST",
                    url: "/ForgotPasswordUsername",
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: $("#EmailForSignup").val(),
                    },
                    success: function(data) {
                        if (data == "User Not Found") {
                            $("#registration").submit();
                        } else {
                            let reply = confirm("An account is already registered with this email. Do you want to Login?");
                            if (reply == true) {
                                location.href = "/";
                            }
                        }
                    },
                    async:false,
                    error: function(abc) {
                        alert(abc.responseText);
                    }
                });
            }
        }

        function changeIMG(event) {
            var input = event.target;
            //Do Some Img Validation Here

            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('LogoIMGMODAL');
                output.src = dataURL;
                document.getElementById("LogoIMGMODAL").style.borderRadius = "50%";
            };

            const file = document.querySelector('#file-input').files[0];
            reader.readAsDataURL(file);

        }
    </Script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <Script>
        jQuery.validator.addMethod("customEmail", function(value, element) {
            return this.optional(element) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
        }, "Please enter valid email address!");

        jQuery.validator.addMethod("matchpassword", function(value, element) {
            let pass = document.getElementById("password").value;
            let cnfrmpass = document.getElementById("cnfrmpassword").value;

            if (pass == cnfrmpass)
                return true;
            else
                return false;
        }, "Passwords do not match");

        var $registrationForm = $('#registration');
        if ($registrationForm.length) {

            $registrationForm.validate({
                rules: {
                    //username is the name of the textbox
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        customEmail: true
                    },
                    cnfrmpassword: {
                        required: true,
                        matchpassword: true
                    },
                    SecQues: {
                        required: true
                    },
                    Answer: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    pic: {
                        required: true
                    },
                    date: {
                        required: true
                    },


                },
                messages: {
                    email: {
                        required: 'Please enter email!',
                        email: 'Please enter valid email!'
                    },
                    cnfrmpassword: {
                        required: 'Please enter password!'
                    },
                    pic: {
                        required: 'Kindly Upload a Profile Picture.'
                    },
                },

                errorPlacement: function(error, element) {
                    error.insertAfter(element);

                }
            });
        }
    </script>

</body>

</html>