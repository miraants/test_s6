@extends('layouts.app')
@include('partials.aside')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>General Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="search-bar">
                                <form class="search-form d-flex align-items-center" method="POST" action="/rechercheflex">
                                    @csrf
                                    <input type="text" name="search" placeholder="Search" title="Enter search keyword">
                                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <form method="POST" action="#">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <select class="form-select" aria-label="Default select example" name="montant">
                                        @foreach($article as $p)
                                        <option selected value="{{$p->resume}}">{{$p->titre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-select" aria-label="Default select example" name="categorie">
                                        @foreach($categorie as $c)
                                        <option selected value="{{$c->id}}">{{$c->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit Form</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <h5 class="card-title">Liste des articles</h5>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                Add new article
                            </button>
                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ajouter un nouvel article</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/addArticle" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-3 col-form-label">Titre</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="titre">
                                                    </div>
                                                    <label for="inputText" class="col-sm-3 col-form-label">Résumé</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="resume">
                                                    </div>
                                                    <label for="inputText" class="col-sm-3 col-form-label">Catégorie</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example" name="idcategorie">
                                                            @foreach($categorie as $c)
                                                            <option selected value="{{$c->id}}">{{$c->id}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="inputText" class="col-sm-3 col-form-label">Contenu</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="ckeditor form-control" id="contenu" name="contenu" cols="50" rows="5"></textarea>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="img">Image</label>
                                                        <input type="file" id="img" size="50000000" onchange="convertToBase64()" class="form-control-file" />
                                                        <input type="hidden" id="visuel" name="image">
                                                    </div>

                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="button" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Default Table -->
                        <table class="table">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Résumé</th>
                                    <th scope="col">Catégorie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $c = 0 ?>
                                @foreach($article as $p)
                                <tr>
                                    <th scope="row">{{ $p->id }}</th>
                                    <td>{{ $p->resume }}</td>
                                    <td>{{ $p->idcategorie }}</td>
                                    <td><a class="btn btn-outline-primary" href="{{ route('article_fiche',['id'=>$p->id, 'title'=>$title[$c] ]) }}">Voir Fiche</a></td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updt">
                                                Update
                                            </button>
                                            <div class="modal fade" id="updt" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modifier l'article</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('article.update', $p->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('PUT') }}
                                                                <div class="row mb-3">

                                                                    <label for="inputText" class="col-sm-3 col-form-label">Catégorie</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" class="form-control" name="idarticle" value="{{ $p->id }}">
                                                                        <input type="text" class="form-control" name="idcategorie" value="{{ $p->idcategorie }}">
                                                                    </div>
                                                                    <label for="inputText" class="col-sm-3 col-form-label">Résumé</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="resume" value="{{ $p->resume }}">
                                                                    </div>
                                                                    <label for="inputText" class="col-sm-3 col-form-label">Contenu</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="contenu" value="<?php echo $p->contenu ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                            <button type="button" class="btn btn-primary">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="/deleteArticle" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$p->id}}" name="idarticle">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </div>
                                        </form>
                                    </td>

                                </tr>
                                <?php $c++; ?>
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


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script>
    const imageInput = document.getElementById('img');
    imageInput.addEventListener('change', () => {
        const file = imageInput.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            const base64String = reader.result.split(',')[1];
            document.getElementById('visuel').value = "data:image/*;base64," + base64String;
            console.log(base64String);
        };
    });
</script>

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
@endsection