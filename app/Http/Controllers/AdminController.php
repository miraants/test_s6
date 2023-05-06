<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Mouvement;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\VArticle;
use Faker\Core\Number;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;

class AdminController extends Controller
{

    public function loginAdmin()
    {
        $username = request('email');
        $password = request('mdp');
        $admin = DB::table('admin')
            ->where('email', $username)
            ->where('mdp', md5($password))
            ->get();
        if (count($admin) > 0) {
            $titre = "Intelligence artificielle";
            $message = "";
            $message1 = "";
            $article = Article::all();
            $categorie = Categorie::all();

            //$stock_quantity = Stock_quantity::all();
            return view('Admin/accueil', compact('titre', 'message', 'message1', 'article', 'categorie'));
        } else {
            $titre = "Intelligence artificielle";
            $error = "Identifiant invalide";
            return view('Admin/index', compact('titre', 'error'));
        }
    }

    public function addArticle()
    {
        if (request('image') != null) {
            $image = request('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('img/' . $filename));

            $art = Article::create([
                'titre' => request('titre'),
                'resume' => request('resume'),
                'idcategorie' => request('idcategorie'),
                'contenu' => request('contenu'),
                'image' => $filename,
            ]);
        } else {
            $art = Article::create([
                'titre' => request('titre'),
                'resume' => request('resume'),
                'idcategorie' => request('idcategorie'),
                'contenu' => request('contenu')
            ]);
        }
        $titre = "Intelligence artificielle";
        $article = Article::all();
        $categorie = Categorie::all();
        return view('Admin/accueil', compact('article', 'categorie', 'titre'));
    }

    public function retourAdmin()
    {
        $article = Article::all();
        $categorie = Categorie::all();
        $titre = "Intelligence artificielle";
        return view('Admin/accueil', compact('article', 'categorie', 'titre'));
    }


    public function fiche($idarticle)
    {
        $article = VArticle::where('id', '=', $idarticle)->first();
        $titre = "Intelligence artificielle";
        return view('Admin/fiche', compact('article', 'titre'));
    }

    public function deleteArticle()
    {
        $id = request('idarticle');
        $article = Article::find($id);
        $article->delete();
        $article = Article::all();
        $categorie = Categorie::all();
        $titre = "Intelligence artificielle";
        return view('Admin/accueil', compact('article', 'categorie', 'titre'));
    }

    public function updateArticle(Request $req, $id)
    {
        $id = request('id');
        $product = Article::find($id);
        $product->update($req->all());
        $article = Article::all();
        $categorie = Categorie::all();
        $titre = "Intelligence artificielle";
        return view('Admin/accueil', compact('article', 'categorie', 'titre'));
    }

    public function rechercheflex()
    {
        $search = request('search');
        if ($search)
            $produit = DB::table('produit')
                ->where('id', $search)
                ->orWhere('idcategorie', $search)
                ->get();
        $categorie = Categorie::all();
        return view('Admin/accueil', compact('produit', 'categorie'));
    }
}
