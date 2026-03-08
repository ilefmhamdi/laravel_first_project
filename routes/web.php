<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/services', [PageController::class, 'services']);

Route::get('/blog', [PageController::class, 'blog']);
Route::get('/article/{id}', [PageController::class, 'article'])->where('id', '[0-9]+');

Route::get('/utilisateur/{nom}', function ($nom) {
    return "<h1>Profil de $nom</h1>
            <p>Bienvenue sur votre page !</p>";
});

Route::get('/article/{id}/{titre}', function ($id, $titre) {
    return "<h1>Article #$id : $titre</h1>";
});

Route::get('/bonjour/{nom?}', function ($nom = 'Visiteur') {
    return "<h1>Bonjour, $nom !</h1>";
});

Route::get('/produit/{id}', function ($id) {
    return "<h1>Produit #$id</h1>";
})->where('id', '[0-9]+');

Route::get('/calculer/{a}/{b}', function ($a, $b) {
    $somme = $a + $b;
    return "<h1>Somme</h1><p>$a + $b = $somme</p>";
})->where(['a' => '[0-9]+', 'b' => '[0-9]+']);

Route::get('/age/{age}', function ($age) {
    $statut = $age >= 18 ? 'majeur' : 'mineur';
    return "<h1>Vérification d'âge</h1><p>Vous avez $age ans. Vous êtes $statut.</p>";
})->where('age', '[0-9]+');

Route::get('/equipe/{membre?}', function ($membre = null) {
    if ($membre) {
        return "<h1>Membre: $membre</h1>";
    } else {
        return "<h1>Toute l'équipe</h1>";
    }
});