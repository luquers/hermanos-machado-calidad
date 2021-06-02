<?php

namespace App\Services\ProcedureService;

use App\Models\Chapter;
use App\Models\Procedure;
use App\Repositories\ProcedureRepo\ProcedureRepo;
use Illuminate\View\View;
use App\DataTables\ProcedureDataTable;

class ProcedureService
{

    protected $procedureRepo;

    public function __construct(ProcedureRepo $procedure) {
        $this->procedureRepo = $procedure;
    }

    /**
     * Muestra un listado de una entidad
     *
     * @param ProcedureDataTable $procedureDataTable
     * @return View
     */
    public function index(ProcedureDataTable $procedureDataTable, Chapter $chapter)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')]
        ];
        return $procedureDataTable->render('procedure.index', ['chapter' => $chapter, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Muestra el formulario de creación
     *
     * @return View
     */
    public function create(Chapter $chapter)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')],
            ['link' => route('procedure.index', ['chapter' => $chapter]), 'name' => $chapter->name . " - " . __('global.procedure_list')],
        ];
        return view('procedure.create', compact('chapter', 'breadcrumbs'));
    }

    /**
     * Crea una nueva entidad
     *
     * @param  array $data
     * @return \Illuminate\Http\Response
     */
    public function store(array $data)
    {
        try {
            $data['chapter_id'] = \request('chapter')->id; // Guardamos el capítulo actual

                $this->procedureRepo->create($data);

            return response()->okView('procedure.index', ['chapter' => \request('chapter')->id]);
        }catch (\Throwable $e) {
            return response()->koView('procedure.index', ['chapter' => \request('chapter')->id]);
        }
    }

    /**
     * Muestra una entidad específica
     *
     * @param  Procedure $procedure
     * @return View
     */
    public function show(Procedure $procedure)
    {
        return view('procedure.show', compact('procedure'));
    }

    /**
     * Muestra el formulario de edición de una entidad específica
     *
     * @param  Procedure $procedure
     * @return View
     */
    public function edit(Procedure $procedure)
    {

        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')],
            ['link' => route('procedure.index', ['chapter' => $procedure->chapter]), 'name' => $procedure->chapter->name . " - " . __('global.procedure_list')],
        ];
        return view('procedure.edit', compact('procedure', 'breadcrumbs'));
    }

    /**
     * Actualiza una entidad específica
     *
     * @param  array $data
     * @param  Procedure $procedure
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, Procedure $procedure)
    {
        $procedure = $this->procedureRepo->update($procedure, $data);

        return response()->okView('procedure.index', $procedure->chapter);
    }

    /**
     * Elimina una entidad específica
     *
     * @param  Procedure $procedure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedure $procedure)
    {
        $this->procedureRepo->delete($procedure);

        return response()->okJson();
    }

    public function download(Procedure $procedure){

        $documents = $procedure->documents;
        $data = ['procedure' => $procedure, 'documents' => $documents];

        $pdf = \PDF::loadView('procedure.test', $data)->setOption('viewport-size','1280x1024');

        return $pdf->download($procedure->name . '.pdf');

    }
}