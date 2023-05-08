@extends('layouts.app')
@include('partials.aside')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{$titre}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/retourAdmin">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nombre d'articles existants par catégorie</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nom catégorie</th>
                                    <th scope="col">Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vnombre as $p)
                                <tr>
                                    <th scope="row">{{$p->nom}}</th>
                                    <td>{{$p->nombre}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nombre moyen de mots dans les articles de chaque catégorie</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nom catégorie</th>
                                    <th scope="col">Moyenne de mots</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vavg as $p)
                                <tr>
                                    <th scope="row">{{$p->categorie}}</th>
                                    <td>{{$p->nombre_mots_moyen}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> La distribution des mots clés utilisés dans les articles.</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mot</th>
                                    <th scope="col">Total occurences</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vmotcle as $p)
                                <tr>
                                    <th scope="row">{{$p->mot}}</th>
                                    <td>{{$p->total_occurrences}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
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