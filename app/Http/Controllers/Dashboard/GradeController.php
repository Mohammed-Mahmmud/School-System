<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Grade;
use App\ViewModels\Dashboard\GradeViewModel\GradeViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
            return view('dashboard.pages.grades.view',new GradeViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Grade::create($request->all());
        Grade::create([
            'en_grade' => $request->en_grade,
            'ar_grade' => $request->ar_grade,
            'note' => $request->note,
            'lang' => App::getLocale()
        ]);
        return back()->with('message','the grade has been saved');
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
    public function edit(Grade $grade)
    {
        $grade =Grade::get();
        return view('dashboard.pages.grades.view',new GradeViewModel($grade));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
     $grade->delete();
            return back()->with('message','the filed is deleted');
    }
}
