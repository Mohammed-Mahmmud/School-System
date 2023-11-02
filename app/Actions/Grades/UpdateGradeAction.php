<?php
namespace App\Actions\Grades;

use App\Models\Dashboard\Grade;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;

class UpdateGradeAction
{
    
    public function handle(Grade $grade , array $data)
    {
        $grade->update([
            'name' => json_encode(['en' => $data['en_grade'],'ar'=> $data['ar_grade']]),
            'note' => $data['note'],
            ]);
            return $grade;
    }
}
