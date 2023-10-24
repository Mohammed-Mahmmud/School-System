<?php
namespace App\Actions\Grades;
use App\Models\Dashboard\Grade;
use Illuminate\Support\Facades\App;

class StoreGradeAction
{
    public function handle(array $data)
    {
       $grade = Grade::create([
            'en_grade' => $data['en_grade'],
            'ar_grade' => $data['ar_grade'],
            'note'     => $data['note'],
            'lang'     => App::getLocale()
        ]);
   
      
        return $grade;
    }
}
