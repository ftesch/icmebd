<?php

namespace App\Tables;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Membros extends AbstractTable
{
    private $igreja_id;
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct($igreja_id)
    {
        $this->igreja_id = $igreja_id;
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Profile::select(
            'profiles.id',
            'profiles.igreja_id',
            'profiles.user_id',
            DB::raw('igrejas.nome as nome_igreja'),
            DB::raw('igrejas.codigo as codigo_igreja'),
            DB::raw('users.name as nome_membro'),
            DB::raw('users.email as email_membro'),
            DB::raw('profiles.role as perfil'),
        )
            ->join('users','users.id','=','profiles.user_id')
            ->join('igrejas','igrejas.id','=','profiles.igreja_id')
            ->where('profiles.igreja_id',$this->igreja_id)
            ->get()
            ;
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->column('id', hidden: true)
            ->column('igreja_id', hidden: true)
            ->column('user_id', hidden: true)
            ->column('codigo_igreja')
            ->column('nome_igreja')
            ->column('nome_membro', sortable: true)
            ->column('email_membro', sortable: true)
            ->column('perfil', sortable: true)
            ->column('alterar');

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
