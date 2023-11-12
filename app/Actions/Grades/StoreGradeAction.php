<?php
namespace App\Actions\Grades;
use App\Models\Dashboard\Grade;
use Illuminate\Support\Facades\App;

class StoreGradeAction
{
    public function handle(array $data)
    {
        if(Grade::where('name->en', $data['en_grade'])->orwhere('name->ar',$data['ar_grade'])->exists()){
            return redirect()->back()->withErrors($data[App::getLocale().'_grade'].' '.trans('Dashboard/grades.exists'));
        }else{ 
       $grade = Grade::create([
            'name' => ['en' => $data['en_grade'],'ar'=> $data['ar_grade']],
            'note' => $data['note'],
        ]);
        toastr(trans('Dashboard/toastr.succes'));
        return $grade;
        }
    }
}
