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
                    <div class="col-md-10 py-3 rounded-3 bg-dark">
                        <h5 class="text-center text-white py-3">LISTE DES COMMANDE</h5>
                        <p class="px-3 bg-warning text-white text-center rounded-3 mx-4"> <?php show_message("error") ?>
                        </p>

                        <div class="table-responsive py-3 px-3 bg-dark rounde-3 shadow-sm rounded-3 mt-3">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Email</th>
                                        <th scope="col">Télephone</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Payment status</th>
                                        <th scope="col">Some</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td><a href="/admin/commande/detail"
                                                class="btn btn-sm btn-success p-0 m-0 px-3">Détail</a>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td scope="row">Item</td>
                                        <td>Item</td>
                                        <td>Item</td>
                                        <td scope="row">Item</td>
                                        <td>Item</td>
                                        <td><a href="/admin/commande/detail"
                                                class="btn btn-sm btn-success p-0 m-0 px-3">Détail</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<?php get_files('components/footer'); ?>