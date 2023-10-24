<?php
namespace App\Actions\Grades;

use App\Models\Dashboard\Grade;
use Illuminate\Support\Arr;

class UpdateGradeAction
{
    
    public function handle(Grade $grades,array $data)
    {
        $grades->update(
            
        );
      
    }
}
