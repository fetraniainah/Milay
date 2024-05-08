<?php

use App\Milay\Model\Category;

 get_files('components/header'); 
 $res = Category::all();
 ?>
<div class="container-fluids">
    <div class="row w-100 mx-auto">

        <!----------------------------Sidebar-------------------------->
        <?php get_files('components/sidebar'); ?>


        <!----------------------------Main container-------------------------->
        <div class="col mx-auto p-0 m-0  dashbord dash">
            <!----------------------------Navbar-------------------------->
            <?php get_files('components/navbar'); ?>

            <div class="conatiner">
                <div class="d-flex justify-content-center py-5">
                    <div class="col-md-5 py-3 rounded-3 bg-dark">
                        <h5 class="text-center text-white py-3">Categorie <?= $category['name'] ?></h5>
                        <p class="px-3 bg-success text-white text-center rounded-3 mx-4">
                            <?php show_message("success") ?>
                        </p>

                        <p class="px-3 bg-warning text-danger text-center rounded-3 mx-4">
                            <?php show_message("error") ?>
                        </p>

                        <form action="/admin/category/update" method="post">
                            <input type="number" class="d-none" name="id" value="<?=$category['id'] ?>">
                            <div class=" mx-3">
                                <input type="text"
                                    class="form-control shadow-none bg-transparent text-white border-primary border-2"
                                    name="name" id="name" aria-describedby="helpId" placeholder=""
                                    value="<?= $category['name'] ?>" />
                            </div>

                            <div class="mb-3 mx-3">
                                <label for="description" class="form-label"></label>
                                <textarea
                                    class="form-control shadow-none bg-transparent text-white border-primary border-2"
                                    name="description" id="description"
                                    rows="4"><?= $category['description'] ?></textarea>
                            </div>

                            <div class="d-grid gap-2 mx-3">
                                <button type="submit" class="btn btn-primary">
                                    Enregistrer la modification
                                </button>
                            </div>



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<?php get_files('components/footer'); ?>