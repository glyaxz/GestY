<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    protected $fillable = ['empleado_id', 'nombre', 'correo', 'company_id'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function getId(){
        return $this->id;
    }

    public static function isEmpty(Collection $empleados){
        return $empleados->toArray() == [];
    }
}
