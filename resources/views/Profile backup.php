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

    <link rel="stylesheet" href="Profile.css">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/notifications"><i class="far fa-bell fa-2x"></i></a>
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
            <div id="ProfileInfo" class="col-12 d-lg-none px-0 pb-5 mb-3 border-bottom flex-column">
                <div class="card d-flex pt-3">
                    <img src=" {{ $ProfileImage }}" class="cardImg align-self-center rounded-circle">
                    <div class="card-body d-flex flex-column">
                        <h4 class="align-self-center"> {{ $Name }} </h4>
                    </div>
                </div>

                <div id="ProfileDescription" class="bg-white mx-4 p-4">
                    {{ $bio }}
                    <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget tempor nunc. Donec sit amet enim ac turpis pellentesque varius. In ac mauris euismod nulla interdum convallis. Suspendisse a ex purus. Donec efficitur vehicula lorem sit amet commodo.
                    Nunc consequat laoreet mauris, nec placerat justo mollis eu. Phasellus vel tellus non dolor rhoncus varius molestie et urna. Proin sit amet eros metus. Phasellus tristique a dui quis tempus. Interdum et malesuada fames ac ante ipsum
                    primis in faucibus. Sed ac posuere purus. Nullam nec tempor nisi, in mattis dolor. Sed et sem in turpis finibus commodo sit amet in dolor. Etiam eleifend sagittis turpis ut rhoncus. Praesent a augue hendrerit, malesuada est sed, fermentum
                    sem. Nulla sit amet lobortis eros. Mauris laoreet varius diam in commodo. Phasellus vel mollis velit. Maecenas mattis vel ex vitae viverra. Phasellus lobortis sagittis ipsum eget hendrerit. Vivamus ornare quis nulla at pulvinar. Morbi
                    ullamcorper felis id arcu lacinia, id consectetur ipsum rhoncus. Integer mattis augue tortor, ac egestas tellus molestie nec. Nulla semper nibh at odio euismod, sed ullamcorper nulla suscipit. Nulla aliquam, arcu vitae dapibus imperdiet,
                    ipsum neque pellentesque sem, molestie feugiat nulla est ut ligula. Fusce dapibus molestie dui, sit amet viverra purus interdum ut. Etiam tempus ante a risus ornare lacinia. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                    Suspendisse sollicitudin vel mi quis rutrum. Vestibulum posuere, orci eget consectetur volutpat, massa lectus lacinia sapien, ut viverra tortor ex quis ipsum. Pellentesque non ligula vel diam facilisis vehicula sit amet at massa. Donec
                    ut nisi eget nibh commodo cursus eget sed ligula. Praesent faucibus hendrerit sapien ut vehicula. Duis aliquet mi eu odio vulputate, eu mattis tortor dignissim. Nam blandit viverra eros, et rutrum nunc feugiat nec. Vestibulum interdum
                    urna in laoreet rhoncus. Donec finibus elementum laoreet. Donec sapien est, euismod non sem at, semper sagittis risus. Aenean tincidunt, lacus non interdum porta, tortor lectus cursus leo, ut dignissim magna lorem at eros. Donec porta
                    tristique turpis ac ullamcorper. Proin elit urna, tempor nec pharetra a, venenatis non tortor. Donec et enim nec sapien molestie gravida ac vestibulum risus. Suspendisse placerat ex quis interdum dignissim. Nam id nibh a nibh pulvinar
                    feugiat. Cras egestas eget ipsum id vestibulum. Nunc interdum leo ut enim suscipit, in facilisis metus faucibus. Nullam pharetra sem at blandit cursus. Ut lacinia sagittis nisl, vitae hendrerit dui elementum vitae. Praesent gravida
                    orci turpis, quis vehicula nunc commodo in. Nunc dapibus tempus metus. Sed ornare nulla in nulla rutrum gravida. Sed lobortis eget nibh eget sollicitudin. Nullam eget fermentum nisi. Nulla sed erat sed eros ullamcorper tempor. Phasellus
                    non lorem sit amet libero accumsan porttitor a quis lacus. Aenean rutrum ornare nunc in pretium. Integer lacus lacus, imperdiet auctor vehicula auctor, ultricies ut nunc. Aenean pellentesque a urna id fringilla. Nunc vel sollicitudin
                    metus. Sed vel sapien sem. Sed pulvinar justo ligula, porta maximus tell us volutpat et. Aliquam erat volutpat. Fusce non auctor libero. Pellentesque finibus magna a scelerisque sagittis. -->
                </div>
            </div>

            <div id="ProfileInfo" style="top:15vh" class="col-lg-5 d-none d-lg-block sticky-top col-12 px-0 pb-5 mb-3 border-bottom flex-column">
                <div class="card d-flex pt-3">
                    <img src=" {{ $ProfileImage }}" class="cardImg align-self-center rounded-circle">
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
                    <div id="ShowProfileImage" class="d-flex flex-wrap">
                        @foreach($Images as $Img)
                        <a href="#" class="ImgDiv ModalLink" onclick="return false;">
                            <div class="m-auto">
                                <img src="{{ $Img->ImgRef }}" width="100%">
                            </div>
                        </a>
                        @endforeach
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
        $(document).ready(function() {
            for (let i = 0; i < 5; i++) {
                ShowImages("Images/TestPost.JPG");
                ShowImages("Images/TestPost2.JPG");
                ShowImages("Images/TestPost3.JPG");
                ShowImages("Images/airplane.png");
                ShowImages("Images/boat.png");
            }
            for (let i = 0; i < 2; i++) {
                ShowVids("Videos/Mercedes Glk - 1406.mp4");
                ShowVids("Videos/Test Tubes - 5451.mp4");
                ShowVids("Videos/Laboratory - 76396.mp4");
                ShowVids("Videos/Science - 5453.mp4");
            }
            $(".ModalLink").click(function(event) {
                alert("Clicked.")
                var imgclicked = event.target;
                $("#View-Img-Modal").find("img").attr("src", imgclicked.src);
                $("#View-Img-Modal").modal("show");

            });

        });

        // function ShowImages(Img) {
        //     $("#ShowProfileImage").append(`
        //     `)
        // }

        function ShowVids(Vids) {
            $("#ShowProfileVideos").append(`
            <div class="VidDiv shadow-lg">
                <video width="100%" controls>
                    <source src="${Vids}">
                </video>
            </div>
            `)
        }
    </Script>

</body>

</html>