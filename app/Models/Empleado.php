<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use App\Models\Fichaje;
use Illuminate\Database\Eloquent\Model;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    protected $fillable = ['empleado_id', 'nombre', 'correo', 'company_id'];
    use HasFactory;

    public function fichajes()
    {
        return $this->hasMany(Fichaje::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function getId(){
        return $this->id;
    }

    public function getHours(){
        $seconds = 0;
        $fichajes = Fichaje::query()->get(['empleado_id','time'])->where('empleado_id', $this->id);
        foreach($fichajes as $f){
            try{
                $seconds += $f->time;
            }catch(InvalidFormatException){
                $seconds += 0;
            }
        }

        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
        $seconds = $seconds % 60;
        $minutes = $minutes % 60;

        $format = '%uh%02um%02us';
        $time = sprintf($format, $hours, $minutes, $seconds, null);
        return rtrim($time, '0');
    }
}
