<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.ntawesome.com/2663848d2d.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="ForgotPassword.css">
    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body onload="Loading()">
    <div id="DataDiv">
        <div id="content" class="d-flex flex-column justify-content-center align-items-center h-100 ">
            <div id="UserName" class="w-25">
                <form action="" onsubmit="return false" id="EmailForm">
                    <input type="email" name="email" id="usrmail" class="LoginInputs d-block shadow-lg w-100" placeholder="Enter Email">
                    <button type="submit" onclick="userverify()" class="btn btn-lg d-block btn-primary m-auto w-50">
                        Next
                    </button>
                    <a type="button" class="btn w-25 btn-lg btn-link d-block" href='/'>Login</a>
                </form>
            </div>

            <div id="Verification" class="w-50">
                <form action="" onsubmit="return false" id="verificationform">

                    <textarea class="mt-3 border w-100 shadow-lg mb-2" disabled rows="3">Here will be your security Question</textarea>
                    <input type="text" id="ans" name="ans" class="LoginInputs shadow-lg w-100 rounded-pill" placeholder="You Answer?">

                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-lg btn-primary" onclick="Loading()">
                            Go Back
                        </button>
                        <button type="sunmit" class="btn btn-lg btn-primary" onclick="ansverify()">
                            Verify
                        </button>
                    </div>
                </form>

            </div>

            <div id="ChangePassword" class="w-50">
                <form action="/forgotpassword" method="POST" id="changepasswordform">
                @csrf
                    <input type="password" name="newpass" id="newpass" class="LoginInputs shadow-lg w-100 rounded-pill" placeholder="New Password">
                    <input type="password" name="cnfrmpass" id="cnfrmpass" class="LoginInputs shadow-lg w-100 rounded-pill" placeholder="Confirm Password">
                    <input type="hidden" name="user" id="usernamesecure">

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-lg btn-primary">
                            Change
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <footer class="row bg-dark d-flex my-0 ml-0 justify-content-center align-items-center">
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">© 2021 Around Me, Inc.</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">© 2021 Around Me, Inc.</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
            <a class="py-0 px-2 h-25 text-light " href=" # ">About</a>
        </footer>


        <script>
            function userverify() {
                $.ajax({
                    type: "POST",
                    url: "/ForgotPasswordUsername",
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: $("#usrmail").val(),
                    },
                    success: function(data) {
                        if (data == "User Not Found") {
                            alert(data);
                        } else {
                            Verification(data);
                        }
                    },
                    error: function(abc) {
                        alert(abc.responseText);
                    }
                });
            }

            function ansverify() {
                $.ajax({
                    type: "POST",
                    url: "/ForgotPasswordQuestion",
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: $("#usrmail").val(),
                        ans: $("#ans").val(),
                    },
                    success: function(data) {
                        if (data == "Incorrect Answer") {
                            alert(data);
                        } else {
                            Change();
                        }
                    },
                    error: function(abc) {
                        alert(abc.responseText);
                    }
                });
            }

            // function updatepass() {
            //     $.ajax({
            //         type: "POST",
            //         url: "/settings/changepassword",
            //         data: {
            //             _token: '{{ csrf_token() }}',

            //             newpassword: $("#newpass").val(),
            //             oldpassword: $("#cnfrmpass").val(),
            //         },
            //         success: function(data) {
            //             if (data == "Incorrect Answer") {
            //                 alert(data);
            //             } else {
            //                 Change()
            //             }
            //         },
            //         error: function(abc) {
            //             alert(abc.responseText);
            //         }
            //     });
            // }

        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            jQuery.validator.addMethod("customEmail", function(value, element) {
                return this.optional(element) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
            }, "Please enter valid email address!");
            jQuery.validator.addMethod("matchpassword", function(value, element) {
                let pass = document.getElementById("newpass").value;
                let cnfrmpass = document.getElementById("cnfrmpass").value;

                if (pass == cnfrmpass)
                    return true;
                else
                    return false;
            }, "Passwords do not match");

            var $registrationForm1 = $('#EmailForm');
            if ($registrationForm1.length) {
                $registrationForm1.validate({
                    rules: {
                        email: {
                            required: true,
                            customEmail: true
                        },
                    },
                    messages: {
                        email: {
                            required: 'Please enter email!',
                            customEmail: 'Please enter valid email!'
                        },
                    },

                    errorPlacement: function(error, element) {
                        error.insertAfter(element);
                    }
                });
            }

            var $registrationForm2 = $('#verificationform');
            if ($registrationForm2.length) {
                $registrationForm2.validate({
                    rules: {
                        ans: {
                            required: true,
                        },
                    },
                    messages: {
                        ans: {
                            required: 'Please enter an answer.',
                        },
                    },

                    errorPlacement: function(error, element) {
                        error.insertAfter(element);
                    }
                });
            }

            var $registrationForm3 = $('#changepasswordform');
            if ($registrationForm3.length) {
                $registrationForm3.validate({
                    rules: {
                        newpass: {
                            required: true,
                        },
                        cnfrmpass: {
                            required: true,
                            matchpassword: true,
                        },
                    },
                    errorPlacement: function(error, element) {
                        error.insertAfter(element);
                    }
                });
            }

            function Change() {
                $("#Verification").hide();
                $("#UserName").hide();
                $("#ChangePassword").fadeIn();
            }

            function Loading() {
                $("#Verification").hide();
                $("#UserName").fadeIn();
                $("#ChangePassword").hide();
            }

            function Verification(data) {
                $("#verificationform textarea").val(data[0].Question);
                $("#UserName").hide();
                $("#Verification").fadeIn();
                $("#usernamesecure").val($("#usrmail").val());
            }
        </script>
</body>

</html>