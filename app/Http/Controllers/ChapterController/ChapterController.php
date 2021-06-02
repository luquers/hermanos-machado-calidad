<?php

namespace App\Http\Controllers\ChapterController;

use App\Http\Controllers\Controller;
use App\Models\Procedure;
use App\Services\ChapterService\ChapterService;
use App\Models\Chapter;
use App\Http\Requests\ChapterRequest\ChapterRequest;
use App\DataTables\ChapterDataTable;
use Illuminate\View\View;
use Illuminate\Http\Response;

class ChapterController extends Controller
{

    protected $chapterService;

    public function __construct(ChapterService $chapterService) {
        $this->chapterService = $chapterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ChapterDataTable $chapterDataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ChapterDataTable $chapterDataTable)
    {
        return $this->chapterService->index($chapterDataTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return $this->chapterService->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ChapterRequest $request
     * @return Response
     */
    public function store(ChapterRequest $request)
    {
        return $this->chapterService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Chapter $chapter
     * @return View
     */
    public function show(Chapter $chapter)
    {
        return $this->chapterService->show($chapter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Chapter $chapter
     * @return View
     */
    public function edit(Chapter $chapter)
    {
        return $this->chapterService->edit($chapter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChapterRequest $request
     * @param  Chapter $chapter
     * @return Response
     */
    public function update(ChapterRequest $request, Chapter $chapter)
    {
        return $this->chapterService->update($request->all(), $chapter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Chapter $chapter
     * @return Response
     */
    public function destroy(Chapter $chapter)
    {
        return $this->chapterService->destroy($chapter);
    }

    public function restore(Chapter $chapter)
    {
        return $this->chapterService->restore($chapter);
    }

    //test
    public function test(){
        $procedure = Procedure::where('id', 1)->first();
        $documents = $procedure->documents;
        $data = ['procedure' => $procedure, 'documents' => $documents];

        $pdf = \PDF::loadView('procedure.test', $data)->setOption('viewport-size','1280x1024');

//        dd($documents);
        return $pdf->stream();

    }
}