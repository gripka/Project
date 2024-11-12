<?php include('layouts/header.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Resultado do Signo</title>
</head>
<body>
    <div class="container mt-5">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data_nascimento = $_POST['data_nascimento'];
            list($dia, $mes) = explode('/', $data_nascimento);
            $signos = simplexml_load_file("signos.xml");
            $signo_usuario = null;
            foreach ($signos->signo as $signo) {
                $dataInicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
                $dataFim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);
                $dataInicio->setDate(2000, $dataInicio->format('m'), $dataInicio->format('d'));
                $dataFim->setDate(2000, $dataFim->format('m'), $dataFim->format('d'));
                $dataNascimento = new DateTime();
                $dataNascimento->setDate(2000, $mes, $dia);
                if ($dataInicio > $dataFim) {
                    if ($dataNascimento >= $dataInicio || $dataNascimento <= $dataFim) {
                        $signo_usuario = $signo;
                        break;
                    }
                } else {
                    if ($dataNascimento >= $dataInicio && $dataNascimento <= $dataFim) {
                        $signo_usuario = $signo;
                        break;
                    }
                }
            }
            if ($signo_usuario) {
                echo "<h2 class='text-center'>Seu Signo é: {$signo_usuario->signoNome}</h2>";
                echo "<p class='text-center'>{$signo_usuario->descricao}</p>";
            } else {
                echo "<h2 class='text-center'>Data de nascimento fora do intervalo dos signos.</h2>";
            }
        }
        ?>
        <div class='text-center mt-4'>
            <a href='index.php' class='btn btn-secondary'>Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2zBFeF3ec6mgaC7DfY2lI1F6/60TLipjHB7x+AMMmvPBfyVka0y59IB7bnr" crossorigin="anonymous"></script>
</body>
</html>



