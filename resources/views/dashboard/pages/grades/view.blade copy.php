@extends('dashboard.layouts.master')
@section('title','School Grades')
@section('css')

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
                        <h4 class="mb-sm-0">Grades</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Grades</a></li>
                                <li class="breadcrumb-item active">view grades</li>
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
                <h4 class="card-title mb-0">Add, Edit & Remove Grades</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                {{-- <a type="button" href="{{ route('grades.create') }}" class="btn btn-info add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add Grade</a> --}}
                                <button  class="btn btn-info add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal1"><i class="ri-add-line align-bottom me-1"></i> Add Grade</button>
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

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="customer_name">Grade</th>
                                    <th class="sort" data-sort="email">Note</th>
                                    <th class="sort" data-sort="date">Joining Date</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($grades as $grade)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                        
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                   @php
                                       $lan_grade = App::getLocale()."_grade";
                                   @endphp
                                    <td class="customer_name">{{$grade->$lan_grade}}</td>
                                    <td class="email">{{  $grade->note }}</td>
                                    <td class="date">{{ $grade->created_at }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                {{-- edit form --}}
                                                <a  href="{{ route('grades.edit',$grade->id) }}"  class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal2">Edit</a>
                                                {{-- <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModa2">Edit</button> --}}

                                            </div>
                                            <div class="remove">
                                                <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                                    @csrf
                                                    @method('DELETE')
                                                     <button class="btn btn-sm btn-danger remove-item-btn" type="submit">
                                                        Remove
                                                    </button>
                                                </form>
                                                <i class="m-nav__link-icon fa fa-trash-o"></i>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
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
                        {{ $grades->links('pagination::bootstrap-5') }}
                        </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
        
            
            <form action="{{ route('grades.update',$grade) }}" method="POST">
                {{-- <form action="{{ $action }}" method="POST"> --}}
                @csrf
            @method('PUT')
            <div class="modal fade" id="showModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Grade</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form class="tablelist-form">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <div class="row">
                                    <div class="col-6">
                                    <label for="en_grade" class="form-label" >EN Grade Name</label>
                                    <input type="text" id="en_grade" name ="en_grade" class="form-control" placeholder="EN Enter Name" value="{{ $grade->en_grade }}" required>
                                </div>
                                <div class="col-6">
                                    <label for="ar_grade" class="form-label">AR Grade Name</label>
                                    <input type="text" id="ar_grade" name = "ar_grade" class="form-control" placeholder="AR Enter Name" value="{{ $grade->ar_grade }}" required>
                                </div>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label">Notes</label>
                                    <textarea type="text" id="note" name="note" class="form-control" placeholder="Enter notes" required>{{ $grade->note }}</textarea>
                                    
                                </div>
            
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    
                                        <button type="submit" class="btn btn-success" id="add-btn">Update grade</button>
                                    </form>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
            
<form action="{{route('grades.store') }}" method="POST">
    @csrf

    <div class="modal fade" id="showModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Grade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form class="tablelist-form">
                    <div class="modal-body">

                   

                    <div class="mb-3">
                        <div class="row">
                        <div class="col-6">
                        <label for="en_grade" class="form-label" >EN Grade Name</label>
                        <input type="text" id="en_grade" name ="en_grade" class="form-control" placeholder="EN Enter Name" value="{{ $grade->en_grade }}" required>
                    </div>
                    <div class="col-6">
                        <label for="ar_grade" class="form-label">AR Grade Name</label>
                        <input type="text" id="ar_grade" name = "ar_grade" class="form-control" placeholder="AR Enter Name" value="{{ $grade->en_grade }}" required>
                    </div>
                    </div>
                </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Notes</label>
                        <textarea type="text" id="note" name="note" class="form-control" placeholder="Enter notes" required>{{ $grade->note }}</textarea>
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add grade</button>
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
                    <button type="button" class="btn w-sm btn-info" data-bs-dismiss="modal">Close</button>
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

@section('js')
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