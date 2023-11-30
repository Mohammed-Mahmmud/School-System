<?php
namespace App\Actions\Classrooms;
use App\Models\Dashboard\Classroom;
use Illuminate\Support\Facades\App;

class StoreClassroomAction
{
    public function handle(array $data)
    {
        dd($data);
        if(Classroom::where('name->en', $data['en_classroom'])->orwhere('name->ar',$data['ar_classroom'])->exists()){
            return redirect()->back()->withErrors($data[App::getLocale().'_classroom'].' '.trans('Dashboard/classrooms.exists'));
        }else{ 
       $classroom = Classroom::create([
            'name' => ['en' => $data['en_classroom'],'ar'=> $data['ar_classroom']],
            'grade_id' => $data['grades'],
        ]);
        toastr(trans('Dashboard/toastr.succes'));
        return $classroom;
        }
    }
}
