<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro - Sistema</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <!-- Coluna do formulário -->
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cadastrar Novo Usuário</h1>
                            </div>

                            <!-- Formulário de Cadastro -->
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name" placeholder="Nome" value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="Senha" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Confirmar Senha" required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Cadastrar
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Já tem uma conta? Faça login</a>
                            </div>
                        </div>
                    </div>

                    <!-- Coluna da imagem -->
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/undraw_profile.svg') }}" alt="Imagem de Cadastro" class="img-fluid" style="max-width: 80%; height: auto;">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
