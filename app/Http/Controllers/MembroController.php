<?php

namespace App\Http\Controllers;

use App\Models\Igrejas;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use ProtoneMedia\Splade\Facades\Toast;

class MembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Igrejas $igreja)
    {
        $validate = $request->validate([
            'name' => ['required','unique:users'],
            'email' => ['required','email','unique:users'],
            'role' => ['required'],
        ]);

        $password = \Str::random(20);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password)
        ]);

        Profile::create([
            'user_id' => $user->id,
            'igreja_id' => $igreja->id,
            'role' => $request->role
        ]);

        Toast::title("Membro cadastrado com sucesso!!\nSenha Criada: $password")->autoDismiss(5);;

        return redirect()->route('igreja.edit', $igreja->id);


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
    public function destroy(Profile $profile)
    {
        $user_id = $profile->user_id;
        $igreja_id = $profile->igreja_id;

        Profile::destroy($profile->id);
        User::destroy($user_id);

        Toast::title("Membro excluído com sucesso!!")->autoDismiss(5);;

        return redirect()->route('igreja.edit', $igreja_id);

    }
}
