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
            {{-- HEADER --}}
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <a href="" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('images/logo.png') }}" alt="" height="60">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('images/logo.png') }}" alt="" height="60"> <span class="logo-txt"></span>
                            </span>
                        </a>

                        <a href="" class="logo logo-light">
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
                            @php
                                $defaultImagePath = asset('images/user.png');
                                $userProfilePhotoPath = 'staff/' . Auth::user()->profile_photo_path;
                                if (file_exists(public_path($userProfilePhotoPath))) {
                                    $userImagePath = asset($userProfilePhotoPath);
                                } elseif (file_exists(public_path('images/user.png'))) {
                                    $userImagePath = $defaultImagePath;
                                } else {
                                    $userImagePath = null;
                                }
                            @endphp

                            <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($userImagePath)
                                    <img class="rounded-circle header-profile-user" src="{{ $userImagePath }}" alt="{{ Auth::user()->name ?? 'Header Avatar' }}">
                                @endif
                                <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- IF Admin  --}}
                                <a class="dropdown-item" href="/profil" data-bs-target="#manageSSO"><i class="mdi mdi-cogs font-size-16 align-middle me-1"></i> Manage Akun</a>
                                <div class="dropdown-divider"></div>
                                {{-- IF Admin --}}
                                <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Start Page-content -->
            <div class="container p-0">
                @include('sweetalert::alert')
                @yield('konten')
            </div>
            <!-- End Page-content -->
        </div>
        
        <!-- MODAL MANAGE (NOT USED YET) -->
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
        {{-- LOGOUT MODAL --}}
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
        {{-- FOOTER --}}
        <div class="my-unique-footer">
            <div class="text-center">© PT Olefina Tifaplas Polikemindo 2024</div>
        </div>
    </body>

    {{-- SCRIPT --}}
    {{-- Modal Manage --}}
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