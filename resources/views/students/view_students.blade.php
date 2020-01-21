@extends('layouts.app', [
    'namePage' => 'All Student',
    'class' => 'sidebar-mini',
    'activePage' => 'index',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> All Student</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="datatable"  class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th class="th-sm">
                    Matric No
                  </th class="th-sm">
                  <th class="th-sm">
                    Full Name
                  </th>
                  <th class="th-sm">
                    Nacoss Dues
                  </th>
                  <th class="th-sm">
                    Post
                  </th>
                  <th class="th-sm">

                  </th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>
                            {{$student->matric_no}}
                        </td>
                        <td>
                            {{$student->full_name}}
                        </td>
                        <td>
                            {{$student->dues}}
                        </td>
                        <td>
                            {{$student->post->title ?? __('--')}}
                        </td>
                        <td class="text-right">
                            <a href="{{url('student/'.$student->id.'/edit')}}" class="btn btn-primary btn-round ">{{__('Edit')}}</a>
                            <a href="{{url('student/'.$student->id)}}" class="btn btn-primary btn-round " disabled>{{__('Delete')}}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('js')
<script>
$(function () {
    $('#datatable').DataTable();
    $('.dataTables_length').addClass('bs-select');
});
</script>
@endpush
