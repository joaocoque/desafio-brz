<?php

use Illuminate\Database\Seeder;
use App\Models\Imovel;
use App\Models\Interessado;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $imovel1 = Imovel::create([

            'codigo'=> '001',
            'tipo'=> 'casa',
            'pretensao'=> 'teste',
            'titulo'=> 'bela casa',
            'detalhes'=> 'vista para o mar',
            'quartos'=> 2,
            'valor'=> 1500
        ]);

        $imovel2 = Imovel::create([

            'codigo'=> '002',
            'tipo'=> 'apartamento',
            'pretensao'=> 'teste',
            'titulo'=> 'não muito boa',
            'detalhes'=> 'jardim espaçoso',
            'quartos'=> 3,
            'valor'=> 5500
        ]);

        $imovel3 = Imovel::create([

            'codigo'=> '003',
            'tipo'=> 'casa',
            'pretensao'=> 'teste',
            'titulo'=> 'Kitnet',
            'detalhes'=> 'parece um quadrado',
            'quartos'=> 1,
            'valor'=> 5000
        ]);

        $interessado1 = Interessado::create([

            'nome'=> 'Jaci Costa',
            'email'=> 'jacirobson@gmail.com '
        ]);

        $interessado2 = Interessado::create([

            'nome'=> 'Bruno Lacerda',
            'email'=> 'bruninLacerda@gmail.com '
        ]);

        $interessado1->interesses()->attach($imovel1);
        $interessado1->interesses()->attach($imovel2);
        $interessado2->interesses()->attach($imovel3);
    }
}













