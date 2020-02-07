<!DOCTYPE html>

<html lang="en">
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Moderna Bootstrap Template - Index</title>

  <meta content="" name="keywords">
<head>
@include('layouts.styles')
</head>

<body>

  <!-- ======= Header ======= -->
@include('layouts.header')

  @yield('content')
  

  <!-- ======= Footer ======= -->
  @include('layouts.footer')

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  	
@include('layouts.scripts')


</body>

</html>



