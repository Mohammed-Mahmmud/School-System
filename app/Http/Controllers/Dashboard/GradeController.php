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
use Exception;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        try{
            $grades = Grade::paginate(10);
            return view('dashboard.pages.grades.view',compact('grades')); 
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = new GradeViewModel() ;
        $action = $data->action();
        $method = $data->method();
        $type = $data->type;
        //  return view('dashboard.pages.grades.view',compact('data'));
         return view('dashboard.pages.grades.view',compact('action','method','type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeStoreRequest $request)
    {
       
        app(StoreGradeAction::class)->handle($request->validated());
        toastr(trans('Dashboard/toastr.succes'));
        return redirect()->route('grades.index');
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
      try{
        $grade = Grade::findorfail($id);
        // return view('dashboard.pages.grades.view',new GradeViewModel($grade));
        return view('dashboard.pages.grades.view',compact('grade'));
    }
    catch(Exception $e){
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
       }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(GradeUpdateRequest $request,$id)
    {
        try{
            $grade = Grade::findorfail($id);
        app(UpdateGradeAction::class)->handle($grade,$request->validated());
        toastr(trans('Dashboard/toastr.info'),'info',trans('Dashboard/toastr.updated'));
        return redirect()->route('grades.index');
    }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           }
    }
    

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $grade = Grade::findorfail($id);
        $grade->delete();
           toastr(trans('Dashboard/toastr.destroy') ,'error',trans('Dashboard/toastr.deleted'));
          return back();
    }
}
