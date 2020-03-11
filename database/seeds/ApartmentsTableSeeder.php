Apartment<?php

use Illuminate\Database\Seeder;

// aggiungo il modello su cui devo lavorare
use App\Apartment;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     //


     // numero di appartamenti "fake" da creare
     public $num_of_Apartments = 30;

    public function run()
    {
        // chiamo la funzione "factory" per num_of_Apartments volte, per riempiere le righe della tabella
        factory(App\Apartment::class, $this->num_of_Apartments)->create();

    }
}
