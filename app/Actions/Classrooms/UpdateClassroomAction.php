<?php
namespace App\Actions\Classrooms;

use App\Models\Dashboard\Classroom;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;

class UpdateClassroomAction
{
    
    public function handle(Classroom $classroom , array $data)
    {
        
        $classroom->update([
            'name' => ['en' => $data['en_classroom'],'ar'=> $data['ar_classroom']],
            'grade_id' => $data['grade'],
            ]);
            toastr(trans('Dashboard/toastr.info'),'info',trans('Dashboard/toastr.updated'));
            return $classroom; 
        }

    }
