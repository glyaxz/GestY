<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClickupList extends Model
{
    protected $fillable = ['list_id', 'list_name', 'project_id'];
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
