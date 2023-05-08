@extends('layouts.app')
@include('partials.asideClient')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Intelligence artificielle</h1>

    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="img/intelligence-artificielle.jpg" alt="intelligence-artificielle">
                        <h2>L'état de l'intelligence artificielle</h2>
                        <h3>Les développements et les avancées de l'intelligence artificielle</h3>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="img/ia2.jpg" alt="intelligence-artificielle">
                        <h2>Informations sur l'intelligence artificielle</h2>
                        <h3>Les impacts de l'intelligence artificielle</h3>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="img/ia3.jpg" alt="intelligence-artificielle">
                        <h2>Les applications de l'intelligence artificielle</h2>
                        <h3>Comment l'IA est utilisée dans différents domaines.</h3>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="img/ia4.jpg" alt="intelligence-artificielle">
                        <h2>Les différentes approches de l'intelligence artificielle</h2>
                        <h3>L'apprentissage automatique, l'apprentissage profond, l'apprentissage par renforcement.</h3>

                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">A propos de l'intelligence artificielle</h5>
                                <p class="small fst-italic">L'intelligence artificielle (IA) est une branche de l'informatique qui a pour objectif de créer des machines capables d'exécuter des tâches qui nécessitent normalement l'intelligence humaine, telles que la reconnaissance de la parole, la vision, la prise de décision, la résolution de problèmes, la traduction de langues, etc.

                                    Les avancées technologiques récentes, telles que la disponibilité de grandes quantités de données et la puissance de calcul des ordinateurs modernes, ont permis des progrès significatifs dans le domaine de l'IA. De nombreux algorithmes d'apprentissage automatique (machine learning), qui sont des techniques d'IA permettant aux machines d'apprendre à partir de données, ont été développés pour résoudre des problèmes complexes et pour améliorer les performances de diverses applications.

                                    L'IA est devenue une technologie de plus en plus présente dans notre vie quotidienne, que ce soit dans les systèmes de recommandation de produits en ligne, les assistants vocaux, les véhicules autonomes, la surveillance de la santé, la détection de fraude bancaire, etc. Elle peut avoir un impact significatif sur de nombreux secteurs d'activité, tels que la santé, les transports, l'énergie, la finance, l'agriculture, l'éducation, etc.

                                    Cependant, l'IA soulève également des questions éthiques et de sécurité, notamment en ce qui concerne la confidentialité et la protection des données, la responsabilité en cas d'erreurs ou d'accidents causés par des machines autonomes, l'impact sur l'emploi, etc. Il est donc important de développer l'IA de manière responsable et de mettre en place des réglementations appropriées pour assurer son utilisation éthique et bénéfique pour la société.

                                <h5 class="card-title">Les catégories de l'intelligence artificielle</h5>
                                <?php $c = 0 ?>
                                @foreach($categorie as $p)
                                <div class="row">
                                    <h5 class="col-lg-3 col-md-4 label "><a href="{{ route('article',['id'=>$p->id, 'title'=>$titre[$c] ]) }}">{{$p->nom}}</a></h5>
                                    <h6 class="col-lg-9 col-md-8">{{$p->description}}</h6>
                                </div>
                                <?php $c++; ?>
                                @endforeach
                            </div>



                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
< <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>