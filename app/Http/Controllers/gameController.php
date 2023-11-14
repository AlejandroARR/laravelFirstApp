<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;

class gameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games=game::all(); //eloquent
        //dd($games);
        return view('game.index',['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        //1º generar el objeto para guardar
        $object=new game($request-> all());
        //2º intentar guardar
        try{
            //$result=$object->save();
            $game = game::create($request -> all());
            //3º si lo he guardado volver a algún sitio: index, create
            return redirect('game/create') ->with(['message' => 'The game has been saved']);
        }catch(\Exception $e){

            //4º si no lo he guardado volver a la página anterior con sus datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'The game has not been saved.']);
        }

    }
    */
        public function store(Request $request){
        
        //1º generar el objeto para guardar
        
        $object = new game($request->all());
        
        //2º intentar guardar
        
        try {
            
            $result = $object->save();  
            
        //3º si lo he guardado volver a algún sitio
            $afterInsert=session('afterInsert','show games');
            $target='game';
            if($afterInsert != 'show games'){
                $target='game/create';
            }
            return redirect($target)->with(['message'=> 'The game has been saved.']);
            
        } catch(\Exception $e) {
            
        //4º si no lo he guardado, volver a la pag anterior con los datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'The game has not been saved.']);
            
        }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(game $game)
    {
        return view('game.show', ['game' => $game]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(game $game)
    {
        return view('game.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\game  $game
     * @return \Illuminate\Http\Response
     */
    /* 
    public function update(Request $request, game $game)
    {
        
        try{
            $result=$game->update($request->all());
            return redirect('game')->with(['message' => 'la pelicula ha sido actualizada']);
        }catch(\Exception $e){
            return back()->withInput()->withErrors(['message' => 'la pelicula no ha sido actualizada']);
        }

    }
    */
    public function update(Request $request, game $game)
    {
        
        //1º generar el objeto para guardar
        
        
        try {
            
            $game->update($request->all());
            $afterEdit=session('afterEdit','game');
            $target='game'; //edit/game/show
            if($afterEdit=='game'){
                $target='game';
            }else if($afterEdit=='edit'){
                $target='game/'.$game->id .'/edit';
            }else{
                $target='game/'.$game->id;
            }
            //3º si lo he guardado volver a algún sitio
            return redirect($target)->with(['message'=> 'The game has been updated.']);
            
        } catch(\Exception $e) {
            
            //4º si no lo he guardado, volver a la pag anterior con los datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'The game has not been updated.']);
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\game  $game
     * @return \Illuminate\Http\Response
     */
   public function destroy(game $game)
{
    try {
        $game->delete();
        return redirect('game')->with(['message' => 'The game has been deleted.']);
    } catch(\Exception $e) {
         return back()->withErrors(['message' => 'The game has not been deleted.']);
    }
}
}
