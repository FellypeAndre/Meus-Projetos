<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cursos</title>
    <link rel="stylesheet" href="CSS/cabecalho.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const trabalhosMenu = document.getElementById('trabalhos-menu');
            const dropdownMenu = trabalhosMenu.nextElementSibling;

            trabalhosMenu.addEventListener('click', function(e) {
                e.preventDefault();

                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                } else {
                    dropdownMenu.classList.add('show');
                }
            });

            document.addEventListener('click', function(e) {
                if (!trabalhosMenu.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>

</head>

<body>
    <header class="cabecalho">
        <div class="logo">
            <a href="index.php"><img src="logo.png" alt="Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" id="menu">Home</a></li>
                <li class="dropdown">
                    <a href="#" id="trabalhos-menu">Trabalhos</a>
                    <ul class="dropdown-menu">
                        <li><a href="cadastrar_aluno.php">Cadastrar Aluno</a></li>
                        <li><a href="cadastrar_curso.php">Cadastrar Curso</a></li>
                        <li><a href="listar_alunos.php">Listar Alunos</a></li>
                        <li><a href="listar_cursos.php">Listar Cursos</a></li>
                        <li><a href="matricula_aluno.php">Matricular Aluno</a></li>
                        <li><a href="matriculados.php">Alunos Matriculados</a></li>
                    </ul>
                </li>
                <li><a href="#sobre-nos" id="menu">Sobre Nós</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h1>Bem-vindo ao Sistema de Cursos!</h1>
            <p>Estamos empolgados em ter você aqui! Explore nosso sistema para gerenciar cursos e alunos de forma fácil e eficiente. Se você é novo por aqui, não se esqueça de conferir nossas seções para cadastro e listagem de cursos e alunos. Vamos juntos fazer a diferença na educação!</p>
        </section>

        <section id="trabalhos">
            <h2>Trabalhos</h2>
            <p>Confira os nossos trabalhos e projetos.</p>
        </section>

        <section id="sobre-nos">
            <h2>Sobre Nós</h2>
            <p>Somos uma equipe apaixonada por educação e tecnologia, dedicados a criar soluções inovadoras para o gerenciamento de cursos e alunos. Nosso objetivo é fornecer uma plataforma intuitiva e eficaz, que ajude instituições de ensino a alcançarem seus objetivos educacionais com mais facilidade. Com anos de experiência no setor, estamos aqui para oferecer suporte e soluções de qualidade para suas necessidades acadêmicas.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Cursos. Todos os direitos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>
