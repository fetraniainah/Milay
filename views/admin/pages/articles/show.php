<?php get_files('components/header'); ?>
<style>
.imageElement {
    max-width: 100px;
    margin: 10px;

}
</style>
<div class="container-fluids">
    <div class="row w-100 mx-auto">
        <?php get_files('components/sidebar'); ?>
        <div class="col mx-auto p-0 m-0  dashbord dash">
            <?php get_files('components/navbar'); ?>

            <div class="conatiner">
                <div class="row py-5">
                    <div class="col-md-6 rounded-3 mx-auto py-3 bg-dark">
                        <div class="d-flex flex-column">
                            <div class="mb-1 py-1" id="image-container">
                                <h3 class="m-0 p-0 text-center text-white"> <?=$article['name']; ?></h3>
                                <hr class="border-light mt-2 m-0 border-2 w-100">
                                <div class="d-flex flex-wrap">
                                    <?php foreach($images as $image):?>
                                    <img class="imageElement rounded-2"
                                        src="<?= base_url('assets/uploads/'). $image["image_url"] ?>"
                                        alt="<?= $image["image_url"] ?>">
                                    <?php endforeach?>
                                </div>
                            </div>

                            <div class="article text-white">

                                <div class="table-responsive py-3 bg-dark rounded-3 mt-3">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">Prix Unitaire</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Categorie</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                                <td scope="row"><?= $article['price']; ?></td>
                                                <td><?= $article['stock']; ?></td>
                                                <td><?=$article['category']['name']; ?></td>
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
    </div>
    <script>
    const save = document.querySelector('#save')

    function selectFile() {
        document.getElementById('file-input').click();
    }

    function dropHandler(event) {
        event.preventDefault();
        const files = event.dataTransfer.files;
        handleFiles(files);
    }

    function dragOverHandler(event) {
        event.preventDefault();
    }

    function handleFiles(event) {
        const files = event.target.files;
        const formData = new FormData();
        const imageContainer = document.getElementById('image-container');

        for (const file of files) {
            if (file.type.startsWith('image/')) {
                const imageElement = document.createElement('img');
                imageElement.classList.add('imageElement')
                imageElement.src = URL.createObjectURL(file);
                imageContainer.appendChild(imageElement);
                formData.append('images[]', file);
            }
        }

        fetch('/admin/post/detail', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });



    }
    </script>



</div>
<?php get_files('components/footer'); ?>