
<?php
require_once 'carregarArquivos.php';
$dir = new CarregarArquivos;
$dir->getPastas();
$pastas = $dir->getPastas();
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formatação Json</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" id="containerForm">
    <form action="main.php" method="post">
        <h3 align="center">Formatar Json</h3>
        <select name="opcoes" class="form-select" aria-label="Default select example">
            <option selected>Selecione</option>
            <?php foreach ($pastas as $pasta): ?>
                <option value="<?php echo $pasta; ?>" ><?php echo $pasta; ?></option>
            <?php endforeach; ?>
        </select>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit">Formatar</button>
        </div>
    </form> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

