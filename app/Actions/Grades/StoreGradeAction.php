<?php
namespace App\Actions\Grades;
use App\Models\Dashboard\Grade;
use Illuminate\Support\Facades\App;

class StoreGradeAction
{
    public function handle(array $data)
    {
       $grade = Grade::create([
           // 'name' => json_encode(['en' => $data['en_grade'],'ar'=> $data['ar_grade']]),
            'name' => ['en' => $data['en_grade'],'ar'=> $data['ar_grade']],
            'note' => $data['note'],
        ]);
        return $grade;
    }
}
