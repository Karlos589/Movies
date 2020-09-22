<?php

namespace App\Http\Controllers;

use App\Filmes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['filmes']=Filmes::paginate(5);
        return view('filmes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('filmes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

       // $datosFilme=request()->all();

        $datosFilme=request()->except('_token');

        if($request->hasFile('Foto')){
            $datosFilme['Foto']=$request->file('Foto')->store('uploads', 'public'); 
        }

        Filmes::insert($datosFilme);

       //return response()->json($datosFilme);
       return redirect('filmes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Filmes  $filmes
     * @return \Illuminate\Http\Response
     */
    public function show(Filmes $filmes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filmes  $filmes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $filme= Filmes::findOrFail($id);

        return view('filmes.edit',compact('filme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filmes  $filmes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosFilme=request()->except(['_token','_method']);

        $filme= Filmes::findOrFail($id);

        Storage::delete(['public/'.$filme->Foto]);

        if($request->hasFile('Foto')){
            $datosFilme['Foto']=$request->file('Foto')->store('uploads', 'public'); 
        }

        Filmes::where('id','=',$id)->update($datosFilme);

        $filme= Filmes::findOrFail($id);

        return view('filmes.edit',compact('filme'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filmes  $filmes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        
        $filme= Filmes::findOrFail($id);

        if(Storage::delete(['public/'.$filme->Foto])){
             
            Filmes::destroy($id);
        }

        

        return redirect('filmes');
    }
}
