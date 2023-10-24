@extends('dashboard.layouts.master')
@section('title','Add Grade')

@section('content')
<div class="main-content">
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Grade</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Grades</a></li>
                            <li class="breadcrumb-item active">Create Grade</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="#!">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4">
                            <h5 class="card-title mb-3">Grade Information</h5>
                        </div><!--end col-->
                        
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <label for="en_grade" class="form-label">EN Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="en_grade" placeholder="en name" value="{{$grade->en_grade}}" required="">
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div>
                                        <label for="ar_grade" class="form-label">AR Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="ar_grade" placeholder="ar name" value="{{$grade->ar_grade}}" required="">
                                    </div>
                                </div><!--end col-->
                               
                               
                                <div class="col-lg-12">
                                    <div>
                                        <label for="shortDecs" class="form-label">Short Note</label>
                                        <textarea class="form-control" id="shortDecs" value="{{$grade->note}}" placeholder="Must enter minimum of a 150 characters" rows="3"></textarea>
                                    </div>
                                </div><!--end col-->
                               <!--end col-->
                            </div><!--end row-->
                        <!--end col-->
                    </div><!--end row-->
                </div>
            </div>
           
        </form>

    </div>
    <!-- container-fluid -->
</div>
</div>
@endsection
@section('js')
<script src="assets/js/pages/learning-instructor-create.init.js"></script>
@endsection