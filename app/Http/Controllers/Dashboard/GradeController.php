<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Dashboard\Grade;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Grades\GradeStoreRequest;
use App\Http\Requests\Dashboard\Grades\GradeUpdateRequest;
use App\ViewModels\Dashboard\GradeViewModel\GradeViewModel;
use App\Actions\Grades\StoreGradeAction;
use App\Actions\Grades\UpdateGradeAction;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $grades=Grade::paginate(15);
        return view('dashboard.pages.grades.view',compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = new GradeViewModel() ;
        dd($data->type);
         return view('dashboard.pages.grades.view',compact('data'));
        //  return view('dashboard.pages.grades.view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeStoreRequest $request)
    {
        app(StoreGradeAction::class)->handle($request->validated());
        toastr("the grade has been saved");
        return redirect()->route('grades.index');
        // return back()->with('message','the grade has been saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {       
        // dd($id);
        $grade = Grade::findorfail($id);
        // dd($grade);
        // return view('dashboard.pages.grades.view',new GradeViewModel($grade));
        return view('dashboard.pages.grades.view',compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeUpdateRequest $request, $grade)
    {
        // $grade = Grade::findorfails($id);
        $grade->update([
            'en_grade' => $request->en_grade,
            'ar_grade' => $request->ar_grade,
            'note' => $request->note,
            'lang' => App::getLocale()
        ]);
        toastr("the grade has been updated",'info',"Updated");
        return redirect()->route('grades.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $grade = Grade::findorfail($id);
        $grade->delete();
           toastr("the grade has been removed",'error',"Deleted");
          return back();
    }
}
