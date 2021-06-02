<?php

namespace App\Services\versionService;

use App\Models\Document;
use App\Models\version;
use App\Repositories\versionRepo\versionRepo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\DataTables\versionDataTable;

class versionService
{

    protected $versionRepo;

    public function __construct(versionRepo $version) {
        $this->versionRepo = $version;
    }

    /**
     * Muestra un listado de una entidad
     *
     * @param versionDataTable $versionDataTable
     * @return View
     */
    public function index(versionDataTable $versionDataTable, Document $document)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')],
            ['link' => route('procedure.index', ['chapter' => $document->procedure->chapter]), 'name' => $document->procedure->chapter->name . " - " . __('global.procedure_list')],
            ['link' => route('document.index', ['procedure' => $document->procedure]), 'name' => $document->procedure->name . " - " . __('global.document_list')],
        ];
        return $versionDataTable->render('version.index', compact('document', 'breadcrumbs'));
    }

    /**
     * Muestra el formulario de creación
     *
     * @return View
     */
    public function create(Document $document)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')],
            ['link' => route('procedure.index', ['chapter' => $document->procedure->chapter]), 'name' => $document->procedure->chapter->name . " - " . __('global.procedure_list')],
            ['link' => route('document.index', ['procedure' => $document->procedure]), 'name' => $document->procedure->name . " - " . __('global.document_list')],
            ['link' => route('version.index', ['document' => $document]), 'name' => $document->name . " - " . __('global.version_list')],
        ];
        return view('version.create', compact('document', 'breadcrumbs'));
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
            $document = Document::where('id', request('document'))->first();
            $data['revision'] = $document->versions->count()+1;
            $data['document_id'] = $document->id;
            $data['user_id'] = $user = Auth::user()->id;
            $data['date'] = Carbon::now();

            $this->versionRepo->create($data);

            return response()->okView('version.index', ['document' => $document->id]);
        }catch (\Throwable $e) {
            return response()->koView('version.index', ['document' => $document->id]);
        }
    }

    /**
     * Muestra una entidad específica
     *
     * @param  version $version
     * @return View
     */
    public function show(version $version)
    {
        return view('version.show', compact('version'));
    }

    /**
     * Muestra el formulario de edición de una entidad específica
     *
     * @param  version $version
     * @return View
     */
    public function edit(version $version)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')],
            ['link' => route('procedure.index', ['chapter' => $version->document->procedure->chapter]), 'name' => $version->document->procedure->chapter->name . " - " . __('global.procedure_list')],
            ['link' => route('document.index', ['procedure' => $version->document->procedure]), 'name' => $version->document->procedure->name . " - " . __('global.document_list')],
            ['link' => route('version.index', ['document' => $version->document]), 'name' => $version->document->name . " - " . __('global.version_list')],
        ];
        return view('version.edit', compact('version', 'breadcrumbs'));
    }

    /**
     * Actualiza una entidad específica
     *
     * @param  array $data
     * @param  version $version
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, version $version)
    {
        $version = $this->versionRepo->update($version, $data);
        $document = Document::where('id', request('document'))->first();


        return response()->okView('version.index', $version->document);
    }

    /**
     * Elimina una entidad específica
     *
     * @param  version $version
     * @return \Illuminate\Http\Response
     */
    public function destroy(version $version)
    {
        $this->versionRepo->delete($version);

        return response()->okJson();
    }
}