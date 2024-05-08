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

        .nt {
            font-size: small;
        }

        .lb {
            font-size: x-small;
        }
        </style>
        <div class="container py-4">
            <div class="row mx-auto">
                <div class="col-md-10 mx-auto">
                    <h3 class="text-center text-white">
                        Messages
                        <?php foreach($message as $m): ?>
                        <div class="d-grid bg-dark rounded-2 p-2 my-2">
                            <p class="text-white nt text-start p-0 m-0 text-small"><?= $n["text"] ?></p>
                            <label
                                class="text-label lb text-start text-small text-white"><?= $n["created_at"] ?></label>
                        </div>

                        <?php endforeach ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>




</div>
<?php get_files('components/footer'); ?>