<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @OA\Get(
     *      path="/api/auth-user",
     *      tags={"Auth"},
     *      summary="Obtener el usuario autenticado",
     *      description="Devuelve el usuario autenticado",
     *      operationId="authenticatedUser",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json"
     *         )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Operación realizada con éxito",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean"),
     *              @OA\Property(property="message", type="string"),
     *              @OA\Property(
     *                  property="validationMessages",
     *                  type="array",
     *                  @OA\Items(
     *                      type="array",
     *                      @OA\Items()
     *                  ),
     *              ),
     *          )
     *      ),
     *      @OA\Response(
     *          response=419,
     *          description="No autorizado",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean", example=false),
     *              @OA\Property(property="message", type="string"),
     *              @OA\Property(
     *                  property="validationMessages",
     *                  type="array",
     *                  @OA\Items(
     *                      type="array",
     *                      @OA\Items()
     *                  ),
     *              ),
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Error en el servidor",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean", example=false),
     *              @OA\Property(property="message", type="string"),
     *              @OA\Property(
     *                  property="validationMessages",
     *                  type="array",
     *                  @OA\Items(
     *                      type="array",
     *                      @OA\Items()
     *                  ),
     *              ),
     *          )
     *      ),
     *      security={
     *          {"bearerAuth": {}}
     *      }
     * )
     *
     * Devuelve el usuario autenticado
     */
    public function authenticatedUser(Request $request) {
        return $request->user();
    }
}
