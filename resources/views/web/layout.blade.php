<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css')}}/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css')}}/all.min.css">
        @yield('styles')
    </head>
    <body>
        <!-- Responsive navbar-->
        <form id="formLogout" action="{{route('logout')}}" method="post">
            @csrf
        </form>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">My Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item ml-4"><a class="nav-link" href="{{route('add-post')}}">Add Post</a></li>
                        
                        <li class="nav-item">
                            <button class="btn btn-secondary" form="formLogout" type="submit">logout</button>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <main class="custom">

        
         @yield('main')

        </main>
        <!-- Footer-->
        <footer class="py-5 bg-dark ">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js')}}/scripts.js"></script>
        <script src="{{asset('js')}}/all.min.js"></script>
        <script src="{{asset('js')}}/jquery-3.6.0.min.js"></script>
        @yield('scripts')
    </body>
</html>
