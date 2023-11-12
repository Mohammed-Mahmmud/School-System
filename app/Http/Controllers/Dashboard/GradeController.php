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
        try{
         return view('dashboard.pages.grades.view');
    }
    catch(Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       } 
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeStoreRequest $request)
    {
       try{
        app(StoreGradeAction::class)->handle($request->validated());
        return redirect()->route('grades.index');
     }catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           }
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
    public function update(GradeUpdateRequest $request, Grade $grade)
    { 
        try{
        app(UpdateGradeAction::class)->handle($grade,$request->validated());
        return redirect()->route('grades.index');
    }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           }
    }
    

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Grade $grade)
    {
        try{
        $grade->delete();
           toastr(trans('Dashboard/toastr.destroy') ,'error',trans('Dashboard/toastr.deleted'));
          return back();
        }catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
           }
        }
}
