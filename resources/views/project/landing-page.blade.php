@extends('project.layouts.app')
@php
    $title = 'Company';
@endphp

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Company .Inc</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item pull-right">
                    <a class="nav-link" aria-current="page" href="{{ route('login') }}">LogIn</a>
                </li>
                <li class="nav-item pull-right-2">
                    <a class="nav-link" href="{{ route('register') }}">SignUp</a>
                </li>
                @auth
                    <li class="nav-item pull-right-2">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input class="form-control" type="submit" value="Logout"> 
                        </form>
                    </li>    
                @endauth
                
            </ul>
        </div>
    </div>
</nav>

<!-- ////////////////////////////////////////////////////////// -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/plan.jpg" height="400px" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h4 class="carousel-head">Planning is our goal</h4>
                <p class="carousel-par">Planning made easy with our platform, any number of projects,tons of features , make it all with a button</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/responsive.jpg" height="400px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="carousel-head">Responsive</h5>
                    <p class="carousel-par">Our platform is responsive 100% on all devices</p>
                </div>
        </div>
        <div class="carousel-item">
            <img src="images/triangle.jpg" height="400px" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="carousel-head">More Time , Less Cost</h5>
                <p class="carousel-par">Our platform is a user-friendly with simple user interface</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/man.jpg" height="400px" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="carousel-head">Lets go</h5>
                <p class="carousel-par">What are you waiting for, go ahead and build something great</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="features text-center">
    <div class="container">
        <h1>Our Features</h1>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="feat">
                    <h3>Time</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                    </svg>
                    <p>
                        Time is our treasure , less time means more features and less complexities
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feat">
                    <h3>Updates</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                    </svg>
                    <p>
                        We have big major updates every week for simplicity and smooth user experience
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feat">
                    <h3>Price</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                    </svg>
                    <p>
                        Lowest platform in prices and 1 month free trial
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feat">
                    <h3>Awards</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
                        <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
                        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                    </svg>
                    <p>
                        Top used platform in 2021 and 2020, 10 prizes in 6 months 
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


    
    