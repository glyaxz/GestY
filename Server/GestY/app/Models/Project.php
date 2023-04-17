<?php

namespace App\Models;

use App\Models\Company;
use App\Models\ClickupList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClickupProject extends Model
{
    protected $fillable = ['project_id', 'project_name', 'company_id'];
    use HasFactory;

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function lists(){
        return $this->hasMany(ClickupList::class);
    }
}
