<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    public function index(){
        return response()->json(Noticia::all());

    }

    public function store(Request $request){

        $noticia = Noticia::create($request->all());
        return response()->json($noticia, 201);

    }

    public function show(Noticia $noticia){

        return response()->json($noticia, 200);
    }

    public function update(Noticia $noticia, Request $request){

        $noticia->titulo = $request->titulo;   
        $noticia->descricao = $request->descricao;
        $noticia->user_id = $request->user_id;
        $noticia->save();
        
        return response()->json($noticia, 200);
    }

    public function destroy(Noticia $noticia){

        Noticia::destroy($noticia->id);

        return response()->noContent();

    }

}