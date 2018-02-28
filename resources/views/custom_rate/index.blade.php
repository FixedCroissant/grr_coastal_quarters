@extends('layout.app')
@section('main-content')
@section('htmlheader_title')
@endsection

<!--Main Heading of Page-->
    @section('contentheader_title')
    Current Custom Rate for CMAST System
    <br/>
    @stop
<!--Description of Page-->
    @section('contentheader_description')
    -
    @stop
<!--End Description of Page-->
    <br/>
    <br/>
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
            @if($customRate->count()>=1)
            {!! link_to_route('customRate.create','Create New Rate') !!}
            @else
                Can only have 1 custom rate in the system at a time.
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-condensed">
            <thead>
            <tr>

                    <th>
                     Date Rate Created
                    </th>
                    <th>
                        Rate Name
                    </th>
                    <th>
                        Rate Amount
                    </th>
                    <th>
                        Per Person or Per Room
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete/Remove
                    </th>
            </tr>
            </thead>
            <tbody>
                    @foreach($customRate as $myCustomRate)
                        <tr>
                            <td>
                                {{$myCustomRate->created_at->format("m/d/Y H:i A")}}
                            </td>
                            <td>
                                {{$myCustomRate->rate_name}}
                            </td>
                            <td>
                                {{$myCustomRate->rate_amount}}
                            </td>
                            <td>
                                {{ucfirst($myCustomRate->rate_is_unit_or_person)}}
                            </td>
                            <td>
                                {!! link_to_route('customRate.edit','Edit Rate',$myCustomRate->id) !!}
                            </td>
                            <td>
                                {!!  Form::open(array('route' => array('customRate.destroy', $myCustomRate->id), 'method' => 'delete','style'=>'display:inline','onsubmit' => "return confirm('Are you sure you want to delete this item?')",))  !!}
                                <button type="submit" class="button-look-like-link">Delete</button>
                                {!! Form::close()  !!}
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