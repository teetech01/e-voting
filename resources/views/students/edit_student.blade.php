@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Student Profile',
    'activePage' => 'profile',
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
            <h5 class="title">{{__("Edit Student Record")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data" autocomplete="on">
                @method('put')
                @csrf
                @include('alerts.success')
                @include('alerts.errors')
                <div class="row">
                    <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('full_name') ? ' has-danger' : '' }}">
                        <label>{{ __(" Full Name*")}}</label>
                        <input class="form-control {{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="full_name" placeholder="{{ __('Full Name') }}" type="text" value="{{$student->full_name ??''}}"  required>
                        @include('alerts.feedback', ['field' => 'full_name'])
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('matric_no') ? ' has-danger' : '' }}">
                        <label>{{__(" Matric No*")}}</label>
                        <input class="form-control {{ $errors->has('matric_no') ? ' is-invalid' : '' }}" placeholder="{{ __('Matric No') }}" type="text" name="matric_no" pattern="[0-9]{10}" value="{{$student->matric_no ?? ''}}" required>
                        @include('alerts.feedback', ['field' => 'matric_no'])
                    </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('dues') ? ' has-danger' : '' }}">
                    <label>{{__(" Dues (Optional)")}}</label>

                    </div>
                    <!-- Paid Dues -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline1" name="dues" value="PAID" @if($student->dues == 'PAID') checked @endif>
                        <label class="custom-control-label" for="defaultInline1">Paid</label>
                    </div>

                    <!-- UnPaid Dues -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline2" name="dues" value="UNPAID" @if($student->dues == 'UNPAID') checked @endif>
                        <label class="custom-control-label" for="defaultInline2">Unpaid</label>
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{__(" Password (Optional)")}}</label>
                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('password') }}" type="text" name="password" readonly> <button id="generate_password" class="btn btn-primary btn-round ">{{__('Generate Password')}}</button>
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">

                            <div class="form-group input-group">

                                <label>{{__("Upload Picture (Optional)")}}</label>

                                <div class="custom-file" style="width: inherit;">
                                    <input type="file" name="picture" class="custom-file-input" id="student_picture"
                                    aria-describedby="inputGroupFileAddon01" accept="image/*">
                                    <label class="custom-file-label" for="student_picture">Choose Picture</label>
                                    @include('alerts.feedback', ['field' => 'picture'])
                                </div>

                            </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{__(" Post (Optional)")}}</label>
                        <select class="browser-default custom-select" name="political_post_id">
                            <option value="" selected>Choose your option</option>
                            @foreach($posts as $post)
                                <option value="{{$post->id}}" @if($post->id == $student->political_post_id) selected @endif>{{$post->title}}</option>
                            @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'post'])
                    </div>
                    </div>
                </div>

                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary btn-round ">{{__('Save')}}</button>
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
    $("#generate_password").on("click", function(e){
        e.preventDefault();
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < 6; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        $('[name="password"]').val(result);

    });
});
</script>
@endpush
