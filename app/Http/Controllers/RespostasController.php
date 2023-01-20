<?php

namespace App\Http\Controllers;

use App\Models\ebds;
use App\Models\Perguntas;
use App\Models\Respostas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class RespostasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebdsPermitidas = ebds::where([
            ['data_ebd','>=', \Carbon\Carbon::today()->startOfWeek(\Carbon\Carbon::SUNDAY)],
            ['data_ebd','<=', \Carbon\Carbon::today()->startOfWeek(\Carbon\Carbon::SUNDAY)->addDays(6)],
            ['data_limite','>=',\Carbon\Carbon::today() ],
        ])->withCount(['respostas'])
            ->with('perguntas')->get();


        return view('respostas.index', [
            'ebdPermitidas' => $ebdsPermitidas,
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
    public function create(ebds $ebd,Perguntas $pergunta)
    {
        $respostas = Respostas::where([
            ['ebd_id' ,'=', $ebd->id],
            ['pergunta_id' ,'=', $pergunta->id],
        ])->with(['user'])->get();

        return view('respostas.create',[
            'ebd' => $ebd,
            'pergunta' => $pergunta,
            'respostas' => $respostas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ebds $ebd, Perguntas $pergunta)
    {
        $valid = $request->validate([
            'resposta' => 'required'
        ]);

        $resposta = Respostas::create(
            ['ebd_id' => $ebd->id,
                'user_id' => Auth::user()->id,
                'pergunta_id' => $pergunta->id,
                'resposta' => $request->resposta
            ]);

        Toast::title('Contribuição incluída com sucesso!!')->autoDismiss(5);;

        return redirect()->route('resposta.index');


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
