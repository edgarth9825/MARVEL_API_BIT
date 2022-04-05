<?php

namespace App\Http\Controllers\sucursales;

use App\Http\Controllers\Controller;
use App\Inventory;
use App\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class SucursalesController extends Controller
{
    public function list(){
        $sucursales = Sucursal::all();
        return view('list-sucursales', compact('sucursales'));
    }

    public function create(){
        $comics = Http::get('https://gateway.marvel.com/v1/public/comics?ts=1000&apikey=be5742e4e8edd37c7ea7434616858501&hash=67c2357bca45c88357274ff6634ad2fd');
        $comics_array = $comics->json();
        $comics2 = collect($comics_array['data']['results'])->sortBy('title')->all();
        return view('sucursales.add-sucursales', compact('comics2'));
    }

    public function store(Request $request){
        $datosSucursal = request()->except('_token');
        $sucursal = Sucursal::create($datosSucursal);
        foreach($datosSucursal['comics'] as $comic){
            Inventory::create([
                'name_comic'=> $comic,
                'sucursal_id'=> $sucursal->id_sucursales
            ]);
        }
        
        return back()->with('success', 'Sucursal creada con éxito');
    }

    public function details(Sucursal $sucursal){
        $inventory = Inventory::where('sucursal_id', $sucursal->id_sucursales)->get();
        $comics = Http::get('https://gateway.marvel.com/v1/public/comics?ts=1000&apikey=be5742e4e8edd37c7ea7434616858501&hash=67c2357bca45c88357274ff6634ad2fd');
        $comics_array = $comics->json();
        $comics2 = collect($comics_array['data']['results'])->sortBy('title')->all();
        //dd($object);
        return view('sucursales.details-sucursales', compact('sucursal', 'comics2', 'inventory'));
    }

    public function update(Request $request, $id_sucursales){
        $datosSucursal = request()->except('_token', '_method', 'comics');
        $comics = request('comics');
        //dd($comics);
        foreach($comics as $comic){
            Inventory::create([
                'name_comic'=> $comic,
                'sucursal_id'=> $id_sucursales
            ]);
        }
        Sucursal::where('id_sucursales', '=', $id_sucursales)->update($datosSucursal);
        return back()->with('success', 'Sucursal actualizada con éxito');
    }

    public function delete($id_sucursales){
        Sucursal::destroy($id_sucursales);
        return back()->with('success', 'Sucursal eliminada con éxito');
    }

    public function delete_comic($id_inventory){
        Inventory::destroy($id_inventory);
        return back()->with('successI', 'Comic eliminado de sucursal con éxito');
    }
}
