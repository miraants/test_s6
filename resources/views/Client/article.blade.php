@extends('layouts.app')
@include('partials.asideClient')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Intelligence artificielle</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/retourClient">Home</a></li>
                <li class="breadcrumb-item">Components</li>
                <li class="breadcrumb-item active">Cards</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-12">

                <!-- Default Card -->
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">{{$categorie->nom}}</h5>
                        <p>
                            {{$categorie->description}}
                        <p>

                    </div>
                </div><!-- End Default Card -->

                <div class="card">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="<?php echo $article->image ?>" alt="Profile" width="400">
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{$article->titre}}</h3>
                        <h4>{{$article->nom}}</h4>
                        <h5>{{$article->resume}}</h5>
                        <p class="card-text"> <?php echo $article->contenu ?></p>
                    </div>
                    <div class="col-sm-10">
                        <a href="/retourClient"><button type="submit" class="btn btn-primary">Retour</button></a>
                    </div>
                </div>

            </div>



        </div>
    </section>

</main>
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
@endsection