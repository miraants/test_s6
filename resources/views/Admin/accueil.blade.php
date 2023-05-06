@extends('layouts.app')

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
                                        <option selected value="{{$p->resume}}">{{$p->resume}}</option>
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

                                                    <div class="sm:col-span-6">
                                                        <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Ajouter une photo :</label>
                                                        <div class="mt-2 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                                            <div class="space-y-1 text-center">
                                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                <div class="flex text-sm text-gray-600">
                                                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                                        <span>Upload a file</span>
                                                                        <input id="file-upload" name="image" type="file" class="sr-only">
                                                                    </label>
                                                                    <p class="pl-1">or drag and drop</p>
                                                                </div>
                                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                                            </div>
                                                        </div>
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
                                @foreach($article as $p)
                                <tr>
                                    <th scope="row">{{ $p->id }}</th>
                                    <td>{{ $p->resume }}</td>
                                    <td>{{ $p->idcategorie }}</td>
                                    <td><a class="btn btn-outline-primary" href="{{ route('article_fiche',['id'=>$p->id]) }}">Voir Fiche</a></td>
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