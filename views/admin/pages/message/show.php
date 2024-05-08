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
                    <div style="height: 70vh;">
                        <?php foreach ($messages as $message): ?>
                        <?php if($message->emetteur == 1): ?>
                        <div class="d-grid justify-content-end bg-primary rounded-2 p-2 my-2 ">
                            <p class="text-white nt text-start p-0 m-0 text-small"><?= $message->message ?></p>
                            <label
                                class="text-label lb text-start text-small text-white"><?= $message->created_at ?></label>
                        </div>
                        <?php else: ?>
                        <div class="d-grid bg-secondary rounded-2 p-2 my-2">
                            <p class="text-white nt text-start p-0 m-0 text-small"><?= $message->message ?></p>
                            <label
                                class="text-label lb text-start text-small text-white"><?= $message->created_at ?></label>
                        </div>
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>

                    <!-- Formulaire d'envoi de message -->
                    <div class="position-sticky bottom-0">
                        <form action="/admin/message/post" method="POST" class="px-3 bg-dark">
                            <input type="hidden" name="recepteur" value="<?= $id ?>">
                            <div class="mb-2">
                                <label for="message" class="form-label text-white">Nouveau Message :</label>
                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
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