@extends('dashboard.layouts.master')
@section('title','School Classrooms')
@section('css')
{{-- for edit icons --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
{{-- for delete icons --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@if (Session::has('message'))
<script>
    toastr.success("{{ Session::get('message') }}");
    </script>
@endif
   <!-- Sweet Alert css-->
   <link href="{{asset('dashboard')}}/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

@endsection
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ trans('Dashboard/classrooms.classrooms') }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ trans('Dashboard/classrooms.classrooms') }}</a></li>
                                <li class="breadcrumb-item active">{{ trans('Dashboard/classrooms.viewClassrooms') }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
  <!-- end page title -->

  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">{{ trans('Dashboard/classrooms.addClassrooms') }}</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                {{-- <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>{{ trans('Dashboard/classrooms.addGrade') }}</button> --}}
                                <a class="btn btn-success add-btn" href="{{ route('classrooms.create') }}" data-bs-toggle="modal" data-bs-target="#showModal">{{ trans('Dashboard/classrooms.addClassroom') }}</a>
                                <button class="btn btn-subtle-danger" onclick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="customer_name">#</th>
                                    <th class="sort" data-sort="customer_name">{{ trans('Dashboard/classrooms.classroom') }}</th>
                                    <th class="sort" data-sort="email">{{ trans('Dashboard/classrooms.grade') }}</th>
                                    <th class="sort" data-sort="date">{{ trans('Dashboard/classrooms.joinDate') }}</th>
                                    <th class="sort" data-sort="action">{{ trans('Dashboard/classrooms.action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                {{-- index fn --}}
                                @php
                                //  $lan_classroom = App::getLocale()."_classroom";
                                       $i = 1 ;
                                @endphp
                                @foreach($classrooms as $item)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                   <td class="email">{{ $i++}}</td>
                                    <td class="customer_name">{{$item->getTranslation('name',App::getLocale())}}</td>
                                    <td class="email">{{  $item->grade_id }}</td>
                                    <td class="date">{{ $item->created_at }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a class="btn btn-sm btn-info edit-item-btn" href="" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                                    {{-- {{ trans('Dashboard/classrooms.edit') }} --}}
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
               
     <div class="remove">
         <a class="btn btn-sm btn-danger remove-item-btn" href="" data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}">
            <i class="m-nav__link-icon fa fa-trash-o"></i>
        </a>
     </div>
  <!-- Modal -->
    <form action="{{ route('classrooms.destroy', $item) }}" method="POST">
        @csrf
        @method('DELETE')
  <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('Dashboard/classrooms.remove') }} {{ $item->getTranslation('name',App::getLocale()) }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
          </button>
        </div>
        <div class="modal-body">
        {{ trans('Dashboard/classrooms.delete_message').'  '.$item->getTranslation('name',App::getLocale()) }}
        </div>
        <div class="modal-footer">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">{{ trans('Dashboard/classrooms.close') }}</button>

                    <button type="submit" class="btn btn-danger" id="add-btn">{{ trans('Dashboard/classrooms.delete_classroom') }}</button>
                </form>
                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
            </div>
        </div>
      </div>
    </div>
  </div>
    </form>
                                            {{-- ens modal --}}
                                        </div>
                                    </td>
                                </tr>
                                    {{-- update --}}
<form class="tablelist-form" action="{{ route('classrooms.update',$item) }}" method="POST">
    @csrf
    @method('PUT')
<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel2">{{ trans('Dashboard/classrooms.edit').' '.$item->getTranslation('name',App::getLocale()) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" action="" method="">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                        <div class="col-6">
                        <label for="customername-field" class="form-label" ></label>{{ trans('Dashboard/classrooms.en_classroom') }}</label>
                        <input type="text" id="customername-field" name ="en_classroom" class="form-control" placeholder="EN Enter Name" value="{{ $item->getTranslation('name','en') }}"  required="">
                    </div>
                    <div class="col-6">
                        <label for="customername-field" class="form-label">{{ trans('Dashboard/classrooms.ar_classroom') }}</label>
                        <input type="text" id="customername-field" name = "ar_classroom" class="form-control" placeholder="AR Enter Name" value="{{ $item->getTranslation('name','ar') }}"  required="">
                    </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="note-field" class="form-label">{{ trans('Dashboard/classrooms.grade') }}</label>
                     <select class="form-select rounded-pill mb-3" aria-label="Default select example" name='grade'>
                        @php
                            $gradeName = App\Models\Dashboard\Grade::where('id', $item->grade_id)->first('name');
                        @endphp
                        <option selected disabled>{{ $gradeName->getTranslation('name',App::getLocale()) }}</option>
                        @foreach ($grades as $grade )
                        <option value="{{ $grade->id }}">{{ $grade->getTranslation('name',App::getLocale()) }}</option>
                        @endforeach
                            
                      </select>
                </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ trans('Dashboard/classrooms.close') }}</button>

                            <button type="submit" class="btn btn-info" id="add-btn">{{ trans('Dashboard/classrooms.update_classroom') }}</button>
                        </form>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>
            </form>
            {{-- end update --}}

                                @endforeach
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="../../msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $classrooms->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

{{-- create form --}}
<form class="tablelist-form" action="{{route('classrooms.store')}}" method="POST">
    @csrf

<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/classrooms.create_new_classroom') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" action="" method="">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                        <div class="col-6">
                        <label for="customername-field" class="form-label" ></label>{{ trans('Dashboard/classrooms.en_classroom') }}</label>
                        <input type="text" id="customername-field" name ="en_classroom" class="form-control" placeholder="{{ trans('Dashboard/classrooms.placeholderEN') }}"  required>
                    </div>
                    <div class="col-6">
                        <label for="customername-field" class="form-label">{{ trans('Dashboard/classrooms.ar_classroom') }}</label>
                        <input type="text" id="customername-field" name = "ar_classroom" class="form-control" placeholder="{{ trans('Dashboard/classrooms.placeholderAR') }}"  required>
                    </div>
                    </div>
                </div>
                    <div class="mb-3">
                         <div class="row">
                            <div class="col-12">
                        <label for="note-field" class="form-label">{{ trans('Dashboard/classrooms.grade') }}</label>
                         <select class="form-select rounded-pill mb-3" aria-label="Default select example" name="grade">

                            <option selected>Open this select Grade</option>
                            @foreach ($grades as $grade )
                            <option value="{{ $grade->id }}">{{ $grade->getTranslation('name',App::getLocale()) }}</option>
                            @endforeach
                                
                          </select>
                    </div>
                </div>
                </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ trans('Dashboard/classrooms.close') }}</button>

                            <button type="submit" class="btn btn-success" id="add-btn">{{ trans("Dashboard/classrooms.create_classroom") }}</button>
                        </form>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <i class="bi bi-trash3 display-5 text-danger"></i>
                    <div class="mt-4 pt-2 fs-base mx-4 mx-sm-5">
                        <h4>Are you Sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Grade ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-info" data-bs-dismiss="modal">{{ trans('Dashboard/classrooms.close') }}</button>
                    <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->


</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->







</div><!-- end preloader-menu -->



@endsection

@section('script')

@if (Session::has('message'))
<script>
    toastr.success("{{ Session::get('message') }}");
    </script>
@endif
<!-- prismjs plugin -->
<script src="{{asset('dashboard')}}/assets/libs/prismjs/prism.js"></script>
<script src="{{asset('dashboard')}}/assets/libs/list.js/list.min.js"></script>
<script src="{{asset('dashboard')}}/assets/libs/list.pagination.js/list.pagination.min.js"></script>

<!-- listjs init -->
<script src="{{asset('dashboard')}}/assets/js/pages/listjs.init.js"></script>

<!-- Sweet Alerts js -->
<script src="{{asset('dashboard')}}/assets/libs/sweetalert2/sweetalert2.min.js"></script>
@endsection
