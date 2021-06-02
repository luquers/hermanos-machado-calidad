<?php

namespace App\Models;

use App\Mail\ResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package Nade
 *
 * @OA\Schema(
 *     schema="user",
 *     title="Modelo User"
 * ),
 *
 * @OA\Property(
 *     property="id",
 *     type="integer",
 *     description="Id autoincremental"
 * ),
 * @OA\Property(
 *     property="username",
 *     type="string",
 *     description="Nombre de usuario"
 * ),
 * @OA\Property(
 *     property="name",
 *     type="string",
 *     description="Nombre"
 * ),
 * @OA\Property(
 *     property="email",
 *     type="string",
 *     description="Email"
 * ),
 * @OA\Property(
 *     property="password",
 *     type="string",
 *     description="Contraseña"
 * )
 */
class User extends Authenticatable implements Auditable, HasMedia, CanResetPassword
{
    use Notifiable, HasRoles, HasMediaTrait, HasApiTokens, SoftDeletes, \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {

        $url = url(route('password.reset', [
            'token' => $token,
            'email' => $this->email,
        ], false));

        Mail::to($this->email)->send(new ResetPasswordNotification($url));
    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d/m/Y');
    }

    public function versions (){
        return $this->hasMany(Version::class);
    }

    /*
     * Metodo que nos permite registrar una nueva colección en el mediaLibrary y darle varias opciones.
     */
    public function registerMediaCollections()
    {
        // Coleccion avatar
        $this->addMediaCollection('avatar')
            // Esta colección solo permitirá un unico fichero, si subimos varios, subirá el ultimo dado.
            ->singleFile()
            // Indicamos el disco en el que se va a guardar las imagenes
            ->useDisk('users_avatar')
            // Filtro que permite solo subida de imagenes tipo jpg, png y jpeg
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg']);
    }

    /*
     * Método que nos permite crear una variación para las imagenes, en este caso, crear una imagen
     * de menor resolución
     */
    public function registerMediaConversions(Media $media = null)
    {
        // Colección avatar
        try {
            $this->addMediaConversion('avatar-thumb')
                ->width(200) // Ancho de 50px
                ->height(200) // Alto de 50px
                ->sharpen(10) // Nitidez de 10
                // Añadimos la colección sobre la que se va a crear el dummy
                ->performOnCollections('avatar')
                ->nonQueued();
        }catch(\Exception $exception) {
            print($exception);
        }
    }
}
