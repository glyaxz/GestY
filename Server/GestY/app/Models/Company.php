<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'company_ref', 'company_name'];

    public function empleados(){
        return $this->hasMany(Empleado::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function getReference(){
        return $this->company_ref;
    }

    public static function getEmpleados(String $companyId){
        $empleados = Empleado::query()->get()->where('company_id', $companyId)->toArray();
        return $empleados;
    }
}
