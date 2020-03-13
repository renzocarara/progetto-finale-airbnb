<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Apartment;
use App\Service;
use App\Info;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // questa funzione viene invocata per visualizzare la homepage della parte autenticata,
        // viene mostrata all'utente subito dopo il login

        // recupero l'id dell'utente che è loggato
        $user_id = Auth::user()->id;

        // leggo dal DB tutti gli appartamenti associati all'utente loggato e ottengo una collection
         $apartments = Apartment::where('user_id', $user_id)->get();

        // imposto la paginazione automatica di Laravel
        // $posts = Post::paginate(4);

        // ritorno la view che visualizzerà una pagina con l'elenco degli appartamenti dell'utente loggato
        // l'elenco glie lo passo come parametro
        return view('admin.index', ['apartments' => $apartments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // questa funzione permette all'utente di creare un nuovo appartamento che verrà salvato nel DB

        // leggo l'elenco  dei servizi presenti nel DB, ottengo una collection
        $services = Service::all();

        // ritorno una vista che è un megaForm per l'inerimento di tutti i dati associati ad un appartamento
        // gli passo anche l'elenco con i nomi dei servizi associabili all'appartemento
        return view("admin.create", ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // questa funzione memorizza i dati di un appartamento nel DB
        // scrive in 3 tabelle diverse: apartments, infos e apartments_services


// ********************** TABELLA 'apartments' **********************
        // recupero l'id dell'utente che è loggato
        $user_id = Auth::user()->id;

        // metto i dati ricevuti (in POST) tramite il parametro $request in una variabile (che è un array)
        $form_data_received=$request->all();
        // creo un nuovo oggetto di classe Apartment, da scrivere poi nel DB
        $new_apartment = new Apartment();
        // valorizzo il nuovo oggetto con i dati ricevuti
        $new_apartment->fill($form_data_received);

        // scrivo nel nuovo oggetto apartment, l'id dell'utente
        $new_apartment->user_id=$user_id;

        // qui dovrò calcolare lat e lon in base all'indirizzano
        // per il momento valori cablati...
        $new_apartment->lon=112.67563423;
        $new_apartment->lat=45.90907856;

        // imposto a zero, il valore iniziale delle visualizzazione dell'appartmaneto
        $new_apartment->views=0;

        // alla fine scrivo il nuovo oggetto nel DB
        $new_apartment->save();


// ******************* TABELLA 'infos' **********************
        // creo un nuovo oggetto di classe Info, da scrivere poi nel DB
        $new_info = new Info();
        // valorizzo il nuovo oggetto con i dati ricevuti
        $new_info->fill($form_data_received);

        // DA IMPLEMENTARE
        // ATTENZIONE: MANCA DA IMPLEMENTARE MEMORIZZAZIONE CORRETTA DELL'IMMAGINE(PATH)
        // togliere image dall'elenco fillable...

        // recupero l'id dell'appartamento che ho appena inserito nella tabella apartments,
        // poichè devo inserirlo nella colonna apartment_id(FK) della tabella infos
        $apt_id = DB::table('apartments')->latest()->first()->id;

        // inserisco l'id dell'appartamento appena inserito nel DB, nell'oggetto di classe Info
        // che poi andrò a scrivere nella tabella infos
        $new_info->apartment_id=$apt_id;

        // alla fine scrivo il nuovo oggetto nel DB
        $new_info->save();


// ******************* TABELLA 'apartments_services' **********************

            // DA IMPLEMENTARE



        // faccio una REDIRECT verso la rotta 'apartment.index'
        return redirect() -> route('admin.apartment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
