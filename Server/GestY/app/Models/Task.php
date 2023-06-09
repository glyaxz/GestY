<?php

namespace App\Models;

use App\Models\CList;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    protected $fillable = ['task_id', 'task_name', 'task_desc', 'project_id', 'empleado_id'];
    use HasFactory;

    public function project(){
        return $this->belongsTo(CProject::class);
    }

}
