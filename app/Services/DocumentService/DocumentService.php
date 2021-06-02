<?php

namespace App\Services\DocumentService;

use App\Models\Document;
use App\Models\Procedure;
use App\Repositories\DocumentRepo\DocumentRepo;
use App\Repositories\ProcedureRepo\ProcedureRepo;
use Illuminate\View\View;
use App\DataTables\DocumentDataTable;

class DocumentService
{

    protected $documentRepo;
    protected $procedureRepo;

    public function __construct(DocumentRepo $document, ProcedureRepo $procedure) {
        $this->documentRepo = $document;
        $this->procedureRepo = $procedure;
    }

    /**
     * Muestra un listado de una entidad
     *
     * @param DocumentDataTable $documentDataTable
     * @return View
     */
    public function index(DocumentDataTable $documentDataTable, Procedure $procedure)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')],
            ['link' => route('procedure.index', ['chapter' => $procedure->chapter]), 'name' => $procedure->chapter->name . " - " . __('global.procedure_list')],
        ];
        return $documentDataTable->render('document.index', compact('procedure', 'breadcrumbs'));
    }

    /**
     * Muestra el formulario de creación
     *
     * @return View
     */
    public function create(Procedure $procedure)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')],
            ['link' => route('procedure.index', ['chapter' => $procedure->chapter]), 'name' => $procedure->chapter->name . " - " . __('global.procedure_list')],
            ['link' => route('document.index', ['procedure' => $procedure]), 'name' => $procedure->name . " - " . __('global.document_list')],
        ];
        return view('document.create', compact('procedure', 'breadcrumbs'));
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
            $procedure = Procedure::where('id', request('procedure'))->first();

            $data['procedure_id'] = $procedure->id;

            $this->documentRepo->create($data);

            return response()->okView('document.index', ['procedure' => $procedure->id]);
        }catch (\Throwable $e) {
            return response()->koView('document.index', ['procedure' => $procedure->id]);
        }
    }

    /**
     * Muestra una entidad específica
     *
     * @param  Document $document
     * @return View
     */
    public function show(Document $document)
    {
        return view('document.show', compact('document'));
    }

    /**
     * Muestra el formulario de edición de una entidad específica
     *
     * @param  Document $document
     * @return View
     */
    public function edit(Document $document)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')],
            ['link' => route('procedure.index', ['chapter' => $document->procedure->chapter]), 'name' => $document->procedure->chapter->name . " - " . __('global.procedure_list')],
            ['link' => route('document.index', ['procedure' => $document->procedure]), 'name' => $document->procedure->name . " - " . __('global.document_list')],
        ];
        return view('document.edit', compact('document', 'breadcrumbs'));
    }

    /**
     * Actualiza una entidad específica
     *
     * @param  array $data
     * @param  Document $document
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, Document $document)
    {
        $document = $this->documentRepo->update($document, $data);

        return response()->okView('document.index', $document->procedure);
    }

    /**
     * Elimina una entidad específica
     *
     * @param  Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $this->documentRepo->delete($document);

        return response()->okJson();
    }

    public function download(Document $document){

        $versions = $document->versions->sortByDesc('revision');
        $data = ['document' => $document, 'versions' => $versions];

        $pdf = \PDF::loadView('document.versions', $data)->setOption('viewport-size','1280x1024');

        return $pdf->download('Cambios en ' . $document->name . '.pdf');

    }
}