@extends('dashboard.layouts.master')
@section('title','School Sections')
@section('css')
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
                        <h4 class="mb-sm-0">{{ trans('Dashboard/sections.sections') }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ trans('Dashboard/sections.sections') }}</a></li>
                                <li class="breadcrumb-item active">{{ trans('Dashboard/sections.viewSections') }}</li>
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
                <h4 class="card-title mb-0">{{ trans('Dashboard/sections.addSections') }}</h4>
            </div><!-- end card header -->
           
            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <a class="btn btn-success add-btn" href="{{ route('sections.create') }}" data-bs-toggle="modal" data-bs-target="#showModal">{{ trans('Dashboard/sections.addSection') }}</a>
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
                                    <th class="sort" data-sort="section_id"># </th>
                                    <th class="sort" data-sort="section_name">{{ trans('Dashboard/sections.section') }}</th>
                                    <th class="sort" data-sort="section_icon">{{ trans('Dashboard/sections.icon') }}</th>
                                    <th class="sort" data-sort="section_sub_of">{{ trans('Dashboard/sections.sub_of') }}</th>
                                    <th class="sort" data-sort="section_sub_of">{{ trans('Dashboard/sections.type') }}</th>
                                    <th class="sort" data-sort="section_link">{{ trans('Dashboard/sections.link') }}</th>
                                    <th class="sort" data-sort="section_order">{{ trans('Dashboard/sections.order') }}</th>
                                    <th class="sort" data-sort="section_trash">{{ trans('Dashboard/sections.hidden') }}</th>
                                    <th class="sort" data-sort="section_date">{{ trans('Dashboard/sections.joinDate') }}</th>
                                    <th class="sort" data-sort="section_action">{{ trans('Dashboard/sections.action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                {{-- index fn --}}
                                @php
                                //  $lan_section = App::getLocale()."_section";
                                       $i = 1 ;
                                @endphp
                                @foreach($sections as $item)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>  
                                    <td class="section_id">{{ $i++ }}</td>
                                    <td class="section_name">{{ $item->name }}</td>
                                    <td class="section_icon">{{ $item->icon ?? " no icon " }}</td>
                                    <td class="section_sub_of"> {{ getSectionName($item->sub_of) }} </td>
                                    <td class="section_trash">{{  $item->type }}</td>
                                    <td class="section_link">{{ $item->link ?? "no link"}}</td>
                                    <td class="section_order">{{  $item->order }}</td>
                                    <td class="section_trash">{{  $item->trash }}</td>
                                    <td class="section_date">{{ $item->created_at }}</td>
                                    <td class="section_action">
                                         
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a class="btn btn-sm btn-info edit-item-btn" href="{{ route('sections.edit',$item->id) }}" data-bs-toggle="modal" data-bs-target="#showModal">{{ trans('Dashboard/sections.edit') }}</a>
                                                {{-- <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button> --}}
                                            </div>
                                            <div class="remove">
                                                <form action="{{ route('sections.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                                    @csrf
                                                    @method('DELETE')
                                                     <button class="btn btn-sm btn-danger remove-item-btn" type="submit">
                                                        {{ trans('Dashboard/sections.remove') }}
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
                        {{ $sections->links('pagination::bootstrap-5') }}
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
<form class="tablelist-form" action="{{route('sections.store')}}" method="POST"> 
    @csrf
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Create Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" action="" method=""> 
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                        <div class="col-6">
                        <label for="customername-field" class="form-label" >{{ trans('Dashboard/sections.en_section') }}</label>
                        <input type="text" id="customername-field" name ="en_section" class="form-control" placeholder="{{ trans('Dashboard/sections.placeholderEN') }}"  required>
                    </div>
                    <div class="col-6">
                        <label for="customername-field" class="form-label">{{ trans('Dashboard/sections.ar_section') }}</label>
                        <input type="text" id="customername-field" name = "ar_section" class="form-control" placeholder="{{ trans('Dashboard/sections.placeholderAR') }}"  required>
                    </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                    <div class="col-4">
                    <label for="customername-field" class="form-label" ></label>{{ trans('Dashboard/sections.sub_of') }}</label>
                    {{-- <input type="text" id="customername-field" name ="sub_of" class="form-control" placeholder="{{ trans('Dashboard/sections.sub_of') }}"  > --}}
                    <select class="form-control m-input" name="sub_of" id="sub_of" >
                        <option selected disabled> Choose Section Sub Of</option>
                        @foreach($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                
               </select>
                </div>
                <div class="col-4">
                    <label for="customername-field" class="form-label">{{ trans('Dashboard/sections.type') }}</label>
                    <select class="form-control m-input" name="type" id="type" required>
                              <option selected disabled> Choose Section Type</option>
                             <option value="0">Section</option>
                             <option value="1">Sub Section</option>
                     </select>
                  
                    {{-- <input type="text" id="customername-field" name = "trash" class="form-control" placeholder="{{ trans('Dashboard/sections.trash') }}"  required> --}}
                </div>
                <div class="col-4">
                    <label for="customername-field" class="form-label">{{ trans('Dashboard/sections.link') }}</label>
                    <input type="text" id="customername-field" name = "link" class="form-control" placeholder="{{ trans('Dashboard/sections.link') }}"  >
                </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                <div class="col-4">
                <label for="customername-field" class="form-label" ></label>{{ trans('Dashboard/sections.order') }}</label>
                <input type="text" id="customername-field" name ="order" class="form-control" placeholder="{{ trans('Dashboard/sections.order') }}"  required>
            </div>
            <div class="col-4">
                <label for="customername-field" class="form-label">{{ trans('Dashboard/sections.shown') }}</label>
                <select class="form-control m-input" name="trash" id="trash" required>
                          <option selected disabled> Choose Section Display</option>
                         <option value="0">Shown</option>
                         <option value="1">Hidden</option>
                 </select>
              
            </div>
            <div class="col-4">
                <label for="customername-field" class="form-label">{{ trans('Dashboard/sections.icon') }}</label>
                <input type="text" id="customername-field" name = "icon" class="form-control" placeholder="{{ trans('Dashboard/sections.icon') }}"  >
            </div>
            </div>
        </div> 

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ trans('Dashboard/sections.close') }}</button>
                        
                            <button type="submit" class="btn btn-success" id="add-btn">{{ trans("Dashboard/sections.create_section") }}</button>
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
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Section ?</p>
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