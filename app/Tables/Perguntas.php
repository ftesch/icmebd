<?php

namespace App\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Perguntas extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */

    private $ebd_id;

    public function __construct($ebd_id)
    {
        $this->ebd_id = $ebd_id;
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
        return \App\Models\Perguntas::query()->where('ebd_id', $this->ebd_id);
        //return \App\Models\Perguntas::query();
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
            ->column('id',hidden: true)
            ->column('numero', sortable: true)
            ->column('classe', sortable: true)
            ->column('pergunta', sortable: true)
            ->column('resposta', sortable: true)
            ->column('alterar');


            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
