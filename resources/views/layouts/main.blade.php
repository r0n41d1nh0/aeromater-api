<!doctype html>
<html class="h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aeromater</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap3-typeahead.min.js') }}"></script>
    <style>
      span.twitter-typeahead .tt-menu {
        cursor: pointer;
      }

      .dropdown-menu,
      span.twitter-typeahead .tt-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        font-size: 1rem;
        color: #373a3c;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 0.25rem;
      }

      span.twitter-typeahead .tt-suggestion {
        display: block;
        width: 100%;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.5;
        color: #373a3c;
        text-align: inherit;
        white-space: nowrap;
        background: #fff;
        border: 0;
      }

      span.twitter-typeahead .tt-suggestion:focus,
      .dropdown-item:hover,
      span.twitter-typeahead .tt-suggestion:hover {
        color: #2b2d2f;
        text-decoration: none;
        background-color: #f5f5f5;
      }

      span.twitter-typeahead .active.tt-suggestion,
      span.twitter-typeahead .tt-suggestion.tt-cursor,
      span.twitter-typeahead .active.tt-suggestion:focus,
      span.twitter-typeahead .tt-suggestion.tt-cursor:focus,
      span.twitter-typeahead .active.tt-suggestion:hover,
      span.twitter-typeahead .tt-suggestion.tt-cursor:hover {
        color: #fff;
        text-decoration: none;
        background-color: #0275d8;
        outline: 0;
      }

      span.twitter-typeahead .disabled.tt-suggestion,
      span.twitter-typeahead .disabled.tt-suggestion:focus,
      span.twitter-typeahead .disabled.tt-suggestion:hover {
        color: #818a91;
      }

      span.twitter-typeahead .disabled.tt-suggestion:focus,
      span.twitter-typeahead .disabled.tt-suggestion:hover {
        text-decoration: none;
        cursor: not-allowed;
        background-color: #fff;
        background-image: none;
        filter: "progid:DXImageTransform.Microsoft.gradient(enabled = false)";
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      main > .container {
        padding: 10px 15px 0;
      }

      .dropdown-menu {
        font-size: 12px;
      }
      .table {
        font-size: 13px;
      }
      .table td,th {
        padding: 0.25rem !important;
        vertical-align: middle !important;
      }
      .control-table {
        font-size: 13px;
      }

      .breadcrumb {
        box-shadow: 1px 1px #d5d4d4;
        background: #eeeded;
        border: 1px solid #eeeded;
        border-radius: 5px;
        padding: 0 5px 0 10px !important;
        font-size: 16px;
        line-height:2em;
      }
    </style>
    @yield('content.css')
  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark bg-dark py-0">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('inicio') }}">Aeromater</a>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
               <!-- 
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>-->
            </ul>
            <span class="text-white">Usuario : {{ Auth::user()->name }} | {{ date('d/m/Y') }}</span>&nbsp;&nbsp;
            <a href="{{ route('logout') }}" class="btn btn-light btn-sm" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          </div>
        </div>
      </nav>
    </header>
    
    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container">
        @yield('content')
      </div>
      <br>
    </main>
    
    <footer class="footer mt-auto py-3 bg-light">
      <div class="container text-center">
        <span class="text-center text-muted">&copy;RGA {{ date('Y') }}</span>
      </div>
    </footer>
    
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('content.js')
  </body>
</html>
