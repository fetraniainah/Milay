<?php get_files('components/header'); ?>
<div class="container-fluids">
    <div class="row w-100 mx-auto">

        <!----------------------------Sidebar-------------------------->
        <?php get_files('components/sidebar'); ?>


        <!----------------------------Main container-------------------------->
        <div class="col mx-auto p-0 m-0  dashbord dash">
            <!----------------------------Navbar-------------------------->
            <?php get_files('components/navbar'); ?>

            <div class="conatiner">

                <div class="row py-4">
                    <div class="col-md-7 mx-auto bg-light rounded-3">
                        <h3 class="text-center py-3">Crée une article</h3>

                        <form action="/admin/post/article" method="post">
                            <div class="mb-2">
                                <label for="" class="form-label">Nom de l'article</label>
                                <input type="text" class="form-control shadow-none border-dark" name="name" id="name"
                                    placeholder="Nom de l'article" />
                                <small id="helpId"
                                    class="form-text text-danger ps-3"><?php show_message("name"); ?></small>
                            </div>

                            <div class="mb-2">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="text" class="form-control shadow-none border-dark" name="stock" id="stock"
                                    placeholder="stock" />
                                <small id="stock"
                                    class="form-text text-danger ps-3"><?php show_message("stock"); ?></small>
                            </div>

                            <div class="mb-2">
                                <label for="prix" class="form-label">Prix Unitaire</label>
                                <input type="text" class="form-control shadow-none border-dark" name="prix" id="prix"
                                    placeholder="Prix" />
                                <small id="stock"
                                    class="form-text text-danger ps-3"><?php show_message("price"); ?></small>
                            </div>

                            <div class="mb-2">
                                <label for="categorie" class="form-label">Categories</label>
                                <select class="form-select form-select-md shadow-none border-dark" name="category_id"
                                    id="categories">
                                    <option selected>Choisir une categories</option>
                                    <?php foreach($categorie as $value): ?>
                                    <option value="<?= $value['id']?>"><?= $value['name']?></option>
                                    <?php endforeach ?>
                                </select>
                                <small id="categorie"
                                    class="form-text text-danger ps-3"><?php show_message("category_id"); ?></small>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Déscription</label>
                                <textarea class="form-control shadow-none border-dark needs-validation"
                                    name="description" id="description" rows="4"></textarea>
                                <small id="categorie"
                                    class="form-text text-danger ps-3"><?php show_message("description"); ?></small>
                            </div>

                            <div class="d-flex justify-content-end py-3">
                                <button type="submit" class="btn btn-dark px-3"> Enregistrer </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>




</div>
<?php get_files('components/footer'); ?>