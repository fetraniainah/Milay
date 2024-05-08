<div class="col-md-3  bg-white dashbord off-one p-0">
    <div class="header d-flex justify-content-between bg-dark py-1">
        <div class="col pb-1">
            <h3 class="text-white text-center  ">Admin</h3>
        </div>
        <button class="btn btn-dark btn-sm cl btn-side " onclick="toggleicon()">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="20" fill="currentColor"
                class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                <path fill-rule="evenodd"
                    d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
            </svg>
        </button>
    </div>

    <ul class="nav justify-content-start flex-column gap-2 py-3 mx-3">
        <li class="nav-item">
            <a class="nav-link btn bg-dark text-start fw-bold text-white  mx-2" href="/admin/home">
                <i class="bi bi-house-add-fill"></i>
                Acceuil
            </a>
        </li>
        <hr class="border-1 w-100 border-light m-1" />
        <li class="nav-item">
            <a class="nav-link btn bg-dark text-start text-white  mx-2" data-bs-toggle="collapse"
                data-bs-target="#article" aria-expanded="false" aria-controls="article">
                <i class="bi bi-card-checklist"></i>
                Articles</a>
        </li>
        <div class="collapse " id="article">
            <div class="d-flex bg-dark rounded-3 p-2 flex-column mx-3">
                <a class="text-white nav-link" href="/admin/article/store">
                    <i class="bi bi-database-fill-add"></i>
                    Crée</a>
                <a class="text-white nav-link" href="/admin/article/list">
                    <i class="bi bi-card-checklist"></i>
                    List</a>
            </div>
        </div>

        <li class="nav-item mt-2">
            <a class="nav-link btn btn-sm text-start bg-dark text-white  mx-2" data-bs-toggle="collapse"
                data-bs-target="#categorie" aria-expanded="false" aria-controls="categorie">
                <i class="bi bi-view-list"></i>
                Categories</a>
        </li>

        <div class="collapse " id="categorie">
            <div class="d-flex bg-dark rounded-3 p-2 flex-column mx-3">
                <a class="text-white nav-link" onclick="setCurrentComponnent(this)" href="/admin/category/create">
                    <i class="bi bi-database-fill-add"></i>
                    Crée
                </a>
                <a class="text-white nav-link" href="/admin/category/list">
                    <i class="bi bi-card-checklist"></i>
                    List</a>
            </div>
        </div>

        <li class="nav-item mt-2">
            <a class="nav-link btn btn-sm text-start text-white bg-dark mx-2" href="/admin/commande">
                <i class="bi bi-basket"></i>
                Commandes</a>
        </li>

        <hr class="border-1 border-light w-100 m-1 ">

        <li class="nav-item ">
            <a class="nav-link btn btn-sm text-start bg-dark text-white mx-2" href="/admin/utilisateur">
                <i class="bi bi-person-check"></i> Utilisateurs</a>
        </li>
        </li>

    </ul>


    <div class="footer side-footer position-fixed bottom-0 py-0 px-3 ">
        <div class="d-flex justify-content-center bg-dark p-2 rounded-3">
            <img src="<?php base_url('assets/uploads/logo.png') ?>" alt="logo" style="object-fit: cover;width:100px">
        </div>
    </div>

</div>