<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SSO | PT. OTP</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/icon-otp.png') }}">
    <!-- plugin css -->
    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css') }}" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Custom Css-->
    <link href="{{ asset('assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="60">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="60"> <span class="logo-txt"></span>
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="60">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="60"> <span class="logo-txt"></span>
                        </span>
                    </a>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/userbg.png') }}"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            @if (Auth::user()->is_superadmin == 1)
                            <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#manageSSO"><i class="mdi mdi-cogs font-size-16 align-middle me-1"></i> Manage SSO</a>
                            <div class="dropdown-divider"></div>
                            @endif
                            <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="page-content"></div>
        <div class="container">
            <div class="bg-overlay bg-primary-subtle"></div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <h2 class="text-primary"><p id="greetingText"></p></h2>
                        <div class="app-search mx-auto mt-4">
                            <div class="position-relative">
                                <input type="text" class="form-control search-box" placeholder="Search Apps...">
                                <button class="btn btn-primary" type="button"><i class="bx bx-search align-middle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-app mt-4">
                <div class="custom-row d-flex justify-content-center align-items-center">

                    <div class="custom-col mb-4 px-2 py-2">
                        <a href="{{ url('http://127.0.0.1:9040/dashboard') }}" target="_blank" class="card-link">
                            <div class="custom-card">
                                <div class="container-icon">
                                    <img src="{{ asset('images/icon/purchasing.png') }}" class="card-icon" alt="Icon">
                                </div>
                                <div class="container-text" style="display: none;">
                                    <p class="card-text">Purchasing</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="custom-col mb-4 px-2 py-2">
                        <a href="{{ url('http://127.0.0.1:9030/dashboard') }}" target="_blank" class="card-link">
                            <div class="custom-card">
                                <div class="container-icon">
                                    <img src="{{ asset('images/icon/ppic.png') }}" class="card-icon" alt="Icon">
                                </div>
                                <div class="container-text" style="display: none;">
                                    <p class="card-text">PPIC & Warehouse</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="custom-col mb-4 px-2 py-2">
                        <a href="{{ url('http://127.0.0.1:9020/dashboard') }}" target="_blank" class="card-link">
                            <div class="custom-card">
                                <div class="container-icon">
                                    <img src="{{ asset('images/icon/production.png') }}" class="card-icon" alt="Icon">
                                </div>
                                <div class="container-text" style="display: none;">
                                    <p class="card-text">Production</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="custom-col mb-4 px-2 py-2">
                        <a href="{{ url('http://127.0.0.1:9010/dashboard') }}" target="_blank" class="card-link">
                            <div class="custom-card">
                                <div class="container-icon">
                                    <img src="{{ asset('images/icon/marketing.png') }}" class="card-icon" alt="Icon">
                                </div>
                                <div class="container-text" style="display: none;">
                                    <p class="card-text">Marketing</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="custom-col mb-4 px-2 py-2">
                        <a href="{{ url('http://127.0.0.1:9000/dashboard') }}" target="_blank" class="card-link">
                            <div class="custom-card">
                                <div class="container-icon">
                                    <img src="{{ asset('images/icon/accounting.png') }}" class="card-icon" alt="Icon">
                                </div>
                                <div class="container-text" style="display: none;">
                                    <p class="card-text">Accounting</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="custom-col mb-4 px-2 py-2">
                        <a href="{{ url('http://configuration.olefinatifaplas.my.id/login') }}" target="_blank" class="card-link">
                            <div class="custom-card">
                                <div class="container-icon">
                                    <img src="{{ asset('images/icon/configuration.png') }}" class="card-icon" alt="Icon">
                                </div>
                                <div class="container-text" style="display: none;">
                                    <p class="card-text">Configuration</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    

                </div>        
            </div>
        </div>
        
        <!-- Static Backdrop Modal -->
        <div class="modal fade" id="manageSSO" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Manage SSO App</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="d-flex">
                                <button type="button" class="btn-manage w-50 mr-2 active-manage" id="addBtn">Add Application</button>
                                <button type="button" class="btn-manage w-50" id="deleteBtn">Delete Application</button>
                            </div>
        
                            <!-- Add Application Form -->
                            <div id="addForm" class="mt-4">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" value="" name="email" id="" hidden>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="appName" class="font-weight-medium">Application Name</label>
                                                <input name="appName" type="text" class="form-control" id="appName" placeholder="Enter application name">
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <div class="form-group">
                                                <label for="department" class="font-weight-medium">Department</label>
                                                <select name="department" id="" class="form-control">
                                                    <option value="">Choose Department</option>
                                                    <option class="" value="All">All</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <div class="form-group">
                                                <label for="icon" class="font-weight-medium">Icon</label>
                                                <input type="file" name="icon" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <div class="form-group">
                                                <label for="url" class="font-weight-medium">Redirect URL</label>
                                                <input name="redirectUrl" type="text" class="form-control" id="url" placeholder="https://olefinatifaplas.my.id/..">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="align-right mt-4">
                                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                    </div>
                                </form>
                            </div>
        
                            <!-- Delete Application Form -->
                            <div id="deleteForm" class="mt-4 d-none">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" value="" name="email" id="" hidden>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="appName" class="font-weight-medium">Application Name</label>
                                                <select name="appName" id="" class="form-control">
                                                    <option value="">Choose Application</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="department" class="font-weight-medium">Department</label>
                                                <select name="department" id="" class="form-control">
                                                    <option value="">Choose Department</option>
                                                    <option class="" value="All">All</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="align-right mt-4">
                                        <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Select "Logout" below if you are ready to end your current session.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('logout') }}" id="formlogout" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-danger waves-effect btn-label waves-light" name="sb"><i class="mdi mdi-logout label-icon"></i>Logout</button>
                        </form>
                        <script>
                            document.getElementById('formlogout').addEventListener('submit', function(event) {
                                if (!this.checkValidity()) {
                                    event.preventDefault(); // Prevent form submission if it's not valid
                                    return false;
                                }
                                var submitButton = this.querySelector('button[name="sb"]');
                                submitButton.disabled = true;
                                submitButton.innerHTML  = '<i class="mdi mdi-reload label-icon"></i>Please Wait...';
                                return true; // Allow form submission
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="my-unique-footer">
        <div class="text-center">
            © PT Olefina Tifaplas Polikemindo 2024
        </div>
    </div>
    
    
</body>
{{-- greetingElement.innerHTML = generateGreeting(currentHour) + ', <b>{{ $inquiry->given_name }}</b>'; --}}
<script>
    // Get the current hour
    const currentHour = new Date().getHours();

    // Function to generate greetings based on the time
    function generateGreeting(hour) {
        let greeting;

        if (hour >= 5 && hour < 11) {
            greeting = 'Selamat Pagi';
        } else if (hour >= 11 && hour < 15) {
            greeting = 'Selamat Siang';
        } else if (hour >= 15 && hour < 18) {
            greeting = 'Selamat Sore';
        } else if (hour >= 18 && hour < 24) {
            greeting = 'Selamat Malam';
        } else {
            greeting = 'Selamat Malam';
        }

        return greeting;
    }

    // Get the greeting text element
    const greetingElement = document.getElementById('greetingText');
    // Set the text content based on the time
    greetingElement.innerHTML = generateGreeting(currentHour) + ', <b>{{ Auth::user()->name }}</b>';
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchBox = document.querySelector(".search-box");
        
        searchBox.addEventListener("keyup", function(event) {
            const value = event.target.value.toLowerCase();
            const customCols = document.querySelectorAll(".custom-row .custom-col");
            
            customCols.forEach(function(col) {
                const cardText = col.querySelector('.card-text').textContent.toLowerCase();
                if (cardText.indexOf(value) > -1) {
                    col.style.display = ""; // Show if matches search
                } else {
                    col.style.display = "none"; // Hide if it doesn't match search
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addBtn = document.getElementById("addBtn");
        const deleteBtn = document.getElementById("deleteBtn");
        const addForm = document.getElementById("addForm");
        const deleteForm = document.getElementById("deleteForm");
        
        addBtn.addEventListener("click", function() {
            addBtn.classList.add('active-manage');
            deleteBtn.classList.remove('active-manage');
            addForm.classList.remove('d-none');
            deleteForm.classList.add('d-none');
        });

        deleteBtn.addEventListener("click", function() {
            deleteBtn.classList.add('active-manage');
            addBtn.classList.remove('active-manage');
            deleteForm.classList.remove('d-none');
            addForm.classList.add('d-none');
        });
    });
</script>
<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<!-- pace js -->
<script src="{{ asset('assets/libs/pace-js/pace.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Plugins js-->
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>
</html>