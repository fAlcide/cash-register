<?php

// print_r($users);

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
        <div class="header bg-white d-flex justify-content-center align-items-center" style="width: 100%; height: 6%">
            <div class="d-flex justify-content-around align-items-center" style="width: 50%; height: 100%">
                <div class="d-flex justify-content-center"><p>Accueil</p></div>
                <div><h3>Cash - Register</h3></div>
                <div><p>Factures</p></div>
            </div>
        </div>    
        <div class="d-flex justify-content-between" style="height: 94%">

            <!-- FACTURE -->

            <div id="facture" class="" style="height: 100%; width: 35%; color: white">
                <div id="header_facture" class="bg-facture d-flex justify-content-center border-bottom border-dark border-2" style="height:10%; width: 100%;">
                    <div class="w-50 d-flex justify-content-center flex-column">
                        <select id="select_client" class="form-select">
                            <option selected value="0">Client</option>
                            <?php
                                foreach ($users as $key => $value) {?>

                                <option value="<?php echo $value["id"] ?>"><?php echo $value["nom"] . " " . $value["prenom"]; ?></option>
                            
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div id="main_fatcure" class="bg-facture overflow-auto d-flex justify-content-center border-bottom border-dark border-2" style="height: 60%; width:100%;">
                    <div id="table_facture" class="" style="width: 90%;">
                        <table class="w-100 table table-borderless table-striped align-middle" style="">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Produit</th>
                                    <th scope="col">Qte</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col" class="d-flex justify-content-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableau_body_facture">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="footer_facture" class="bg-facture d-flex justify-content-center flex-column align-items-center" style="height: 30%; width: 100%">
                    <div class="d-flex justify-content-center flex-column align-items-center" style="width: 75%">
                        <div class="col-6 d-flex justify-content-between w-100">
                            <p>Nombre de produits : </p>
                            <h5 id="qte_produits">0</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-between w-100">
                            <p>Prix : </p>
                            <h5 id="prix_produits">0€</h5>
                        </div>
                    </div>
                    <div class="row" style="width: 90%;">
                    <div class="col-4"><button type="button" class="btn btn-success w-100" style="" onclick="payer(1)">Carte</button></div>
                        <div class="col-4"><button type="button" class="btn btn-success w-100" onclick="payer(1)">Espèces</button></div>
                        <div class="col-4"><button type="button" class="btn btn-success w-100" onclick="payer(1)">Chèque</button></div>
                    </div>
                    <div class="row" style="width: 90%;">
                    <div class="col-6"><button type="button" class="btn btn-danger w-100" style="" onclick="annuler()">Annuler</button></div>
                        <div class="col-6"><button type="button" class="btn btn-warning w-100" onclick="payer(2)">Archiver</button></div>
                    </div>
                </div>
            </div>

            <!-- PRODUITS -->

            <div id="produits" class="bg-main" style="height: 100%; width: 65%;">
                <div id="header_produits" class="bg-main border-bottom border-dark d-flex justify-content-center flex-column rounded-top" style="height: 10%;">
                    <div class="ms-4" style="width: 30%">
                        <input type="email" class="form-control" id="serach_produit" aria-describedby="" placeholder="Chercher par nom">
                    </div>
                </div>
                <div id="table_produits" class="overflow-auto d-flex justify-content-center w-100" style="height: 90%;">
                    <div class="" style="width: 98%">

                        <?php

                        // for ($i=0; $i < sizeof($matrice_produits); $i++) { 
                        ?>

                        <div class="row row-cols-4">
                            <?php for ($j = 0; $j < sizeof($produits); $j++) { ?>

                                <div class="col" onclick="ajout_produit_facture(<?php echo $produits[$j]['id']; ?>)">
                                    <div class="bg-facture rounded" style="">
                                        <img class="img-fluid rounded" style="" src="default.png" alt="" srcset="">
                                        <div id="footer_produit" class="d-flex flex-column justify-content-center align-items-center">
                                            <p style="color: white; margin: 0;"> <?php echo $produits[$j]["nom"]; ?> </p>
                                            <p style="color: white; margin: 0;"> <?php echo $produits[$j]["prix"]; ?> </p>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>

                        <?php //} 
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>

<script>
    liste_produit_facture_qte = new Map()
    liste_produit_facture = new Map()

    function ajout_produit_facture(id_produit) {
        $.get({
            url: "http://localhost:8888/cash_register/public/produit?id=" + id_produit,
            success: function(produit) {
                ajout_produit_tableau(produit)
            },
        });

    }

    function ajout_produit_tableau(produit) {

        qte = 0

        produit = JSON.parse(produit)

        if (liste_produit_facture_qte.has(produit["id"])) {
            liste_produit_facture_qte.set(produit["id"], liste_produit_facture_qte.get(produit["id"]) + 1)
        } else {
            liste_produit_facture_qte.set(produit["id"], 1)
            liste_produit_facture.set(produit["id"], produit)
        }

        console.log(liste_produit_facture_qte);
        console.log(liste_produit_facture);

        maj_tableau();

    }

    function maj_tableau() {
        $("#tableau_body_facture").empty();

        qte_produits = 0;
        prix_produits = 0;

        for (const [key, value] of liste_produit_facture_qte) {
            qte_produits += value
            prix_produits += value * liste_produit_facture.get(key)["prix"]
            tr = '<tr id="ligne_' + key + '">' +
                '<th scope="row">' + key + '</th>' +
                '<td>' + liste_produit_facture.get(key)["nom"] + '</td>' +
                '<td>' + value + '</td>' +
                '<td>' + liste_produit_facture.get(key)["prix"] + '</td>' +
                '<td class="d-flex justify-content-center"><button type="button" class="btn btn-danger" onclick="retirer_produit_tableau(\'' + key + '\')">X</button></td>' +
                '</tr>'

            $("#tableau_body_facture").append(tr)
        }

        $("#qte_produits").html(qte_produits)
        $("#prix_produits").html(prix_produits + "€")
    }

    function retirer_produit_tableau(id_produit) {

        if (liste_produit_facture_qte.get(id_produit) > 1) {
            liste_produit_facture_qte.set(id_produit, liste_produit_facture_qte.get(id_produit) - 1)
            maj_tableau();
        } else {
            liste_produit_facture_qte.delete(id_produit)
            $("#ligne_" + id_produit).remove();
            maj_tableau()
        }
    }

    function annuler() {
        liste_produit_facture_qte = new Map()
        maj_tableau()
    }

    function payer(paiement) {

        if(liste_produit_facture_qte.size == 0){
            return
        }

        id_client = $("#select_client").val()

        array = Array.from(liste_produit_facture_qte, ([name, value]) => ({
            name,
            value
        }));

        $.post({
            url: "http://localhost:8888/cash_register/public/facture/creerFacture",
            data: {
                id_client: id_client,
                paiement: paiement,
                produits: array
            },
            success: function(data) {
                if(paiement == 1){
                    alert("La commande a été payée !")
                }else if(paiement == 2){
                    alert("La commande a été archivée !")
                }
                liste_produit_facture_qte = new Map()
                maj_tableau();
            },
        });
    }
</script>

<style>
    .row>* {
        padding-left: 0;
        padding-right: 0;
        padding: 10px;
    }

    .bg-facture {
        background-color: #1F1D2B;
    }

    .bg-main {
        background-color: #393C49;
    }

    td {
        color: white;
    }

    th {
        color: white;
    }

    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        color: white;
    }
</style>