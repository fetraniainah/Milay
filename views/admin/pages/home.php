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
                    </div>

                    <div class="col-6 align-items-center py-2 ">
                        <p class="m-0 text-end text-light"><i class="bi bi-bell"></i></p>
                    </div>
                    <hr class="w-100 m-0  border-light">
                </div>
                <?php endforeach ?>

                <!------------------------ Weekly shall---------------->
                <div class="d-flex  gap-2 flex-wrap-md mt-3">
                    <div class="col-6 bg-dark mx-auto rounded-3 p-2">
                        <p class="m-0 text-light">Weekly salle</p>
                        <h5 class="m-0 text-primary">47K</h5>
                        <span class="badge bg-success">+3.5%</span>

                    </div>

                    <div class="col-6 bg-dark mx-auto rounded-3 p-2 ">
                        <p class="m-0 text-light">Product share</p>
                        <h5 class="m-0 text-primary">30 %</h5>
                        <span class="badge bg-success">+3.5%</span>
                    </div>
                </div>



                <!------------------------Recent purchapse------------------------------------>

                <div class="table-responsive py-3 bg-dark rounded-3 mt-3">
                    <h6 class="m-0 text-primary px-4">Recent purchapse</h6>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Télephone</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Articles</th>
                                <th scope="col">Payment status</th>
                                <th scope="col">Some</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">R1C1</td>
                                <td>R1C2</td>
                                <td>R1C3</td>
                                <td scope="row">R1C1</td>
                                <td>R1C2</td>
                                <td>R1C3</td>
                            </tr>
                            <tr class="">
                                <td scope="row">Item</td>
                                <td>Item</td>
                                <td>Item</td>
                                <td scope="row">Item</td>
                                <td>Item</td>
                                <td>Item</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-------------------------Chart to show customer rate--------------->

                <div class="row  py-3 gap-3">
                    <div class="col-md-11 mx-auto py-1 bg-dark rounded-3">
                        <div class="chart-container">
                            <canvas id="sales-chart"></canvas>
                        </div>
                    </div>
                </div>


                <!------------------------Best seller------------------------------------>

                <div class="table-responsive py-3 bg-dark rounded-3 mt-3">
                    <h6 class="m-0 text-primary px-4">Best seller</h6>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Article vendues</th>
                                <th scope="col">Quantités</th>
                                <th scope="col">Quantité / %</th>
                                <th scope="col">Revenue</th>
                                <th scope="col">Revenues / %</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Stock / %</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">Article 1</td>
                                <td>15</td>
                                <td>16 %</td>
                                <td>12000000</td>
                                <td>45 %</td>
                                <td>10</td>
                                <td>74 %</td>
                            </tr>
                        </tbody>
                    </table>
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