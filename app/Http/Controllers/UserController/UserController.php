<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use App\DataTables\UsersDataTable;
use App\Http\Requests\UserRequest\UserStoreRequest;
use App\Http\Requests\UserRequest\UserUpdateRequest;
use App\Services\UserService\UserService;
use App\Models\User;

class UserController extends Controller
{

    use AuthorizesRequests;

    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     * @param UsersDataTable $usersDataTable
     * @return View
     */
    public function index(UsersDataTable $usersDataTable)
    {
        return $this->userService->index($usersDataTable);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        return $this->userService->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param UserStoreRequest $request
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        return $this->userService->store($request->all());
    }

    /**
     * Show the specified resource.
     * @param User $user
     * @return View
     */
    public function show($user)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return View
     */
    public function edit(User $user)
    {
        return $this->userService->edit($user);
    }

    /**
     * Update the specified resource in storage.
     * @param UserUpdateRequest $request
     * @param User $user
     * @return View
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        return $this->userService->update($request->all(), $user);
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        return $this->userService->destroy($user);
    }

    public function list() {
        return $this->userService->list();
    }
    public function restore(User $user)
    {
        return $this->userService->restore($user);
    }
}
