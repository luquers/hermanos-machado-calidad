<?php

namespace App\Http\Controllers\ProcedureController;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Services\ProcedureService\ProcedureService;
use App\Models\Procedure;
use App\Http\Requests\ProcedureRequest\ProcedureRequest;
use App\DataTables\ProcedureDataTable;
use Illuminate\View\View;
use Illuminate\Http\Response;

class ProcedureController extends Controller
{

    protected $procedureService;

    public function __construct(ProcedureService $procedureService) {
        $this->procedureService = $procedureService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ProcedureDataTable $procedureDataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ProcedureDataTable $procedureDataTable, Chapter $chapter)
    {
        return $this->procedureService->index($procedureDataTable, $chapter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Chapter $chapter)
    {
        return $this->procedureService->create($chapter);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProcedureRequest $request
     * @return Response
     */
    public function store(ProcedureRequest $request)
    {
        return $this->procedureService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Procedure $procedure
     * @return View
     */
    public function show(Procedure $procedure)
    {
        return $this->procedureService->show($procedure);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Procedure $procedure
     * @return View
     */
    public function edit(Procedure $procedure)
    {
        return $this->procedureService->edit($procedure);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcedureRequest $request
     * @param  Procedure $procedure
     * @return Response
     */
    public function update(ProcedureRequest $request, Procedure $procedure)
    {
        return $this->procedureService->update($request->all(), $procedure);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Procedure $procedure
     * @return Response
     */
    public function destroy(Procedure $procedure)
    {
        return $this->procedureService->destroy($procedure);
    }

    /**
     * Download the procedure document tree pdf
     *
     * @param Procedure $procedure
     * @return Response
     */
    public function download(Procedure $procedure) {
        return $this->procedureService->download($procedure);
    }
}