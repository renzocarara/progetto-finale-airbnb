<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Apartment;
use App\Service;
use App\Info;

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
        $user_id = Auth::user()->id;

        // leggo dal DB tutti gli appartamenti associati all'utente che ha id=$user_id e ottengo una collection
         $apartments = Apartment::where('user_id', $user_id)->get();

        // imposto la paginazione automatica di Laravel
        // $posts = Post::paginate(4);

        return view('admin.index', ['apartments' => $apartments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // leggo tutti i servizi presenti nel DB, ottengo una collection
        $services = Service::all();

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

        $user_id = Auth::user()->id;

        // metto i dati ricevuti (in POST) tramite il parametro $request in una variabile
        // è un array
        $form_data_received=$request->all();
        // creo un nuovo oggetto di classe Apartment, da scrivere poi nel DB
        $new_apartment = new Apartment();
        // valorizzo il nuovo oggetto con i dati ricevuti
        $new_apartment->fill($form_data_received);

        // scrivo nel nuovo oggetto apartment, l'id dell'utente
        $new_apartment->user_id=$user_id;
        $new_apartment->lon=112.67563423;
        $new_apartment->lat=45.90907856;
        $new_apartment->views=33;

        // dd($new_apartment);


        // alla fine scrivo il nuovo oggetto nel DB
        $new_apartment->save();


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
