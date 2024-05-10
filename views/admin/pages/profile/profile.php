<?php get_files('components/header'); ?>
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
                <div class="col-md-5 mx-auto bg-light rounded-3">
                    <div class="d-grid justify-content-center py-3">
                        <img src="<?php  base_url("assets/uploads/logo.png")?> " class="rounded-circle bg-dark"
                            width="100" height="100" alt="">
                    </div>
                    <h3 class=" p-1 rounded-3 mb-2 text-center"> <?= $user["userName"] ?></h3>
                    <div class="mx-3 py-3">
                        <p class=" p-1 rounded-3 mb-2 borders">Utilisateur : <?= $user["userName"] ?></p>
                        <p class="p-1 rounded-3 mb-2 borders">Email : <?= $user["userEmail"] ?></p>
                        <p class="p-1 rounded-3  borders">Rôle : <?= $user["userRole"] ?></p>
                    </div>

                    <div class="mb-3 borders py-4 rounded-3 position-relative">
                        <p class=" bg-light ms-3 px-2 position-absolute" style="top: -14px;">Modifier le mot de passe
                        </p>
                        <form action="/profile/update" method="post">
                            <div class="mb-2 mx-3">
                                <input type="text" class="form-control shadow-none border-1 border-dark"
                                    placeholder="Enter le mot de passe actuelle" name="password">
                                <p class="form-text text-danger"><?php show_message("verify") ?></p>


                            </div>
                            <div class="mb-3 mx-3">
                                <input type="text" class="form-control shadow-none border-1 border-dark"
                                    name="password-verify" placeholder="Entrer le nouveau mot de passe">
                                <p class="form-text text-danger"><?php show_message("new_pass") ?></p>
                            </div>

                            <div class="mx-3 d-grid">
                                <button class="btn btn-dark shadow-none">Enregister la modification</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




</div>
<?php get_files('components/footer'); ?>