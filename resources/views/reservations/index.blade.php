@extends('layout.app')
<!--Layout.Master Front Page-->
@section('main-content')


@section('htmlheader_title')
    List of Reservations
@endsection

<!--Main Heading of Page-->
    @section('contentheader_title')
    All reservations for CMAST
    <br/>
    @stop
<!--Description of Page-->
    @section('contentheader_description')
    Below are all the current requested reservations for CMAST.
    @stop
<!--End Description of Page-->
    <br/>
    <br/>
    <!--Add any Script-->
    @section('custom-scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(function() {
            $('#reservationList').DataTable();
        } );
    </script>
    @endsection
<!--Messages Page-->
    <div class="row">
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
    </div>
    <!--Errors Page-->
    <div class="row">
        @if($errors->has())
            <div class="col-md-12 alert-danger">
                <h4><STRONG>Whoops!</STRONG> There appears to be problems with your reservation.</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <div>{{ $error }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-condensed" id="reservationList">
            <thead>
            <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Date/Time <br/>
                        Submitted
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Check-In
                    </th>
                    <th>
                        Check-Out
                    </th>
                    <th>
                        Total Days
                    </th>
                    <th>
                        Total Guests Indicated
                    </th>
                    <th>
                        Total Charged
                    </th>
                    <th>
                        Update Status & Charges
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $myReservations)
                <tr>
                    <td>
                        {{$myReservations->id}}
                    </td>
                    <td>

                        @if($myReservations->status=="New")
                        <span style="color:green; font-weight:bold;">{{$myReservations->status}}</span>
                        @elseif($myReservations->status=="Denied")
                            <span style="color:red">{{$myReservations->status}}</span>
                        @else
                        {{$myReservations->status}}
                        @endif
                    </td>
                    <td>
                       {{$myReservations->created_at ->format('m/d/Y g:i a')}}
                    </td>
                    <td>
                        {{$myReservations->l_name}}, {{$myReservations->f_name}}
                    </td>
                    <td>
                        {{$myReservations->arrival_date}}
                    </td>
                    <td>
                        {{$myReservations->departure_date}}
                    </td>
                    <td>
                        <?php
                        $arrival = new Carbon($myReservations->arrival_date);
                        $departure = new Carbon($myReservations->departure_date);
                        $difference = ($arrival->diff($departure)->days < 1)
                                //IF NO DIFFERENCE
                                ? 'No difference in days'
                                : $arrival->diffInDays($departure);
                        ?>
                        {{$difference}}
                    </td>
                    <td>
                        {{$myReservations->number_of_guests}}
                    </td>
                    <td>
                        {{$myReservations->total_charge}}
                    </td>
                    <td>
                        <a href="{{Request::root()}}/reservation/{{$myReservations->id}}/charges">Update Charges</a>
                    </td>
                    <td>
                        <a href="{{Request::root()}}/reservation/{{$myReservations->id}}/edit">Edit</a>
                    </td>
                    <td>
                        <form action="{{ URL::route('reservation.destroy',$myReservations->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button onclick = "areYouSure()"class="button-look-like-link">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

            </table>
        </div>
    </div>
    <!--Blank row-->
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
@stop


@stop