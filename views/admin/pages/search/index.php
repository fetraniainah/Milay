<?php

use App\Milay\Utils\SessionMaker;

 get_files('components/header');
 $user = $result["user"];
 $article = $result["article"];
 $categorie = $result["categorie"];
  ?>
<div class="row w-100 mx-auto">

    <!----------------------------Sidebar-------------------------->
    <?php get_files('components/sidebar'); ?>


    <!----------------------------Main container-------------------------->
    <div class="col mx-auto p-0 m-0  dashbord dash">
        <!----------------------------Navbar-------------------------->
        <?php get_files('components/navbar'); ?>
        <style>
        .borders {
            border: 1px solid black;
        }

        img {
            object-fit: contain;
        }
        </style>
        <div class="conatiner">

            <div class="row py-5">
                <div class="col-10 mx-auto text-white rounded-3">
                    <div class=" px-5 py-3 d-flex justify-content-center text-white align-items-center">
                        <h3 class="text-white">résultat</h3>
                    </div>
                    <?php if(count($user)>0): ?>
                    <p class="bg-primary rounded-3 text-center fs-3 fw-bold"> Utilisateur : </p>
                    <?php foreach($user as $u): ?>
                    <div class="p-2 bg-secondary rounded-3 mb-2">
                        <p class="p-0 m-0">Nom d'utilisateur : <?= $u["username"] ?></p>
                        <p class="p-0 m-0">Adresse email : <?= $u["email"] ?></p>

                    </div>
                    <?php endforeach ?>
                    <?php endif ?>



                    <?php if(count($article)>0): ?>
                    <p class="bg-info rounded-3 text-center fs-3 fw-bold"> Article : </p>
                    <?php foreach($article as $a): ?>
                    <a href="/admin/article/show/<?= $a->id ?>" class="text-white" style="text-decoration:none">
                        <div class="p-2 bg-dark rounded-3 mb-2">
                            <p class="p-0 m-0">Nom : <?= $a["name"] ?></p>
                            <p class="p-0 m-0">Prix : <?= $a["price"] ?></p>
                            <p class="p-0 m-0">Stock : <?= $a["stock"] ?></p>
                            <p class="p-0 m-0">Détail : <?= substr($a["description"],0,50) ?></p>
                        </div>
                    </a>
                    <?php endforeach ?>
                    <?php endif ?>


                    <?php if(count($categorie)>0): ?>
                    <p class="bg-success rounded-3 text-center fs-3 fw-bold"> Categorie : </p>
                    <?php foreach($categorie as $c): ?>
                    <a href="/admin/category/edit/<?= $c->id ?>" class="text-white" style="text-decoration:none">
                        <div class="p-2 bg-secondary rounded-3 mb-2">
                            <p class="p-0 m-0">Nom : <?= $c["name"] ?></p>
                        </div>
                    </a>
                    <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>







</div>
<?php get_files('components/footer'); ?>