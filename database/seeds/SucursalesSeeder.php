<?php
use App\Sucursal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sucursales')->insert([
            'name'=>'Sucursal 2 ',
            'location'=>'Town Square Metepec',
            'phone'=>'722222'
        ]);
        DB::table('sucursales')->insert([
            'name'=>'Sucursal 3',
            'location'=>'Galerias Metepec',
            'phone'=>'72334'
        ]);
        DB::table('sucursales')->insert([
            'name'=>'Sucursal 3',
            'location'=>'Sendero',
            'phone'=>'722555'
        ]);
    }
}
