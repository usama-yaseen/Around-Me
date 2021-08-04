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

    <link rel="stylesheet" href="Settings.css">

    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>
    @section('content')

    <div id="Center" class="col p-0 d-flex justify-content-center">
        <div id="Settings" class="shadow-lg bg-white align-self-center">
            <div class="accordion d-flex flex-column justify" id="SettingsAccordion">

                <!--________________________________________________________________________________________
                        ________________________________________________________________________________________

                        General SETTINGS
                        ________________________________________________________________________________________
                        ________________________________________________________________________________________
                    -->
                <a class="btn btn-primary p-3 mb-3" data-toggle="collapse" href="#General">
                    General
                </a>
                <div id="General" class="collapse" data-parent="#SettingsAccordion">
                    <div class="accordion my-2" id="GeneralAcordion">
                        <!-- <a class="btn btn-link p-2" style="color: black;" data-toggle="collapse" href="#UserName">
                            Change Name
                        </a>
                        <div id="UserName" class="shadow-sm collapse my-3 p-3 text-right" data-parent="#GeneralAcordion">
                            <form action="/settings/changename" method="POST" id="changeNameForm">
                                @csrf
                                <input type="text" name="newname" class="form-control border-top-0 border-left-0 border-right-0 mt-3" placeholder="Enter New Name.">
                                <input type="hidden" id="usernameNameChange" name="usernameNameChange" value="Hello">
                                <button type="submit" class="btn btn-dark my-2">
                                    Change
                                </button>
                            </form>
                            Check if the username is already present
                        </div> -->
                        <a class="btn btn-link p-2" style="color: black;" data-toggle="collapse" href="#Password">
                            Change Password
                        </a>
                        <div id="Password" class="shadow-lg collapse text-right  my-3 p-5" data-parent="#GeneralAcordion">
                            <form action="" id="changePasswordForm" onsubmit="return false" role="form">
                                @csrf
                                <!-- <input type="hidden" id="user" name="user" value=""> -->
                                <input type="password" required id="oldpassword" name="oldpassword" class="form-control mt-3 rounded-pill" placeholder="Enter Old Password">
                                <input type="password" id="password" required name="newpassword" class="form-control rounded-pill mt-3" placeholder="Enter New Password">
                                <input type="password" id="cnfrmpassword" name="cnfrmpassword" class="form-control rounded-pill mt-3" placeholder="Confirm New Password">
                                <button type="submit" onclick="passverify()" class="btn btn-dark rounded-pill my-2">
                                    Change
                                </button>
                            </form>
                            <!-- Check if the username is already present -->
                        </div>
                        <a class="btn btn-link p-2" style="color: black;" data-toggle="collapse" href="#Delete">
                            Delete Profile
                        </a>
                        <div id="Delete" class="shadow-lg collapse text-center my-3 p-5" data-parent="#GeneralAcordion">
                            <form action="/" id="deleteform" onsubmit="return false" class="w-100" role="form" method="post">
                                @csrf
                                <!-- <input type="hidden" id="userdelete" name="userdelete" value="Hello"> -->
                                <input type="password" id="deletepass" required name="password" class="form-control rounded-pill mt-3" placeholder="Enter you Password">
                                <button type="button" onclick="acountverify()" class="btn btn-dark rounded-pill w-25 my-2">
                                    Delete
                                </button>
                                <!-- There will be a prompt here. -->
                            </form>
                        </div>
                    </div>
                </div>
                <!--________________________________________________________________________________________
                        ________________________________________________________________________________________

                        Profile SETTINGS
                        ________________________________________________________________________________________
                        ________________________________________________________________________________________
                    -->
                <a class="btn btn-primary p-3 mb-3" data-toggle="collapse" href="#Profile">
                    Profile
                </a>

                <div id="Profile" class="collapse" data-parent="#SettingsAccordion">
                    <div class="accordion my-2" id="ProfileAcordion">
                        <a class="btn btn-link p-2" style="color: black;" data-toggle="collapse" href="#Name">
                            Change Name
                        </a>
                        <div id="Name" class="shadow-sm collapse my-3 p-3 text-right" data-parent="#ProfileAcordion">
                            <form action="/settings/changename" method="POST" id="changeNameForm">
                                @csrf
                                <input type="text" name="newname" class="form-control border-top-0 border-left-0 border-right-0 mt-3" placeholder="Enter New Name.">
                                <input type="hidden" id="usernameNameChange" name="usernameNameChange" value="Hello">
                                <button type="submit" class="btn btn-dark my-2">
                                    Change
                                </button>
                            </form>
                            <!-- Check if the username is already present -->
                        </div>

                        <a class="btn btn-link p-2" style="color: black;" data-toggle="collapse" href="#Bio">
                            Change Bio
                        </a>
                        <div id="Bio" class="shadow-lg collapse text-right my-3 p-1" data-parent="#ProfileAcordion">
                            <form action="/settings/changebio" method="POST" class="w-100" id="changeNameForm">
                                @csrf
                                <textarea class="form-control" required name="newbio" style="resize:none;" rows="5" placeholder="Enter the new information that would defines you"></textarea>
                                <input type="hidden" id="usernamebio" name="usernamebio" value="Hello">
                                <button type="submit" class="btn btn-dark my-2 rounded-pill ">
                                    Change
                                </button>
                            </form>
                            <!-- Check if the username is already present -->
                        </div>
                    </div>
                </div>
                <!--________________________________________________________________________________________
                        ________________________________________________________________________________________

                        Privacy SETTINGS
                        ________________________________________________________________________________________
                        ________________________________________________________________________________________
                    -->
                <a class="btn btn-primary p-3" data-toggle="collapse" href="#Privacy">
                    Privacy
                </a>
                <div id="Privacy" class="collapse" data-parent="#SettingsAccordion">
                    <div class="accordion my-2" id="PrivacyAcordion">
                        <a class="btn btn-link p-2" style="color: black;" data-toggle="collapse" href="#PostPrivacy">
                            Posts Privacy
                        </a>
                        <div id="PostPrivacy" class="shadow-sm collapse my-3 p-3 text-right" data-parent="#PrivacyAcordion">
                            <form action="/settings/changePP" method="POST" class="w-100">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" id="usernamePP" name="usernamePP" value="Hello">
                                    <select required name="newPP" class="form-control">
                                        <option selected disabled></option>
                                        <option>Private</option>
                                        <option>Public</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark my-2 rounded-pill ">
                                    Change
                                </button>
                            </form>

                        </div>

                        <a class="btn btn-link p-2" style="color: black;" data-toggle="collapse" href="#MessagePrivacy">
                            Message Privacy
                        </a>
                        <div id="MessagePrivacy" class="shadow-lg collapse text-right my-3 p-1" data-parent="#PrivacyAcordion">
                            <form action="/settings/changeMP" method="POST" class="w-100">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" id="usernameMP" name="usernameMP" value="Hello">
                                    <select required name="newMP" class="form-control">
                                        <option selected disabled></option>
                                        <option>No-one</option>
                                        <option>Everyone</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark my-2 rounded-pill ">
                                    Change
                                </button>
                            </form>
                        </div>

                        <a class="btn btn-link p-2" style="color: black;" data-toggle="collapse" href="#RequestsPrivacy">
                            Who can send you a friend request?
                        </a>
                        <div id="RequestsPrivacy" class="shadow-lg collapse text-right my-3 p-1" data-parent="#PrivacyAcordion">
                            <form action="/settings/changeFP" method="POST" class="w-100">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" id="usernameFP" name="usernameFP" value="Hello">
                                    <select required name="newFP" class="form-control">
                                        <option selected disabled></option>
                                        <option>No-one</option>
                                        <option>Everyone</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark my-2 rounded-pill ">
                                    Change
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // $("#user").val(sessionStorage.getItem("username"));
        // $("#userdelete").val(sessionStorage.getItem("username"));
        $("#usernameNameChange").val(sessionStorage.getItem("username"));
        $("#usernamebio").val(sessionStorage.getItem("username"));
        $("#usernamePP").val(sessionStorage.getItem("username"));
        $("#usernameMP").val(sessionStorage.getItem("username"));
        $("#usernameFP").val(sessionStorage.getItem("username"));
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <Script>
        jQuery.validator.addMethod("matchpassword", function(value, element) {
            let pass = document.getElementById("password").value;
            let cnfrmpass = document.getElementById("cnfrmpassword").value;

            if (pass == cnfrmpass)
                return true;
            else
                return false;
        }, "Passwords do not match");

        var $registrationForm = $('#changePasswordForm');
        if ($registrationForm.length) {

            $registrationForm.validate({
                rules: {
                    cnfrmpassword: {
                        required: true,
                        matchpassword: true
                    },
                },

                messages: {
                    password: {
                        required: 'Please enter password!'
                    },
                },

                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                }
            });
        }

        var $registrationForm2 = $('#changeNameForm');
        if ($registrationForm2.length) {

            $registrationForm2.validate({
                rules: {
                    newname: {
                        required: true,
                    },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);

                }
            });
        }
    </Script>

    <script>
        function passverify() {
            if ($("#changePasswordForm").valid()) {
                $.ajax({
                    type: "POST",
                    url: "/Settings/verify",
                    data: {
                        _token: '{{ csrf_token() }}',
                        password: $("#oldpassword").val(),
                    },
                    success: function(data) {
                        if (data == "Incorrect Password.") {
                            alert(data);
                        } else if (data == "/Home") {
                            $.ajax({
                                type: "POST",
                                url: "/updatepass",
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    newpass: $("#password").val(),
                                },
                                success: function() {
                                    window.location.reload();
                                },
                                error: function(abc) {
                                    alert(abc.responseText);
                                }
                            });
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

        function acountverify() {
            if ($("#deleteform").valid()) {
                $.ajax({
                    type: "POST",
                    // settings/deleteaccount
                    url: "/Settings/verify",
                    data: {
                        _token: '{{ csrf_token() }}',
                        password: $("#deletepass").val(),
                    },
                    success: function(data) {
                        if (data == "Incorrect Password.") {
                            alert(data);
                        } else if (data == "/Home") {
                            let reply = confirm("Are you sure you want to delete your account? This will remove all your posts data and pictures!");
                            if (reply == false) {
                                alert("Delete Request Cancelled by the user.");
                                location.reload();
                            } else {
                                $.ajax({
                                    type: "get",
                                    url: "/settings/deleteaccount",
                                    success: function(data) {
                                        // alert(JSON.stringify(data));
                                        if (data == 'Done') {
                                            alert("Account Deleted Successfully! Sorry to see you leave though.")
                                            location.replace("/");
                                        }
                                    },
                                    error: function(abc) {
                                        alert(abc.responseText);
                                    }
                                });
                            }
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
    </script>

    @stop
</body>

</html>