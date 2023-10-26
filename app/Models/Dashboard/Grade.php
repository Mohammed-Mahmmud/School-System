<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory , HasTranslations ;
    public $translatable = ['name'];
    protected  $guarded=[];
    protected $table = 'grades'; 
    public $timestapms =true;
}
