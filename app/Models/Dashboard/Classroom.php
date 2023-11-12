<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use  App\Models\Dashboard\Grade;
class Classroom extends Model 
{
    use HasFactory , HasTranslations ;
    public $translatable = ['name'];
    protected  $guarded=[];
    protected $table = 'Classrooms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo('Grade', 'grade_id');
    }

}