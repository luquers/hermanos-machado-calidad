<?php

namespace App\Http\Controllers\AuditController;

use App\Http\Controllers\Controller;
use App\Services\AuditService\AuditService;
use App\Models\Audit;
use App\Http\Requests\AuditRequest\AuditRequest;
use App\DataTables\AuditDataTable;
use Illuminate\View\View;
use Illuminate\Http\Response;

class AuditController extends Controller
{

    protected $auditService;

    public function __construct(AuditService $auditService) {
        $this->auditService = $auditService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param AuditDataTable $auditDataTable
     * @return \Illuminate\Http\Response
     */
    public function index(AuditDataTable $auditDataTable)
    {
        return $this->auditService->index($auditDataTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return $this->auditService->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AuditRequest $request
     * @return Response
     */
    public function store(AuditRequest $request)
    {
        return $this->auditService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Audit $audit
     * @return View
     */
    public function show(Audit $audit)
    {
        return $this->auditService->show($audit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Audit $audit
     * @return View
     */
    public function edit(Audit $audit)
    {
        return $this->auditService->edit($audit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AuditRequest $request
     * @param  Audit $audit
     * @return Response
     */
    public function update(AuditRequest $request, Audit $audit)
    {
        return $this->auditService->update($request->all(), $audit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Audit $audit
     * @return Response
     */
    public function destroy(Audit $audit)
    {
        return $this->auditService->destroy($audit);
    }
}