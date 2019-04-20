@extends('main.app')
@section('title','Lawceylon show all ratings')
@section('headSection')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Lawyer Ratings</h3>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Specialist Area</th>
                            <th>Lawyer Email</th>
                            <th>Lawyer Name</th>
                            <th width="400px">Star</th>
                            <th width="100px">View</th>
                        </tr>
                        @if($lawyers->count())
                            @foreach($lawyers as $lawyer)
                            <tr>
                                <td>{{$lawyer->Specialist_Area}}
                                <td>{{ $lawyer->Email}}</td>
                                <td>{{ $lawyer->honorific.". ".$lawyer->firstName." ".$lawyer->lastName }}</td>
                                <td>
                                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $lawyer->averageRating }}" data-size="xs" disabled="">
                                </td>
                                <td>
                                    <a href="{{ route('lawyerViewUser',$lawyer->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
