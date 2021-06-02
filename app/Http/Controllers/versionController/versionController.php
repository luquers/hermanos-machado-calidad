<?php

namespace App\Http\Controllers\versionController;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Services\versionService\versionService;
use App\Models\version;
use App\Http\Requests\versionRequest\versionRequest;
use App\DataTables\versionDataTable;
use Illuminate\View\View;
use Illuminate\Http\Response;

class versionController extends Controller
{

    protected $versionService;

    public function __construct(versionService $versionService) {
        $this->versionService = $versionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param versionDataTable $versionDataTable
     * @return \Illuminate\Http\Response
     */
    public function index(versionDataTable $versionDataTable, Document $document)
    {
        return $this->versionService->index($versionDataTable, $document);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Document $document)
    {
        return $this->versionService->create($document);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  versionRequest $request
     * @return Response
     */
    public function store(versionRequest $request)
    {
        return $this->versionService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  version $version
     * @return View
     */
    public function show(version $version)
    {
        return $this->versionService->show($version);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  version $version
     * @return View
     */
    public function edit(version $version)
    {
        return $this->versionService->edit($version);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  versionRequest $request
     * @param  version $version
     * @return Response
     */
    public function update(versionRequest $request, version $version)
    {
        return $this->versionService->update($request->all(), $version);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  version $version
     * @return Response
     */
    public function destroy(version $version)
    {
        return $this->versionService->destroy($version);
    }
}