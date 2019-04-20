@extends('admin.layouts.app')
@section('headSection')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $lwyrs }}<sup style="font-size: 20px"></sup></h3>
                            <p>Registered Lawyers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $usrs }}</h3>
                            <p>Registered Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $unregistrd }}</h3>
                            <p>Unregistered Lawyers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-man"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $lmessage }}</h3>
                            <p>Messages From Registered Lawyers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('lawyerMessages.index') }}" class="small-box-footer">See All<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $umessage }}</h3>
                            <p>Messages From Registered Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('userMessages.index') }}" class="small-box-footer">See All<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>{{ $cmessage }}</h3>
                        <p>Messages From Unregistered Users</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('clientMessages.index') }}" class="small-box-footer">See All<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th><h3>Date :-</h3></th>
                        <th><h3>{{  date('M j,Y',strtotime(Carbon\Carbon::now())) }}</h3></th>
                    </tr>
                </thead>
            </table>
            <table>
                <thead>
                    <tr>
                        <th><h3>Time :-</h3></th>
                        <th><h3>{{  date('H:i',strtotime(Carbon\Carbon::now())) }}</h3></th>
                    </tr>
                </thead>
            </table>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('footerSection')
@endsection