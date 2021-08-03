<html>

<head>
    <title>App Name - @yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

 <style>
     ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:#ce70b7eb;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none !important ;
}

li a:hover:not(.active) {
  background-color :Gray;
}

.active {
  background-color: #04AA6D;
}
 </style>


</head>

<body>






    <div class="container">
        <ul>
            @if ( ! Auth::check())
            <li> <a  class="{{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a> </li>
            @else
            <li><a  class="{{ (request()->is('companies*')) ? 'active' : '' }}"  href="{{ url('companies') }}">Companye</a></li>
            <li><a class="{{ (request()->is('employees*')) ? 'active' : '' }}"  href="{{ url('employees') }}">Employee</a></li>

            <li> <a  class="{{ (request()->is('logout')) ? 'active' : '' }}" href="{{ route('logout') }}" class="text-sm text-gray-700 underline">Log Out</a> </li>
            @endif
          </ul>
        @yield('content')
    </div>

</body>

</html>
