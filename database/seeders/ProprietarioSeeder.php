<?php

namespace Database\Seeders;

use App\Models\Proprietario;
use Illuminate\Database\Seeder;

class ProprietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proprietario::unguard();
        Proprietario::create(['nome' => 'Tim Cook']);
        Proprietario::create(['nome' => 'Jeff Bezos']);
        Proprietario::create(['nome' => 'Mark Zuckerberg']);
        Proprietario::create(['nome' => 'Leandro Moura']);
    }
}
