<?php
 get_files('components/header'); 


?>
<style>
.container-fluid {
    height: 100vh;
    background-image: radial-gradient(circle at 10% 8%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 8%, transparent 8%, transparent 92%), radial-gradient(circle at 87% 45%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 8%, transparent 8%, transparent 92%), radial-gradient(circle at 9% 67%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 31% 83%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 46% 54%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 16% 24%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 18% 9%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 85% 69%, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.04) 4%, transparent 4%, transparent 96%), radial-gradient(circle at 55% 7%, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.04) 4%, transparent 4%, transparent 96%), radial-gradient(circle at 69% 69%, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.04) 4%, transparent 4%, transparent 96%), radial-gradient(circle at 68% 60%, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.04) 4%, transparent 4%, transparent 96%), linear-gradient(135deg, rgb(0, 0, 18), rgb(3, 9, 40));
}

.form-control::placeholder {
    color: #888;
}

.content {
    max-width: 400px;
    min-width: 350px;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div
            class="col-md-3 shadow-sm rounded-3 bg-dark py-3 mx-auto position-absolute top-50 start-50 translate-middle content">
            <h5 class=" text-center bg-dark text-primary border-primary  py-2 rounded-3 fw-bold"
                style="border: 2px dotted;">CODE D'ACTIVATION
            </h5>
            <form action="/admin/auth/post-twofactor" method="post">
                <div class="py-3">
                    <input type="text"
                        class="form-control shadow-none border-primary border-2  bg-transparent text-white"
                        name="activate" id="code" aria-describedby="helpId"
                        placeholder="Entre le code envoyé sur votre email" />
                    <small id="emailHelpId" class="form-text text-warning"><?php show_message("code"); ?></small>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" name="code" id="" class="btn btn-primary">
                        Verification
                    </button>
                </div>



            </form>
        </div>
    </div>

</div>
<?php get_files('components/footer'); ?>