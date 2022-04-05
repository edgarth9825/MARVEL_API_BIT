<?php
use App\Inventory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory')->insert([
            'sucursal_id' => 1,
            'name_comic' => 'Storm (2006)',
        ]);
        DB::table('inventory')->insert([
            'sucursal_id' => 1,
            'name_comic' => 'Ant-Man (2003) #4',
        ]);
        DB::table('inventory')->insert([
            'sucursal_id' => 1,
            'name_comic' => 'Ant-Man (2003) #3',
        ]);
        DB::table('inventory')->insert([
            'sucursal_id' => 2,
            'name_comic' => 'Official Handbook of the Marvel Universe (2004) #12 (SPIDER-MAN)',
        ]);
    }
}
