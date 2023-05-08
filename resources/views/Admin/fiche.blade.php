@extends('layouts.app')
@include('partials.aside')
@section('content')

<main id="main" class="main">
    <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-12">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12 my-4">

                                    <div class="card shadow">
                                        <h2 class="card-body">{{$article->nom}}</h2>
                                        <h3 class="card-header">
                                            <strong>{{ $article->titre }}</strong>
                                        </h3>
                                        <h5 class="card-body">
                                            <?php echo $article->contenu ?>
                                        </h5>
                                        <div class="card">
                                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                                <img src="<?php echo $article->image ?>" alt="Intelligence artificielle" width="400">
                                            </div>
                                        </div>
                                        <h6 class="card-footer">
                                            <p class="mb-0 text-muted">{{ $article->resume }}</p>
                                        </h6>
                                    </div>
                                    <div class="col-sm-10">
                                        <a href="/retourAdmin"><button type="submit" class="btn btn-primary">Retour</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
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