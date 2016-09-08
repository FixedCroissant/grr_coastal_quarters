@extends('app')

@section('htmlheader_title')
    Home
@endsection
<!--Main Heading of Page-->
@section('contentheader_title')
	Main Landing Page
	<br/>
@stop

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!

					<br/>
					<br/>
					Please check <SPAN style="font-weight:bold;">current reservations</SPAN> to your left.
					<br/>
					<br/>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
