<?php

namespace App\Http\Controllers\DocumentController;

use App\Http\Controllers\Controller;
use App\Models\Procedure;
use App\Services\DocumentService\DocumentService;
use App\Models\Document;
use App\Http\Requests\DocumentRequest\DocumentRequest;
use App\DataTables\DocumentDataTable;
use Illuminate\View\View;
use Illuminate\Http\Response;

class DocumentController extends Controller
{

    protected $documentService;

    public function __construct(DocumentService $documentService) {
        $this->documentService = $documentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param DocumentDataTable $documentDataTable
     * @return \Illuminate\Http\Response
     */
    public function index(DocumentDataTable $documentDataTable, Procedure $procedure)
    {
        return $this->documentService->index($documentDataTable, $procedure);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Procedure $procedure)
    {
        return $this->documentService->create($procedure);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DocumentRequest $request
     * @return Response
     */
    public function store(DocumentRequest $request)
    {
        return $this->documentService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Document $document
     * @return View
     */
    public function show(Document $document)
    {
        return $this->documentService->show($document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Document $document
     * @return View
     */
    public function edit(Document $document)
    {
        return $this->documentService->edit($document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DocumentRequest $request
     * @param  Document $document
     * @return Response
     */
    public function update(DocumentRequest $request, Document $document)
    {
        return $this->documentService->update($request->all(), $document);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Document $document
     * @return Response
     */
    public function destroy(Document $document)
    {
        return $this->documentService->destroy($document);
    }

    /**
     * Download the versions list of changes pdf
     *
     * @param Document $document
     * @return Response
     */
    public function download(Document $document) {
        return $this->documentService->download($document);
    }
}