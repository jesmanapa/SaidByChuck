<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\CambioPassword;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Método para reenviar el correo para cambiar la contraseña
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CambioPassword($token));
    }

    /**
     * Método que devuelve las frases del usuario
     */
    public function frases(){
        return $this->hasMany('App\Text');
    }
}
