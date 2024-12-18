@extends('layouts.master')
@section('konten')

<div class="page-content"></div>
{{-- BACKGROUND --}}
<div class="bg-overlay bg-primary-subtle"></div>
{{-- SEARCH --}}
<div class="row justify-content-center px-4">
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
{{-- APP ICON --}}
<div class="pd-app mt-4">
    <div class="custom-row d-flex justify-content-center align-items-center">
        @can('Purchasing')
        <div class="custom-col mb-4 px-2 py-2">
                @if (app()->environment('production'))
                <a href="{{ url('https://purchasing.olefinatifaplas.my.id/dashboard') }}" target="_blank" class="card-link">
            @else
                <a href="{{ url('http://127.0.0.1:9040/dashboard') }}" target="_blank" class="card-link">
            @endif
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
        @endcan

        @can('PPIC')
        <div class="custom-col mb-4 px-2 py-2">
            @if (app()->environment('production'))
                    <a href="{{ url('https://ppic.olefinatifaplas.my.id/dashboard') }}" target="_blank" class="card-link">
                @else
                    <a href="{{ url('http://127.0.0.1:9030/dashboard') }}" target="_blank" class="card-link">
                @endif
                <div class="custom-card">
                    <div class="container-icon">
                        <img src="{{ asset('images/icon/ppic.png') }}" class="card-icon" alt="Icon">
                    </div>
                    <div class="container-text" style="display: none;">
                        <p class="card-text">PPIC</p>
                    </div>
                </div>
            </a>
        </div>
        @endcan

        @can('Produksi')
        <div class="custom-col mb-4 px-2 py-2">
        @if (app()->environment('production'))
                <a href="{{ url('https://production.olefinatifaplas.my.id/dashboard') }}" target="_blank" class="card-link">
            @else
                <a href="{{ url('http://127.0.0.1:9020/dashboard') }}" target="_blank" class="card-link">
            @endif
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
        @endcan

        @can('Marketing')
        <div class="custom-col mb-4 px-2 py-2">
                @if (app()->environment('production'))
                <a href="{{ url('https://marketing.olefinatifaplas.my.id/dashboard') }}" target="_blank" class="card-link">
            @else
                <a href="{{ url('http://127.0.0.1:9010/dashboard') }}" target="_blank" class="card-link">
            @endif
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
        @endcan
        
        @can('Akunting_dashboard')
        <div class="custom-col mb-4 px-2 py-2">
            @if (app()->environment('production'))
                <a href="{{ url('https://accounting.olefinatifaplas.my.id/dashboard') }}" target="_blank" class="card-link">
            @else
                <a href="{{ url('http://127.0.0.1:9000/dashboard') }}" target="_blank" class="card-link">
            @endif
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
        @endcan

        @can('Configuration')
        <div class="custom-col mb-4 px-2 py-2">

            @if (app()->environment('production'))
                <a href="{{ url('https://configuration.olefinatifaplas.my.id/dashboard') }}" target="_blank" class="card-link">
            @else
                <a href="{{ url('http://127.0.0.1:7000/dashboard') }}" target="_blank" class="card-link">
            @endif
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
        @endcan

        {{-- @can('Configuration') --}}
        <div class="custom-col mb-4 px-2 py-2">
            @if (app()->environment('production'))
                <a href="{{ url('https://qc.olefinatifaplas.my.id/dashboard') }}" target="_blank" class="card-link">
            @else
                <a href="{{ url('http://127.0.0.1:7000/dashboard') }}" target="_blank" class="card-link">
            @endif
                <div class="custom-card">
                    <div class="container-icon">
                        <img src="{{ asset('images/icon/qualitycontrol.png') }}" class="card-icon" alt="Icon">
                    </div>
                    <div class="container-text" style="display: none;">
                        <p class="card-text">Quality Control</p>
                    </div>
                </div>
            </a>
        </div>
        {{-- @endcan --}}
    </div>        
</div>

{{-- SCRIPT --}}
{{-- Greeting --}}
<script>
    const currentHour = new Date().getHours();
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
    const greetingElement = document.getElementById('greetingText');
    greetingElement.innerHTML = generateGreeting(currentHour) + ', <b>{{ Auth::user()->name }}</b>';
</script>
{{-- Find App Search --}}
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
@endsection