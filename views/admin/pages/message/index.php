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
        <div class="container py-1">
            <div class="row mx-auto">
                <div class="col-md-10 bg-dark rounded-3 mx-auto" style="height: 90vh; overflow-y: auto;">
                    <h3 class="text-center text-white">Messages</h3>

                    <!-- Affichage des messages -->
                    <?php foreach ($messages as $message): ?>
                    <a href="/admin/<?= $message->emetteur ?>/message" class="" style="text-decoration: none;">
                        <div class="d-grid bg-secondary shadow-sm rounded-2 p-2 my-2">
                            <p class="text-white nt text-start p-0 m-0 text-small"><?= $message->message ?></p>
                            <label
                                class="text-label lb text-start text-small text-white"><?= $message->created_at ?></label>
                        </div>
                    </a>
                    <?php endforeach ?>
                </div>

            </div>
        </div>
    </div>
</div>




</div>
<?php get_files('components/footer'); ?>