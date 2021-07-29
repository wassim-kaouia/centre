<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="">
  
  <meta name="author" content="DevWas">

  <title>@yield('title') - Green City Centre</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  @yield('css_files')

</head>

<body id="top-header">
@if(Session::has('message'))
<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
@include('layouts_front.head')
@yield('content')

@include('layouts_front.footer')

@yield('scriptjs')
</body>
</html>
   