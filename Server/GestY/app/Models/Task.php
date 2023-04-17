<?php

namespace App\Models;

use App\Models\ClickupList;
use App\Models\Empleado;
use App\Models\EmpleadoTasks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    protected $fillable = ['task_id', 'task_name', 'project_id'];
    use HasFactory;

    public function list(){
        return $this->belongsTo(ClickupList::class);
    }

    public function empleados(): BelongsToMany{
        return $this->belongsToMany(Empleado::class)->using(EmpleadoTasks::class);
    }
}
