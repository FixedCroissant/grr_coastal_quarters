<!--This is the layout used for front facing area-->
<html>
<head>
    <title>Coastal Quarters Guest Reservation System</title>
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!--Bootstrap Javascript-->
    <script src="{{URL::asset('js/bootstrap.js')}}"></script>
    <!--Application specific CSS-->
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}"/>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}"/>
    <!--Favi Icon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" >
    <!--Set Character Set-->
    <meta charset="UTF-8">
</head>

<div class="container">
<img class="img-responsive" src="{{URL::asset('img/uh_logo.png')}}"/>

@yield('content')


<!--Add Footer to all the pages-->
    <!--Main Footer content-->
    <!-- Bootstrap Boilerplate... -->
    <div class="row">
        <div class="col-md-0">
            &nbsp;
        </div>
        <div class=" col-md-12 panel-footer">
            <!--Display footer at the bottom of every page-->
            Copyright &copy; 2016 <span style="font-weight:bold;">NC State University Housing</span>
            <br/>
            For Guest Reservations - Coastal Quarters support, questions, or feedback, please contact <a href="mailto:jjwill10@ncsu.edu">Josh Williams</a>, Web Developer
        </div>
    </div>



</div>

</html>