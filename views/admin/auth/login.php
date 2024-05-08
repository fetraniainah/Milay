<?php get_files('components/header'); ?>
<style>
.container-fluid {
    height: 100vh;
    background-image: radial-gradient(circle at 10% 8%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 8%, transparent 8%, transparent 92%), radial-gradient(circle at 87% 45%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 8%, transparent 8%, transparent 92%), radial-gradient(circle at 9% 67%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 31% 83%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 46% 54%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 16% 24%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 18% 9%, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.03) 6%, transparent 6%, transparent 94%), radial-gradient(circle at 85% 69%, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.04) 4%, transparent 4%, transparent 96%), radial-gradient(circle at 55% 7%, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.04) 4%, transparent 4%, transparent 96%), radial-gradient(circle at 69% 69%, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.04) 4%, transparent 4%, transparent 96%), radial-gradient(circle at 68% 60%, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.04) 4%, transparent 4%, transparent 96%), linear-gradient(135deg, rgb(0, 0, 18), rgb(3, 9, 40));
}

.col-md-5 {
    max-width: 450px;
}

@media (max-width:1000px) {
    .col-md-5 {
        width: 100%;
    }
}

.form-control::placeholder {
    color: #888;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 shadow-sm rounded-3 py-1 mx-auto position-absolute top-50 start-50 translate-middle">


            <div class="d-flex justify-content-between align-items-center border-2 bg-dark rounded-3 mb-3 border-primary p-2"
                style="border: dotted;">
                <img src="<?php base_url('assets/uploads/logo.png') ?>" alt="logo" width="150" height="60">
                <h3 class="text-center text-primary" style="font-weight: 800; font-size:2.4rem">Admin</h3>
            </div>

            <form action="/postLogin" method="post" class="bg-dark p-4 rounded-3">
                <h4 class="text-primary py-2">Se connecter</h4>
                <div class="mb-3">
                    <input type="text" class="form-control bg-transparent text-white border-light shadow-none"
                        name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com" />
                    <small id="emailHelpId" class="form-text text-warning"><?php show_message("email"); ?></small>
                </div>

                <div class="mb-4">
                    <input type="password" class="form-control bg-transparent text-white border-light shadow-none"
                        name="password" id="password" placeholder="Mot de passe" />
                    <p class="form-text text-warning"><?php show_message("password"); ?></p>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary shadow-none"> Connexion</button>

                </div>
            </form>
        </div>
    </div>
</div>

</div>
<?php get_files('components/footer'); ?>