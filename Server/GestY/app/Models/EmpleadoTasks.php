<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmpleadoTasks extends Pivot
{
    protected $fillable = ['task_id', 'empleado_id'];
    use HasFactory;

    public function task(){
        return $this->belongsTo(ClickupTask::class);
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
