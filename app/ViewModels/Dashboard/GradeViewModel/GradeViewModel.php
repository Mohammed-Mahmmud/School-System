<?php

namespace App\ViewModels\Dashboard\GradeViewModel;

use Spatie\ViewModels\ViewModel;
use App\Models\Dashboard\Grade;

class GradeViewModel extends ViewModel
{
    public  $type;
    public $grades;
    public function __construct($grades = null)
    {
        $this->grades= is_null($grades) ? new Grade(old()) : $grades;
        $this->type = is_null($grades)?'Create':'Edit' ;
    }
    public function action(): string
    {
        return is_null($this->grades->id)
            ? route('grades.store')
            : route('grades.update', $this->grades);

    }

    public function method(): string
    {
        return is_null($this->grades->id) ? 'POST' : 'PUT';
    }
}
