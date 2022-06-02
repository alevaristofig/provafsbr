<!DOCTYPE html>
<html>
    <head>
        <title>Crud-Test</title>
        <meta charset="UTF-8">        
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('css/api.css')}}" rel="stylesheet">
    </head>
    <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Crud Test</a>            
    </header>

    <article>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home" class="align-text-bottom"></span>
                             <a href="{{url('api/crud-test')}}" class="btn btn-info">Cadastro</a>
                            </a>
                        </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </article>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            @yield('conteudo')  
        </div>
    </main>          

        <script src="{{asset('js/bootstrap.js')}}" type="javascript"></script>
    </body>
</html>