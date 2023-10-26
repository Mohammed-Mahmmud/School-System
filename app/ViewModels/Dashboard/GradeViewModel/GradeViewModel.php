<?php

namespace App\ViewModels\Dashboard\GradeViewModel;

use Spatie\ViewModels\ViewModel;
use App\Models\Dashboard\Grade;

class GradeViewModel extends ViewModel
{
    public  $type;
    public $grade;

    public function __construct($grade = null )
    {
        $this->grade= is_null($grade) ? new Grade(old()) : $grade;
        $this->type = is_null($grade)?'Create':'Edit' ;
    }
    public function action(): string
    {
        return is_null($this->grade->id)
            ? route('grades.store')
            : route('grades.update', $this->grade);
    }

    public function method(): string
    {
        return is_null($this->grade->id) ? 'POST' : 'PUT';
    }
}
