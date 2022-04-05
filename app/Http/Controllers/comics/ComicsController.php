<?php

namespace App\Http\Controllers\comics;

use App\Http\Controllers\Controller;
use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComicsController extends Controller
{
    public function list(){
        $comics = Http::get('https://gateway.marvel.com/v1/public/comics?ts=1000&apikey=be5742e4e8edd37c7ea7434616858501&hash=67c2357bca45c88357274ff6634ad2fd');
        $comics_array = $comics->json();
        $comics2 = $comics_array['data']['results'];
        return view('list-comics', compact('comics2'));
    }

    public function details($id){
        $url = 'https://gateway.marvel.com/v1/public/comics/'.$id.'?ts=1000&apikey=be5742e4e8edd37c7ea7434616858501&hash=67c2357bca45c88357274ff6634ad2fd';
        $comic = Http::get($url);
        $comic_simple = $comic->json();
        $comic2 = $comic_simple['data']['results'][0];
        $title = $comic_simple['data']['results'][0]['title'];
        $sucursal = Inventory::with('sucursal')->where('name_comic', $title)->get();
        return view('comics.details', compact('comic2', 'id', 'title', 'sucursal'));
    }
}
