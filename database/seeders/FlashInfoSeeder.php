<?php

namespace Database\Seeders;

use App\Models\FlashInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlashInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $infos = [
            [
                'title' => 'Agence de promotion de l’expertise nationale : 1ère session de l’Assemblée Générale des Experts tenue le 09 décembre 2022',
                'active' => true,
            ],
        ];

        foreach ($infos as $info)
            FlashInfo::create($info);
    }
}
