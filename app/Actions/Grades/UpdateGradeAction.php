<?php
namespace App\Actions\Grades;

use App\Models\Dashboard\Grade;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;

class UpdateGradeAction
{
    
    public function handle(Grade $grade,array $data)
    {
        $grade->update([
                'en_grade' => $data['en_grade'],
                'ar_grade' => $data['ar_grade'],
                'note'     => $data['note'],
                'lang'     => App::getLocale()
            ]);
            return $grade;
    }
}
