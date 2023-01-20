<?php

namespace App\Http\Controllers;

use App\Models\Igrejas;
use App\Tables\Membros;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class IgrejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('igrejas.index', [
            'igrejas' => SpladeTable::for(Igrejas::class)
                    ->column('id',hidden: true)
                    ->column('codigo', sortable: true)
                    ->column('nome', sortable: true)
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
        return view('igrejas.create');
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
            'codigo' => ['required','min:6', 'max:6', 'unique:igrejas'],
            'nome' => ['required','min:5', 'unique:igrejas'],
        ]);

        $igreja = Igrejas::create($request->only(['codigo','nome']));

        Toast::title('Igreja Criada, adicione os membros!');

        return redirect()->route('igreja.edit', $igreja->id );
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
    public function edit(Igrejas $igreja)
    {
        return view('igrejas.edit', [
            "igreja" => $igreja,
            "membros" => new Membros($igreja->id)
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
        Igrejas::where('id', $id)
                ->update($request->only(['codigo','nome'])
                );

        Toast::title('Igreja Alterada!')->autoDismiss(5);
        return redirect()->route('igreja.index');

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
