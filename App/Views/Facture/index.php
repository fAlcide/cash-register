<?php

// print_r($factures);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Cash Register</title>
</head>

<body style="background-color: #D3D3D3; height: 100vh;">
    <div class="main" style="height: 100%">
        <div class="header bg-white" style="width: 100%; height: 3%">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Cash - Register</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="http://localhost:8888/cash_register/public/">Accueil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="http://localhost:8888/cash_register/public/Facture">Factures</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>    

        <div class="d-flex justify-content-between" style="height: 97%">

            <!-- FACTURE -->

            <div id="facture" class="" style="height: 100%; width: 35%; color: white">
                <div id="header_facture" class="bg-facture d-flex justify-content-center border-bottom border-dark border-2" style="height:10%; width: 100%;">
                    <div class="w-50 d-flex justify-content-center flex-column">
                        <h3>Factures</h3>
                    </div>
                </div>
                <div id="main_fatcure" class="bg-facture overflow-auto d-flex justify-content-center border-bottom border-dark border-2" style="height: 90%; width:100%;">
                    <div id="" class="" style="width: 95%;">
                        
                        <?php foreach ($factures as $key => $value) { ?>
                            
                            <div class=" row border rounded d-flex justify-content-center m-2" style="height: 50px;">
                                <div class="col-2"><p> <?php echo ($value["id"]); ?> </p></div>
                                <div class="col-8"><p> <?php echo $value["date_creation"]; ?></p></div>
                                <div class="col-2"><p class="border border-success"><?php echo $value["etat"]; ?></p></div>
                            </div>
                        
                        <?php }  ?>    
                    </div>
                </div>
            </div>

            <!-- PRODUITS -->

            <div id="produits" class="bg-main" style="height: 100%; width: 65%;">
                <div id="header_produits" class="bg-main border-bottom border-dark d-flex justify-content-center flex-column rounded-top" style="height: 10%;">
                </div>
                <div id="table_produits" class="overflow-auto d-flex justify-content-center w-100" style="height: 90%;">
                    <div class="" style="width: 98%">

                        Hello
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>

<script>

</script>

<style>
    .bg-facture{
        background-color: #1F1D2B;
    }

    .bg-main{
        background-color: #393C49;
    }

    td{
        color: white;
    }

    th{
        color: white;
    }

    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        color: white;
    }
    
</style>