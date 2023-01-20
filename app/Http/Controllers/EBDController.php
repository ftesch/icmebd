<?php

namespace App\Http\Controllers;

use App\Models\ebds;
use App\Models\Igrejas;
use App\Tables\Perguntas;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class EBDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ebd.index', [
            'ebds' => SpladeTable::for(ebds::class)
                ->column('id',hidden: true)
                ->column('data_ebd', sortable: true)
                ->column('data_limite', sortable: true)
                ->column('alterar')
                ->paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ebd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'data_ebd' => ['required','date', 'unique:ebds'],
            'data_limite' => ['required'],
        ]);

        $ebd = ebds::create($request->only(['data_ebd','data_limite']));

        Toast::title('EBD Criada, inclua as perguntas!')->autoDismiss(5);;

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
    public function edit(ebds $ebd)
    {
        //$perguntas = new Perguntas($ebd->id);

        return view('ebd.edit', [
            "ebd" => $ebd,
            "perguntas" => new Perguntas($ebd->id)
            ]);
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
