<?php

use App\Milay\Utils\SessionMaker;

 get_files('components/header'); ?>
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
                <div class="col-10 mx-auto  rounded-3">
                    <div class=" px-5 py-3 d-flex justify-content-between align-items-center">
                        <h3 class="text-white">Admin</h3>
                        <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#add">Ajouter</a>
                    </div>
                    <div class="table-responsive py-3 bg-dark rounded-3 mt-3">

                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Nom d'utilisateur</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rôle</th>
                                    <th scope="col">Pérmition</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($user as $admin): ?>
                                <tr class="">
                                    <td scope="row"><?= $admin["username"] ?></td>
                                    <td><?= $admin["email"] ?></td>
                                    <td><?= $admin["roles"] ?></td>
                                    <td>
                                        <?php if(SessionMaker::get("user_email")=="tahiri.fetra@gmail.com"): ?>
                                        <a href="delete/user/<?= $admin["id"]?>"
                                            class="btn btn-sm btn-danger">Supprimer</a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Body-->
<div class="modal fade " id="add" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="modalTitleId">
                    Nouvelle admin
                </h5>
                <button type="button" class="btn-close shadow-none btn-light " data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="utilisateur/add" method="post">
                <div class="modal-body">
                    <div class="">
                        <div class="mb-0">
                            <label for="username" class="form-label text-white">Nom d'utilisateur</label>
                            <input type="text" class="form-control text-white shadow-none border-primary bg-transparent"
                                name="username" id="username" aria-describedby="helpId" placeholder="Admin" required />
                            <small id="helpId" class="form-text text-muted"><?php show_message("username") ?></small>
                        </div>

                        <div class="mb-0">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" required
                                class="form-control text-white shadow-none border-primary bg-transparent" name="email"
                                id="email" aria-describedby="helpId" placeholder="admin@mail.co" />
                            <small id="helpEmail" class="form-text text-muted"><?php show_message("email") ?></small>
                        </div>

                        <div class="mb-0">
                            <label for="password" class="form-label text-white">Mot de passe</label>
                            <input type="password" required
                                class="form-control text-white shadow-none border-primary bg-transparent"
                                name="password" id="password" aria-describedby="helpId" placeholder="Mot de passe" />
                            <small id="helpEmail" class="form-text text-muted"><?php show_message("password") ?></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>





</div>
<?php get_files('components/footer'); ?>