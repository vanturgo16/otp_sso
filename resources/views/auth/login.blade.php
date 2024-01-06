<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | PT. OTP</title>
    <link rel="shortcut icon" href="{{ asset('images/icon-otp.png') }}">
    <link href="{{ asset('assetslogin/css/style-login.css') }}" rel="stylesheet">
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>
<body>
    <!-- Home -->
    <section class="home" id="home">
        <div class="form_container">
            <!-- Login From -->
            <div class="form login_form">
                <form action="{{ route('postlogin') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="password" placeholder="Enter your password" required name="password" />
                        <i class="uil uil-lock password"></i>
                    </div>
                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check" />
                            <label for="check">Remember me</label>
                        </span>
                        <a href="#" class="forgot_pw">Forgot password?</a>
                    </div>
                    <button type="submit" class="button">Login Now</button>
                </form>
            </div>
        </div>
    </section>

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
</body>
</html>