<!-- resources/views/sobre.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded">
                <div class="row no-gutters">
                    <!-- Imagem -->
                    <div class="col-md-6">
                        <img src="{{ asset('images/sobre-nos.jpg') }}" class="card-img" alt="Sobre o Sistema">
                    </div>
                    <!-- Texto -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <h2 class="card-title">Sobre o Sistema</h2>
                            <p class="card-text">
                                O Sistema ASEC foi desenvolvido para gerenciar o estoque de produtos de maneira eficiente e simplificada. Com a nossa plataforma, você pode cadastrar, editar, visualizar e excluir produtos com facilidade. Além disso, oferecemos um dashboard que exibe informações úteis sobre a disponibilidade dos itens em tempo real.
                            </p>
                            <p class="card-text">
                                A interface foi pensada para ser intuitiva e fácil de usar, permitindo que até mesmo usuários sem experiência técnica possam gerenciar o estoque de forma eficaz.
                            </p>
                            <p class="card-text">
                                Nosso objetivo é tornar o gerenciamento de estoque mais acessível e rápido, oferecendo aos nossos usuários uma solução moderna e eficiente para seu negócio.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
