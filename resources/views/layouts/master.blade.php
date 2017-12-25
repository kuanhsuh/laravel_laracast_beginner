<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Blog Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="/css/app.css" rel="stylesheet">
</head>

<body>
  @include('layouts.nav')

  @if ($flash = session('message'))
  <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
    {{ @flash }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  <div class="blog-header">
    <div class="container">
      <h1 class="blog-title">The Bootstrap Blog</h1>
      <p class="lead blog-description">An example blog template built with Bootstrap.</p>
    </div>
  </div>
  <main role="main" class="container">

    <div class="row">

      @yield('content')
      @include('layouts.sidebar')
    </div>
    <!-- /.row -->
  </main>
  <!-- /.container -->
  @include('layouts.footer')
</body>

</html>

