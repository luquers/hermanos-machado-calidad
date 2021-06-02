<?php

namespace App\Services\ChapterService;

use App\Models\Chapter;
use App\Repositories\ChapterRepo\ChapterRepo;
use Illuminate\View\View;
use App\DataTables\ChapterDataTable;

class ChapterService
{

    protected $chapterRepo;

    public function __construct(ChapterRepo $chapter) {
        $this->chapterRepo = $chapter;
    }

    /**
     * Muestra un listado de una entidad
     *
     * @param ChapterDataTable $chapterDataTable
     * @return View
     */
    public function index(ChapterDataTable $chapterDataTable)
    {
        $selectOptions = [
            ['name' => __('global.select_active'), 'id' => '1'],
            ['name' => __('global.select_deleted'), 'id' => '2'],
        ];
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
        ];
        return $chapterDataTable->render('chapter.index', ['select' => $selectOptions, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Muestra el formulario de creación
     *
     * @return View
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
        ];
        return view('chapter.create', ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Crea una nueva entidad
     *
     * @param  array $data
     * @return \Illuminate\Http\Response
     */
    public function store(array $data)
    {
        $chapter = $this->chapterRepo->create($data);

        return response()->okView('chapter.index');
    }

    /**
     * Muestra una entidad específica
     *
     * @param  Chapter $chapter
     * @return View
     */
    public function show(Chapter $chapter)
    {
        return view('chapter.show', compact('chapter'));
    }

    /**
     * Muestra el formulario de edición de una entidad específica
     *
     * @param  Chapter $chapter
     * @return View
     */
    public function edit(Chapter $chapter)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('chapter.index'), 'name' => __('global.chapter_list')]
        ];
        return view('chapter.edit', compact('chapter', 'breadcrumbs'));
    }

    /**
     * Actualiza una entidad específica
     *
     * @param  array $data
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, Chapter $chapter)
    {
        $chapter = $this->chapterRepo->update($chapter, $data);

        return response()->okView('chapter.index');
    }

    /**
     * Elimina una entidad específica
     *
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        /* Si el capítulo seleccionado tiene el campo deleted_at distinto de null,
        * es que ya ha sido borrado anteriormente, por lo que lo borramos permanentemente
        */
        if ($chapter->deleted_at != null) {
            $chapter->forceDelete();
        }

        // Si no, lo borramos, por lo que se le aplica el softDelete
        $this->chapterRepo->delete($chapter);

        return response()->okJson();
    }

    public function restore(Chapter $chapter)
    {

        $chapter->restore();

        return response()->okView('chapter.index', [], $chapter->name . " " . __('global.restored_successfully'));
    }
}