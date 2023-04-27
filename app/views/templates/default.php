<!DOCTYPE html>
<html>
    <head>
        <title><?=$title?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
        .text-justify { 
            text-align: justify;
            text-align-last: left;
        }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>
    <body>
        <head>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="?">Простой Todo-list</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Список задач</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=tasks&action=create">Создать задачу</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=account">Профиль</a>
                        </li>
                    </ul>
                </div>
            </div>
            </nav>
        </head>
        
        <div class="container mt-5">
            <?php if($message){ ?>
            <div class="alert alert-primary" role="alert">
                <?=$message?>
            </div>
            <?php } ?>
            <?=$body?>
        </div>
    </body>
</html>