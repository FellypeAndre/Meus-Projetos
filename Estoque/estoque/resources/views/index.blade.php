<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bem-vindo à ASEC</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .content-wrapper {
            background-color: #f8f9fc;
            padding: 20px;
            margin-left: 250px; /* Adjust for sidebar */
        }

        .main-content {
            padding: 50px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .main-content h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .sidebar {
            background-color: #4e73df;
        }

        .sidebar a {
            color: white;
        }

        .sidebar a:hover {
            background-color: #2e59d9;
        }

        .welcome-message {
            font-size: 1.5rem;
            color: #4e73df;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ASEC</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Início</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('cadastro') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Cadastro de Produto</span>
                </a>
                <a class="nav-link collapsed" href="{{ route('tabela') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabela de Produto</span>
                </a>
                
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- User Info -->
            <li class="nav-item">
                @if (Auth::check())
                    <span class="nav-link text-white welcome-message">Bem-vindo, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn">Sair</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Login</span>
                    </a>
                @endif
            </li>

        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div class="content-wrapper">
                <div class="main-content">
                    <h1>Bem-vindo à ASEC</h1>
                    <p>Nosso site foi desenvolvido para proporcionar a melhor experiência no gerenciamento de produtos. Navegue por nossas páginas e conheça os detalhes do nosso sistema, aproveitando os recursos oferecidos, como o cadastro e a visualização de produtos de forma rápida e eficiente.</p>

                    <h2>Sobre Nós</h2>
                    <p>A ASEC é uma empresa comprometida com a excelência, oferecendo ferramentas para a gestão de estoque e controle de produtos. Nosso objetivo é simplificar processos e garantir que sua experiência conosco seja a melhor possível.</p>

                    
                </div>
            </div>
            <!-- End Main Content -->

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
