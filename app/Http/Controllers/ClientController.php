<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\VArticle;

class ClientController extends Controller
{
    public function accueil()
    {
        $categorie = Categorie::all();
        $article = VArticle::all();
        $titre = "Intelligence artificielle";
        $title = [];
        foreach ($article as $a) {
            array_push($title, AdminController::getSlug($a->titre));
        }
        return view('Client/accueil', compact('article', 'titre', 'categorie', 'title'));
    }

    public function article($idcategorie)
    {
        $categorie = Categorie::where('id', '=', $idcategorie)->first();
        $article = VArticle::where('idcategorie', '=', $idcategorie)->first();

        $titre = "Intelligence artificielle";
        return view('Client/article', compact('article', 'titre', 'categorie'));
    }

    public function retourClient()
    {
        $article = VArticle::all();
        $categorie = Categorie::all();
        $titre = "Intelligence artificielle";
        $title = [];
        foreach ($article as $a) {
            array_push($title, AdminController::getSlug($a->titre));
        }
        return view('Client/accueil', compact('article', 'titre', 'categorie', 'title'));
    }
}
