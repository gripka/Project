<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include('layouts/header.php');?>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Descubra seu Signo</h1>
        <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="text" id="data_nascimento" name="data_nascimento" class="form-control" 
                    placeholder="dia/mês" pattern="\d{2}/\d{2}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Consultar Signo</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2zBFeF3ec6mgaC7DfY2lI1F6/60TLipjHB7x+AMMmvPBfyVka0y59IB7bnr" crossorigin="anonymous"></script>

    <script>
        document.getElementById('data_nascimento').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); 
            if (value.length <= 2) {
                e.target.value = value; 
            } else if (value.length <= 4) {
                e.target.value = value.slice(0, 2) + '/' + value.slice(2); 
            } else {
                e.target.value = value.slice(0, 4); 
            }
        });
    </script>
</body>
</html>





