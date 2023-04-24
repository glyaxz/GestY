<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'empleado_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        return $this->role === 'admin';
    }
    public function empleado(){
        return $this->hasOne(Empleado::class);

    }
    public function getEmpleado(){
        $f = Fichaje::query()->get()->where('empleado_id', $this->empleado_id)->first()->getModel();
        return $f->empleado();
    }

    public function desfichar(){
        $empleado = $this->empleado()->getParent()->getAttribute('empleado_id');
        $fichaje = Fichaje::query()->get(['empleado_id', 'id', 'salida'])->where('empleado_id', $empleado)->last() ;

        try {
            return $fichaje->getAttribute('salida') == null;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function lastfichaje(Empleado $e){
        $fichaje = Fichaje::query()->get()->where('empleado_id', $e->id)->last();

        return $fichaje->id;
    }
}
