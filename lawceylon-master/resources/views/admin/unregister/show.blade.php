@extends('admin.layouts.app')
@section('headSection')
<link rel="stylesheet" href="{{ asset('admn/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lawyers Table</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> --}}
        </div>
      </div>
      <div class="box-body">
        <div class="box">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Honorific</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>NIC/Passport Number</th>
                  <th>Bar Number</th>
                  {{-- <th>Specialist Area</th>
                  <th>Experience Period</th> --}}
                  <th>Address</th>
                  <th>Phone</th>
                  {{-- <th>Biography</th> --}}
                  <th>Consultation Fee</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lawyers as $lawyer)
                  <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $lawyer->honorific }}</td>
                      <td>{{ $lawyer->firstName }}</td>
                      <td>{{ $lawyer->lastName }}</td>
                      <td>{{ $lawyer->gender }}</td>
                      <td>{{ $lawyer->Email }}</td>
                      <td>{{ $lawyer->NIC_passportNumber }}</td>
                      <td>{{ $lawyer->barnumber }}</td>
                      {{-- <td>{{ $lawyer->Specialist_Area }}</td>
                      <td>{{ $lawyer->Experience_Period }}</td> --}}
                      <td>{{ $lawyer->Address }}</td>
                      <td>{{ $lawyer->TP_Number }}</td>
                      {{-- <td>{{ $lawyer->biography }}</td> --}}
                      <td>{{ $lawyer->consultationFee }}</td>
                      <td><a class="btn btn-success" href="{{ route('unregister.edit',$lawyer->id) }}">View Details</a></td>
                      <td>
                          <form method="post"id="delete-form-{{ $lawyer->id }}" action="{{ route('unregister.destroy',$lawyer->id) }}" style="dispaly: none">
                              {{ csrf_field()}}
                              {{ method_field('DELETE') }}
                          </form>
                          <a href="" onclick=" 
                              if(confirm('Are You Sure,You want to Delete this ?'))
                              {
                                  event.preventDefault();document.getElementById('delete-form-{{ $lawyer->id }}').submit();
                              }
                              else
                              {
                                  event.preventDefault();
                              }"><span class="glyphicon glyphicon-trash"></span>
                          </a>
                      </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Honorific</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>NIC/Passport Number</th>
                  <th>Bar Number</th>
                  {{-- <th>Specialist Area</th>
                  <th>Experience Period</th> --}}
                  <th>Address</th>
                  <th>Phone</th>
                  {{-- <th>Biography</th> --}}
                  <th>Consultation Fee</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('admn/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admn/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection