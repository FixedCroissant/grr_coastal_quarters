@extends('app')
@section('main-content')
@section('htmlheader_title')
    List of Users
@endsection

<!--Main Heading of Page-->
    @section('contentheader_title')
    All Users for CMAST System
    <br/>
    @stop
<!--Description of Page-->
    @section('contentheader_description')
    Below are all the current Users.
    @stop
<!--End Description of Page-->
    <br/>
    <br/>
    <div class="row">
        <div class="col-md-12">
           &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-condensed">
            <thead>
            <tr>

                    <th>
                        Account Created
                    </th>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        E-Mail (Log-In)
                    </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $myUsers)
                <tr>
                    <td>
                        {{$myUsers->created_at}}
                    </td>
                    <td>
                        {{$myUsers->id}}
                    </td>
                    <td>
                        {{$myUsers->name}}
                    </td>
                    <td>
                        {{$myUsers->email}}
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