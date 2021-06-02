<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'logoutApp']);
    }

    // Login
    public function showLoginForm()
    {
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true
        ];

        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }

    /**
     * @OA\Post(
     *      path="/api/loginApp",
     *      operationId="loginApp",
     *      tags={"Auth"},
     *      summary="Iniciar sesión web",
     *      description="Inicia sesión en la aplicación a través del middleware web",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json"
     *         )
     *      ),
     *
     *      @OA\Parameter(
     *          name="email",
     *          description="Email",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *      @OA\Parameter(
     *          name="password",
     *          description="Password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Operación realizada con éxito"
     *      ),
     *
     *      @OA\Response(
     *          response=422,
     *          description="Las credenciales no coinciden con nuestros registros",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean", example=false),
     *              @OA\Property(property="message", type="string"),
     *              @OA\Property(
     *                  property="validationMessages",
     *                  type="array",
     *                  @OA\Items(
     *                      type="array",
     *                      @OA\Items(
     *                          @OA\Property(property="email", type="string", example="admin@example.org"),
     *                          @OA\Property(
     *                              property="message",
     *                              type="string",
     *                              example="Las credenciales no coinciden con nuestros registros"
     *                          ),
     *                      )
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
     * )
     *
     * Inicia sesión en la aplicación
     */
    public function loginApp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($user->id)->plainTextToken;
    }

    /**
     * @OA\Post(
     *      path="/api/logout-app",
     *      operationId="logoutApp",
     *      tags={"Auth"},
     *      summary="Salir de la aplición",
     *      description="Salir de la aplicación",
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
     * Salir de la aplicación
     */
    public function logoutApp(Request $request) {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([], 200);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            recaptchaFieldName() => recaptchaRuleName()
        ]);

    }
}
