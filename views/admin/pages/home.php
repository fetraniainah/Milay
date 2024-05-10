<?php

use App\Milay\Utils\SessionMaker;

 get_files('components/header'); ?>
<div class="container-fluids">
    <div class="row w-100 mx-auto">
        <!----------------------------Sidebar-------------------------->
        <?php get_files('components/sidebar'); ?>
        <style>
        .chart-container {
            position: relative;
            margin: auto;
            width: 80%;
            height: 400px;
        }

        canvas {
            width: 100%;
            height: auto;
        }
        </style>


        <!----------------------------Main container-------------------------->
        <div class="col mx-auto p-0 m-0  dashbord dash">
            <!----------------------------Navbar-------------------------->
            <?php get_files('components/navbar'); ?>

            <div class="conatiner p-4">
                <h3 class=" text-primary">Salut <?= SessionMaker::get('user_name') ?></h3>
                <?php foreach($n as $nt): ?>
                <div class="row  bg-dark">
                    <div class="col-6 py-2">
                        <li class="text-light"><?= ucfirst($nt->text) ?></li>
                        <small class="text-light ps-3" style="font-size: xx-small"><?= $nt->created_at ?></small>
                    </div>

                    <div class="col-6 align-items-center py-2 ">
                        <p class="m-0 text-end text-light"><i class="bi bi-bell"></i></p>
                    </div>
                    <hr class="w-100 m-0  border-light">
                </div>
                <?php endforeach ?>

                <!------------------------ Weekly shall---------------->
                <div class="d-flex  gap-2 flex-wrap-md mt-3">
                    <div class="col-4 bg-dark mx-auto rounded-3 p-2">
                        <p class="m-0 text-light">Télma</p>
                        <h5 class="m-0 text-primary">120 000</h5>
                        <span class="badge bg-success">+33.5%</span>

                    </div>

                    <div class="col-4 bg-dark mx-auto rounded-3 p-2 ">
                        <p class="m-0 text-light">Airtel</p>
                        <h5 class="m-0 text-primary">500 000</h5>
                        <span class="badge bg-success">-3.5%</span>
                    </div>
                    <div class="col-4 bg-dark mx-auto rounded-3 p-2 ">
                        <p class="m-0 text-light">Orange</p>
                        <h5 class="m-0 text-primary">600 000</h5>
                        <span class="badge bg-success">+53.5%</span>
                    </div>
                </div>



                <!------------------------Recent purchapse------------------------------------>

                <div class="table-responsive py-3 bg-dark rounded-3 mt-3">
                    <h6 class="m-0 text-primary px-4">Dernière commandes</h6>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Télephone</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Articles</th>
                                <th scope="col">Status de payment</th>
                                <th scope="col">Methode de payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">aina@gmail.com</td>
                                <td>0326578698</td>
                                <td>IVA 234 Ankaoraobato</td>
                                <td scope="row">Sweet homme</td>
                                <td>En attend</td>
                                <td>Télma</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row mx-auto py-3">
                    <div class="col-md-5 mx-auto bg-dark rounded-3 m-2">
                        <h4 class="text-white textècenter">Visiteur</h4>
                    </div>

                    <div class="col-md-6 mx-auto bg-dark rounded-3 m-2">
                        <h4 class="text-white textècenter">Utilisateur</h4>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php base_url('assets/js/chart.js') ?>"></script>
<script src="<?php base_url('assets/js/data.js') ?>"></script>

<script>
//Notification.requestPermission().then(permission => {
// if (permission === 'granted') {
//    new Notification('Hello', {
//       body: 'Welcome to our website!'
//  });
// }
//});
</script>
<?php get_files('components/footer'); ?>