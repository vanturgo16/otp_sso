<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login SSO | PT. OTP</title>
    <link rel="shortcut icon" href="{{ asset('images/icon-otp.png') }}">
    <link href="{{ asset('assetslogin/css/style-login.css') }}" rel="stylesheet">
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .input_box {
            position: relative;
            margin-bottom: 15px;
        }
        
        .input_box input {
            width: 100%;
            padding: 10px 40px 10px 30px; /* Add padding to the right for the eye icon */
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .input_box i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        
        .input_box #togglePassword {
            right: 10px; /* Position the eye icon on the right side of the input */
        }
        
        #password {
            padding-right: 40px; /* Extra padding to make space for the icon */
        }
    </style>
    <style>
        /* Custom styling for the info modal */
        #info .modal-content {
            background-color: #f0f8ff; /* Light blue background */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); /* Subtle shadow */
        }

        #info .modal-header {
            background-color: #4682b4; /* Steel blue */
            color: white;
            border-bottom: 2px solid #f0f8ff; /* Light border */
        }

        #info .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        #info .modal-body {
            font-size: 1.1rem;
            color: #333;
            padding: 20px;
        }

        #info .modal-footer {
            border-top: 2px solid #f0f8ff;
            padding: 10px;
        }

        #info .btn-close {
            background-color: #4682b4;
            border: none;
            color: white;
        }

        #info .btn-secondary {
            background-color: #5f9ea0; /* Cadet blue */
            border: none;
            color: white;
        }

        #info .btn-secondary:hover {
            background-color: #4682b4; /* Hover effect */
        }
    </style>
</head>
<body>
    <!-- Home -->
    <section class="home" id="home">
        <div class="form_container">
            <!-- Login From -->
            <div class="form login_form">
                <form action="{{ route('postlogin') }}" method="POST" enctype="multipart/form-data" id="formLogin">
                    @csrf
                    
                    <img src="{{ asset('images/logo.png') }}" alt="" style="max-height: 5vh;">
                    <h2>Login SSO</h2>

                    @if (session('status'))
                        <div class="custom-alert custom-alert-success">
                            <span class="close-btn" onclick="closeAlert(this)">&times;</span>
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('fail'))
                        <div class="custom-alert custom-alert-fail">
                            <span class="close-btn-fail" onclick="closeAlert(this)">&times;</span>
                            {{ session('fail') }}
                        </div>
                    @endif

                    <div class="input_box">
                        <input type="email" placeholder="Enter your email / username" required name="email" />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" id="password" placeholder="Enter your password" required name="password" />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye" id="togglePassword"></i>
                    </div>
                    
                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check" />
                            <label for="check">Remember me</label>
                        </span>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#info">Forgot password?</a>
                    </div>
                    <button type="submit" class="button" id="sbLogin">Login Now</button>
                </form>
                <script>
                    document.getElementById('formLogin').addEventListener('submit', function(event) {
                        if (!this.checkValidity()) {
                            event.preventDefault(); // Prevent form submission if it's not valid
                            return false;
                        }
                        var submitButton = this.querySelector('button[id="sbLogin"]');
                        submitButton.disabled = true;
                        submitButton.innerHTML  = 'Please Wait...';
                        return true; // Allow form submission
                    });
                </script>
            </div>
        </div>
    </section>
    
    {{-- INFO --}}
    <div class="modal fade" id="info" tabindex="-1" aria-labelledby="infoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoLabel">Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please Contact Administrator To Reset Your Password.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        // Optional: Manually open the modal with jQuery
        $('a[data-bs-target="#info"]').click(function() {
        $('#info').modal('show'); // Show the modal using jQuery
        });

        // Optionally, you can trigger a custom action when the modal is shown
        $('#info').on('shown.bs.modal', function() {
        console.log('Modal is now visible!');
        });

        // Optionally, close the modal with jQuery
        $('#info .btn-secondary').click(function() {
        $('#info').modal('hide'); // Close the modal using jQuery
        });
    });
    </script>

    <script src="{{ asset('assetslogin/js/script-login.js') }}"></script>
    @php
        $images = [
            asset('images/login/bg_1.jpg'),
            asset('images/login/bg_2.jpg'),
            asset('images/login/bg_3.jpg'),
        ];
    @endphp
    <script>
        const home = document.getElementById('home');
        const images = @json($images);
        let currentImageIndex = 0;
        function changeBackground() {
            home.style.backgroundImage = `url('${images[currentImageIndex]}')`;
            currentImageIndex = (currentImageIndex + 1) % images.length;
        }
        changeBackground();
        setInterval(changeBackground, 3000);

        function closeAlert(element) {
            var alert = element.parentElement;
            alert.style.display = "none";
        }

    </script>

    <script>
        // Select the password input and the eye icon
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        // Add an event listener to toggle the password visibility
        togglePassword.addEventListener('click', function() {
            // Check the current type of the password input
            const type = password.type === 'password' ? 'text' : 'password';
            
            // Change the type of the password input
            password.type = type;

            // Optionally, change the icon based on visibility
            if (type === 'password') {
                togglePassword.classList.remove('uil-eye-slash');
                togglePassword.classList.add('uil-eye');
            } else {
                togglePassword.classList.remove('uil-eye');
                togglePassword.classList.add('uil-eye-slash');
            }
        });
    </script>
</body>
</html>