<?php

use App\Milay\Model\Article;
use App\Milay\Model\Category;
use App\Milay\Model\Images;

$article = Article::with('category')->find($id)->first();
$images = Images::where("article_id",$id)->get();

get_files('components/header');
?>
<style>
.imageElement {
    max-width: 120px;
    height: 100px;
    margin: 10px;
}

.supp {
    background: transparent;
    top: 5px;
    right: 0px;
    margin: 0;
}
</style>
<div class="container-fluids">
    <div class="row w-100 mx-auto">
        <?php get_files('components/sidebar'); ?>
        <div class="col mx-auto p-0 m-0 dashbord dash">
            <?php get_files('components/navbar'); ?>

            <div class="container">
                <div class="row py-5">
                    <div class="col-md-6 rounded-3 mx-auto py-3 bg-dark">
                        <div class="mb-2">
                            <p class="bg-warning px-3 text-success fw-bold text-center rounded-3">
                                <?= show_message("message") ?>
                            </p>
                            <p class="bg-danger px-3 text-white fw-bold text-center rounded-3">
                                <?= show_message("error") ?>
                            </p>
                        </div>
                        <div class="py-4 rounded-3 border-2 border-primary d-flex justify-content-center flex-column drop"
                            id="drop-area" style="border: dotted" onclick="selectFile()">

                            <form id="uploadForm" action="/admin/post/detail" method="POST"
                                enctype="multipart/form-data">
                                <input type="file" name="images[]" id="fileInput" multiple accept=".png, .jpg, .jpeg"
                                    style="display: none;">
                                <input type="number" name="article_id" class="d-none" value="<?= $id?>">
                            </form>
                            <p class="m-0 text-center text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#fff"
                                    class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </p>
                            <p class="m-0 text-center text-white">Cliquer pour ajouter une image</p>
                        </div>

                        <div class="mb-1 py-3 d-flex flex-wrap gap-2" id="image-container">
                            <?php foreach($images as $image):?>
                            <div class="position-relative">
                                <img class="imageElement" src="<?= base_url('assets/uploads/'). $image["image_url"] ?>"
                                    alt="<?= $image["image_url"] ?>">
                                <div class="position-absolute supp px-2">
                                    <a class="btn btn-sm btn-danger px-1 p-0 m-0"
                                        href="/article/image/delete/<?= $image["id"]?>">x</a>
                                </div>
                            </div>
                            <?php endforeach?>
                        </div>

                        <form action="set" method="post" id="setStatus">
                            <div class="d-flex flex-column mb-2">
                                <div class="form-check form-switch">
                                    <input type="number" class="d-none" name="id" value="<?= $id?>">
                                    <input name="status" class="form-check-input border-primary  px-2" type="checkbox"
                                        id="inputStatus" role="switch" value="<?= $article['status']?>"
                                        <?= $article['status'] == 0 ? "" : "checked" ?>>
                                    <small class="px-3 text-white">
                                        Status</small>
                                </div>
                            </div>
                        </form>

                        <form action="/admin/post/update" method="post" enctype="multipart/form-data" id="upload-form">
                            <div class="d-flex flex-column">
                                <div class="article text-white">
                                    <input type="number" class="d-none" name="article_id" value="<?= $id ?>">
                                    <div class="mb-0">
                                        <label for="name" class="form-label">Nom de l'article</label>
                                        <input type="text"
                                            class="form-control shadow-none border-primary bg-dark text-white"
                                            name="name" id="name" value="<?= $article['name'] ?>"
                                            placeholder="Nom de l'article" />
                                        <small id="helpId"
                                            class="form-text text-danger ps-3"><?= show_message("name") ?></small>
                                    </div>

                                    <div class="mb-0">
                                        <label for="stock" class="form-label">Stock</label>
                                        <input type="text"
                                            class="form-control shadow-none border-primary bg-dark text-white"
                                            name="stock" id="stock" placeholder="Stock"
                                            value="<?= $article['stock'] ?>" />
                                        <small id="stock"
                                            class="form-text text-danger ps-3"><?= show_message("stock") ?></small>
                                    </div>


                                    <div class="mb-0">
                                        <label for="prix" class="form-label">Prix Unitaire</label>
                                        <input type="text"
                                            class="form-control shadow-none border-primary bg-dark text-white"
                                            name="prix" id="prix" placeholder="Prix" value="<?= $article['price'] ?>" />
                                        <small id="prix"
                                            class="form-text text-danger ps-3"><?= show_message("price") ?></small>
                                    </div>

                                    <div class="mb-0">
                                        <label for="categories" class="form-label">Catégorie</label>
                                        <select
                                            class="form-select form-select-md shadow-none border-primary bg-dark text-white"
                                            name="category_id" id="categories">
                                            <option selected value="<?= $article->category->id ?>">
                                                <?= $article->category->name ?>
                                            </option>
                                            <?php foreach (Category::all() as $value) : ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <small id="categorie"
                                            class="form-text text-danger ps-3"><?= show_message("category_id") ?></small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea
                                            class="form-control shadow-none border-primary bg-dark text-white needs-validation"
                                            name="description" id="description"
                                            rows="5"><?= $article['description'] ?></textarea>
                                        <small id="description"
                                            class="form-text text-danger ps-3"><?= show_message("description") ?></small>
                                    </div>

                                    <div class="d-grid py-3">
                                        <button type="submit" id="save"
                                            class="btn btn-primary px-3">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
// Fonction appelée lors du changement de sélection des fichiers
function handleFileChange(event) {
    const files = event.target.files;

    // Soumettre automatiquement le formulaire lorsqu'un fichier est sélectionné
    if (files.length > 0) {
        document.getElementById('uploadForm').submit();
    }
}

function selectFile() {
    document.getElementById('fileInput').click()
}

// Lier la fonction handleFileChange à l'événement 'change' du champ de fichier
document.getElementById('fileInput').addEventListener('change', handleFileChange);

const status = document.querySelector("#setStatus")
const inputStatus = document.querySelector("#inputStatus")

inputStatus.addEventListener('change', (e) => {
    status.submit()
})
</script>

<?php get_files('components/footer'); ?>