<?php

namespace App\Http\Controllers;

use App\Models\ebds;
use App\Models\Igrejas;
use App\Models\Perguntas;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class PerguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ebds $ebd)
    {
        return view('perguntas.create', ["ebd" => $ebd]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ebds $ebd)
    {
        $validate = $request->validate([
            'numero' => ['required','integer'],
            'pergunta' => ['required'],
            'classe' => ['required'],
        ]);

        $pergunta = Perguntas::create(array_merge($request->only(['numero','pergunta','resposta','classe','texto_referencia']),['ebd_id' => $ebd->id]));

        Toast::title('Pergunta Criada!')->autoDismiss(5);;

        return redirect()->route('ebd.edit', $ebd->id);

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
    public function edit(ebds $ebd, Perguntas $pergunta)
    {
        return view('perguntas.edit', ["ebd" => $ebd, "pergunta" => $pergunta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ebds $ebd, Perguntas $pergunta)
    {
        $pergunta->update($request->only(['numero','classe','pergunta','texto_referencia','resposta']));
        $pergunta->save();

        Toast::title('Pergunta Alterada!')->autoDismiss(5);;

        return redirect()->route('ebd.edit', $ebd->id);

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
