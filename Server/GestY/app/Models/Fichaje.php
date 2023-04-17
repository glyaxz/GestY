<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichaje extends Model
{
    protected $fillable = ['empleado_id', 'entrada', 'salida', 'time', 'ip', 'terminal', 'script'];

    use HasFactory;

    public function empleado(){
        return $this->belongsTo(Empleado::class)->first();
    }

    public static function getMs(Fichaje $fichaje){
        $stdout = $fichaje->entrada;
        $entrada = Carbon::create($stdout, 'GMT+1')->timestamp;
        return $entrada;
    }

    public function getTime(){
        $ms = $this->time;
        return($this->formatMilliseconds($ms));
    }

    function formatMilliseconds($seconds) {
        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
        $seconds = $seconds % 60;
        $minutes = $minutes % 60;

        $format = '%u:%02u:%02u';
        $time = sprintf($format, $hours, $minutes, $seconds, null);
        return rtrim($time, '0');
    }
}
