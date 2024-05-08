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

                <div class="row py-4 ">
                    <div class="col-md-10 mx-auto bg-dark rounded-3 position-relative">
                        <h3 class="text-center text-light py-3">Listes des articles</h3>
                        <h6 class="text-center text-danger message" style="visibility: hidden;">
                            <?php show_message('success') ?></h6>
                        <div id="toastContainer" aria-live="polite" aria-atomic="true"
                            class="d-flex justify-content-end position-absolute align-items-start"
                            style="top: 10px;right:5px;">
                            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <img src="<?php base_url('assets/uploads/logo.png') ?>" width=50
                                        class="rounded me-2" alt="Logo" />
                                    <strong class="me-auto">Message : </strong>
                                    <small class="date"></small>
                                    <button type="button" class="ms-2 mb-1 close btn btn-sm border-0 shadow-none"
                                        data-dismiss="toast" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body">
                                    <p class="text-center"><?php show_message('success') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive pb-5">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom de l'article</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Prix unitaire</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Categorie</th>
                                        <th scope="col">Déscription</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($article as $res): ?>
                                    <tr class="">
                                        <td><?= $res['name']?></td>
                                        <td><?= $res['stock']?></td>
                                        <td><?= $res['price']?></td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input border-primary px-2" type="checkbox"
                                                    role="switch" <?= $res['status'] == 0 ? "" : "checked" ?> disabled>
                                            </div>
                                        </td>
                                        <td><?= $res['category']["name"]?></td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            <?=  substr($res['description'], 0, 40) ?>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="/admin/article/delete/<?=$res['id']?>"
                                                    class="btn btn-sm bg-danger text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash3-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                    </svg>
                                                </a>

                                                <a href="/admin/article/edit/<?=$res['id']?>"
                                                    class="btn btn-sm bg-warning text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                </a>

                                                <a href="/admin/article/show/<?=$res['id']?>"
                                                    class="btn btn-sm bg-success text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                    </svg>
                                                </a>
                                            </div>
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
</div>






<script>
$(document).ready(function() {
    function getTimeString() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        return hours + ':' + minutes + ':' + seconds;
    }

    function showToast() {
        $('.date').text(getTimeString());
        $('.toast').toast({
            delay: 5000
        });
        $('.toast').toast('show');
    }
    const message = $('.message').text().trim();

    if (message !== null && message !== '') {
        showToast();
    }

});
</script>
<?php get_files('components/footer'); ?>