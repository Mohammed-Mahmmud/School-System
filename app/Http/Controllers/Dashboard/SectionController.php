<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Illuminate\Http\Request;
use App\Models\Dashboard\Section;
use App\Http\Controllers\Controller;
use App\Actions\Sections\StoreSectionAction;
use App\Http\Requests\Dashboard\Sections\SectionStoreRequest;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $sections = Section::paginate(10);
            return view('dashboard.pages.sections.view',compact('sections')); 
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
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionStoreRequest $request)
    {
        app(StoreSectionAction::class)->handle($request->validated());
        toastr(trans('Dashboard/toastr.succes'));
        return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $section = Section::findorfail($id);
        $section->delete();
           toastr(trans('Dashboard/toastr.destroy') ,'error',trans('Dashboard/toastr.deleted'));
          return back();    }
}
