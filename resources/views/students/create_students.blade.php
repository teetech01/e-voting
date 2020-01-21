@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Student Profile',
    'activePage' => 'create',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Upload Bulk Record")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('student.store') }}" autocomplete="off" enctype="multipart/form-data" id="bulk_upload_form">
            @csrf
            @include('alerts.success')
              <div class="row">
              </div>

                <div class="row">
                    <div class="col-md-7 pr-1">

                        <div class="form-group input-group">
                            <label>{{__("Upload CSV file")}}</label>

                            <div class="custom-file" style="width: inherit;">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept=".csv">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                @include('alerts.feedback', ['field' => 'file'])
                            </div>
                        </div>

                    </div>
                </div>


              <div class="card-footer ">
                <button type="button" id="bulk_upload_btn" class="btn btn-primary btn-round">{{__('Upload Student Records')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
          <div class="card-header">
            <h5 class="title">{{__("Add Student")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('student.store') }}" enctype="multipart/form-data" autocomplete="on">
                @csrf
                @include('alerts.success')
                @include('alerts.errors')
                <div class="row">
                    <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('full_name') ? ' has-danger' : '' }}">
                        <label>{{__(" Full Name*")}}</label>
                        <input class="form-control {{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="full_name" placeholder="{{ __('Full Name') }}" type="text"  required>
                        @include('alerts.feedback', ['field' => 'full_name'])
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('matric_no') ? ' has-danger' : '' }}">
                        <label>{{__(" Matric No*")}}</label>
                        <input class="form-control {{ $errors->has('matric_no') ? ' is-invalid' : '' }}" placeholder="{{ __('Matric No') }}" type="text" name="matric_no" pattern="[0-9]{10}" required>
                        @include('alerts.feedback', ['field' => 'matric_no'])
                    </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('dues') ? ' has-danger' : '' }}">
                    <label>{{__(" Dues")}}</label>

                    </div>
                    <!-- Paid Dues -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline1" name="dues" value="PAID">
                        <label class="custom-control-label" for="defaultInline1">Paid</label>
                    </div>

                    <!-- UnPaid Dues -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline2" name="dues" value="UNPAID">
                        <label class="custom-control-label" for="defaultInline2">Unpaid</label>
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{__(" Password")}}</label>
                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('password') }}" type="password" name="password">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">

                            <div class="form-group input-group">

                                <label>{{__("Upload Picture")}}</label>

                                <div class="custom-file" style="width: inherit;">
                                    <input type="file" name="picture" class="custom-file-input" id="student_picture"
                                    aria-describedby="inputGroupFileAddon01" accept="image/*">
                                    <label class="custom-file-label" for="student_picture">Choose Picture</label>
                                    @include('alerts.feedback', ['field' => 'picture'])
                                </div>

                            </div>

                    </div>
                </div>

                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary btn-round ">{{__('Add Student')}}</button>
                </div>
            </form>
        </div>
      </div>
    </div>



    </div>
  </div>
@endsection

@push('js')
<script>
$(function(){
    $("#bulk_upload_btn").on("click", function(){
        $("#bulk_upload_form").submit();
    });
});
</script>
@endpush
