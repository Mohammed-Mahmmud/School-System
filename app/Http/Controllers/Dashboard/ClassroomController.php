<?php 

namespace App\Http\Controllers\Dashboard;

use App\Actions\Classrooms\StoreClassroomAction;
use App\Actions\Classrooms\UpdateClassroomAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Classroom\ClassroomStoreRequest;
use App\Http\Requests\Dashboard\Classroom\ClassroomUpdateRequest;
use App\Models\Dashboard\Classroom;
use App\Models\Dashboard\Grade;
use Exception;
use Illuminate\Http\Request;

class ClassroomController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    try{

      $classrooms = Classroom::paginate(10);
      $grades = Grade::get();
      return view('dashboard.pages.classrooms.view',compact('classrooms','grades')); 
  }
  catch(Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ClassroomStoreRequest $request)
  {
    try{
      app(StoreClassroomAction::class)->handle($request->validated());
      return redirect()->route('classrooms.index');
   }catch(Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(ClassroomUpdateRequest $request ,Classroom $classroom)
  {
    try{
      app(UpdateClassroomAction::class)->handle($classroom,$request->validated());
      return redirect()->route('classrooms.index');
  }
      catch(Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Classroom $classroom)
  {
    try{
      $classroom->delete();
         toastr(trans('Dashboard/toastr.destroy') ,'error',trans('Dashboard/toastr.deleted'));
        return back();
      }catch(Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
      } 
  }