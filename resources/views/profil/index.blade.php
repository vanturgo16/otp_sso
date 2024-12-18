@extends('layouts.master')

@section('konten')
<div class="page-content py-5"></div>
{{-- BACKGROUND --}}
<div class="bg-overlay bg-primary-subtle"></div>
<div class="row px-4 mb-4">
    <div class="col-12">
        <h3>
            <a type="button" href="{{ route('menu') }}" class="btn btn-info waves-effect btn-label waves-light">
                <i class="mdi mdi-arrow-left-circle label-icon"></i>Kembali ke Dashboard SSO
            </a>
        </h3>
    </div>
    
    {{-- Alert --}}
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
            <i class="mdi mdi-check-all label-icon"></i><strong>Success</strong> - {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
            <i class="mdi mdi-block-helper label-icon"></i><strong>Failed</strong> - {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    {{-- UPDATE PASSWORD --}}
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Update Password</h3>
            </div>
            <!-- form start -->
            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" id="formUpdatePass">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Password Lama</label>
                        <div class="input-group">
                            <input type="password" name="current_password" id="current_password" placeholder="Masukkan Password Lama" class="form-control @error('current_password') is-invalid @enderror">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('current_password')">
                                    <i class="fa fa-eye" id="toggleCurrentPasswordIcon"></i>
                                </button>
                            </div>
                            @error('current_password')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Password Baru</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Baru" oninput="updatePasswordStrength()">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password')">
                                    <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                </button>
                            </div>
                        </div>
                        <small id="password-strength-indicator" style="display: block; margin-top: 5px;"></small>
                        @error('password')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password Baru" class="form-control @error('password_confirmation') is-invalid @enderror">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password_confirmation')">
                                    <i class="fa fa-eye" id="togglePasswordConfirmationIcon"></i>
                                </button>
                            </div>
                            @error('password_confirmation')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="sbUpdatePass"><i class="fa fa-paper-plane"></i> Update</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</button>
                </div>
            </form>
            <script>
                document.getElementById('formUpdatePass').addEventListener('submit', function(event) {
                    if (!this.checkValidity()) {
                        event.preventDefault(); // Prevent form submission if it's not valid
                        return false;
                    }
                    var submitButton = this.querySelector('button[id="sbUpdatePass"]');
                    submitButton.disabled = true;
                    submitButton.innerHTML  = '<i class="mdi mdi-reload label-icon"></i>Please Wait...';
                    return true; // Allow form submission
                });
            </script>
        </div>
    </div>

    {{-- UPDATE PROFIL --}}
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Update Profil</h3>
            </div>
            <!-- form start -->
            <form action="{{ route('profil.updateFoto') }}" method="POST" enctype="multipart/form-data" id="formUpdateFoto">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <div class="input-group">
                            <input type="text" name="name" value="{{ old('name', $profil->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama" required>
                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Foto</label>
                        <div class="input-group">
                            <input type="file" name="profile_photo_path" value="{{ old('profile_photo_path') }}" class="form-control @error('profile_photo_path') is-invalid @enderror">
                            @error('profile_photo_path')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <img src="{{ asset('staff/'.Auth::user()->profile_photo_path.'') }}" class="img-thumbnail" alt="{{ Auth::user()->name }}" style="max-width: 30vw"/>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="sbUpdateFoto"><i class="fa fa-paper-plane"></i> Update</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</button>
                </div>
            </form>
            <script>
                document.getElementById('formUpdateFoto').addEventListener('submit', function(event) {
                    if (!this.checkValidity()) {
                        event.preventDefault(); // Prevent form submission if it's not valid
                        return false;
                    }
                    var submitButton = this.querySelector('button[id="sbUpdateFoto"]');
                    submitButton.disabled = true;
                    submitButton.innerHTML  = '<i class="mdi mdi-reload label-icon"></i>Please Wait...';
                    return true; // Allow form submission
                });
            </script>
        </div>
    </div>
</div>
<br><br>

<script>
    function updatePasswordStrength() {
        var passwordInput = document.getElementById("password");
        var passwordStrengthIndicator = document.getElementById("password-strength-indicator");
        var password = passwordInput.value;

        var hasLowerCase = /[a-z]/.test(password);
        var hasUpperCase = /[A-Z]/.test(password);
        var hasNumbers = /\d/.test(password);
        var hasSymbols = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(password);

        var strength = 0;
        if (password.length >= 8) strength++;
        if (hasLowerCase) strength++;
        if (hasUpperCase) strength++;
        if (hasNumbers) strength++;
        if (hasSymbols) strength++;

        var strengthText = "";
        if (strength === 0) {
            strengthText = "Lemah";
        } else if (strength < 4) {
            strengthText = "Sedang";
        } else {
            strengthText = "Kuat";
        }

        passwordStrengthIndicator.textContent = "Kekuatan Password: " + strengthText;
    }

    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        var passwordIcon = document.getElementById("toggle" + inputId.charAt(0).toUpperCase() + inputId.slice(1) + "Icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        }
    }
</script>

@endsection
