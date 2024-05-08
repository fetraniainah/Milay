<?php get_files('components/header'); ?>
<div class="container-fluids">
    <div class="row w-100 mx-auto">

        <!----------------------------Sidebar-------------------------->
        <?php get_files('components/sidebar'); ?>

        <style>
        .form-controle::placeholder {
            color: grey;
        }
        </style>

        <!----------------------------Main container-------------------------->
        <div class="col mx-auto p-0 m-0  dashbord dash">
            <!----------------------------Navbar-------------------------->
            <?php get_files('components/navbar'); ?>

            <div class="conatiner">
                <div class="row py-4">
                    <div class="col-md-5 mx-auto bg-dark rounded-3">
                        <h4 class="text-center text-white py-3 text-uppercase">Nouvelle categorie</h4>
                        <h6 class="text-success text-center"><?php show_message("success"); ?></h6>

                        <form action="/category/post" method="post">
                            <div class="mb-2">
                                <label for="" class="form-label text-white">Nom de categorie</label>
                                <input type="text"
                                    class="form-control shadow-none border-primary bg-transparent text-white"
                                    name="name" id="name" placeholder="Nom de l'article" />
                                <small id="helpId" class="form-text text-muted"><?php show_message("name"); ?></small>
                            </div>

                            <div class="mb-3">
                                <label for="description " class="form-label text-white">Déscription</label>
                                <textarea class="form-control shadow-none border-primary bg-transparent text-white"
                                    name="description" id="description" rows="4"></textarea>
                                <small id="categorie"
                                    class="form-text text-muted"><?php show_message("description"); ?></small>
                            </div>

                            <div class="d-grid py-3">
                                <button type="submit" class="btn btn-primary px-3"> Enregistrer </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<?php get_files('components/footer'); ?>