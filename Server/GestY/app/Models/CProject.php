<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CProject extends Model
{
    protected $fillable = ['project_id', 'project_name', 'company_id'];
    use HasFactory;

    public function company(){
        return $this->belongsTo(Company::class);
    }

}
