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
                    <div class=" px-5 py-3 d-flex justify-content-center align-items-center">
                        <h3 class="text-white">résultat</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







</div>
<?php get_files('components/footer'); ?>