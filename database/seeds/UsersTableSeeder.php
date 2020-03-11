<?php

use Illuminate\Database\Seeder;

// aggiungo il modello su cui devo lavorare
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // leggo il file 'users.php' dove c'e un array con chiave 'users_table'
        $users = config('users.users_table');
        // ciclo i dati letti dal file
        foreach ($users as $user) {
            // creo un nuovo oggetto di tipo Tag
            $new_user = new User();
            // ci assegno i dati che ho messo in '$tags', letti dal file tag.php, cioè l'array con chiave 'tag_db'

            $new_user->fill($user);

            // salvo l'oggetto nel DB
            $new_user->save();
        }
    }
}
