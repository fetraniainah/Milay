<style>
/* Style pour le contenu du message */
.message-content {
    font-family: Arial, sans-serif;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    height: 440px;
    overflow-y: auto;
    bottom: 0;
    width: 320px;
    right: 3px;
    transition: bottom 0.8s ease;
}

.up-down {
    bottom: -443px;

}

/* Style pour l'en-tête du message */
.message-header {
    background-color: #343a40;
    border-top-left-radius: 0.3rem;
    border-top-right-radius: 0.3rem;
    position: sticky;
    top: 0;
    display: flex;
    justify-content: space-between;
}

/* Style pour le corps du message */
.message-body {
    background-color: #212529;
    height: 350px;
}

/* Style pour le pied de page du message */
.message-footer {
    background-color: #343a40;
    border-bottom-left-radius: 0.3rem;
    border-bottom-right-radius: 0.3rem;
    text-align: right;
    position: sticky;
    bottom: 0;
    display: flex;
    justify-content: space-between;
}

hr {
    z-index: 0;
}
</style>

<nav class="navbar bg-dark navbar-expand-md shadow-sm navbar-light position-sticky top-0" style="z-index: 1;">
    <div class="container-fluid">
        <div class="d-flex">
            <button class="btn btn-dark shadow-none border-0 " onclick="toggleicon()">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="20" fill="currentColor"
                    class="bi bi-chevron-double-left rotate" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                    <path fill-rule="evenodd"
                        d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                </svg>
            </button>
            <a class="navbar-brand px-3 fw-bold text-white d-none d-sm-block" href="#">Milay</a>
        </div>

        <div class="search-content col   mx-auto">
            <form action="/admin/search" method="post" id="post_search">
                <div class=" mx-auto  mx-3 position-relative search">
                    <input type="search"
                        class="form-control shadow-none border-primary ps-5 bg-transparent text-white rounded-4 border-1"
                        name="s" id="search" aria-describedby="helpId" placeholder="" />
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-search pb"
                        viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </div>
            </form>
        </div>

        <div class="d-flex gap-2 position-relative">
            <a href="/admin/notification" class=" btn btn-sm btn-dark px-2 rounded-5  position-relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-bell-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                </svg>
                <span class="position-absolute text-danger fw-bold " style="top:0px;right:0px">0</span>
            </a>
            <a href="/admin/message" class=" btn btn-sm btn-dark px-2 rounded-5 position-relative "
                onclick="toggleMessage()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-messenger" viewBox="0 0 16 16">
                    <path
                        d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.64.64 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.64.64 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76m5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z" />
                </svg>
                <span class="position-absolute text-danger fw-bold " style="top:0px;right:3px">0</span>
            </a>
            <button class="btn btn-dark rounded-circle profile" onclick="toggleProfile()">A</button>
            <div class="bg-dark rounded-3 py-1 position-absolute to-left h-200">
                <div class="d-grid p-1">
                    <a href="/admin/home/profile" class="btn btn-profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5" />
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        </svg>
                        Profile</a>
                </div>

                <div class="d-grid p-1">
                    <a href="/logout" type="button" class="btn btn-profile ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg>
                        Déconnection
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="position-fixed  bg-dark rounded-2 d-none message-content">
    <div class="message-header p-1">
        <button class="btn btn-warning rounded-5 fw-bold">A</button>
        <button class="btn  rounded-5 btn-sm" onclick="toggleMessage()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-chevron-double-down"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                <path fill-rule="evenodd"
                    d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
            </svg>
        </button>
    </div>
    <div class="message-body" style="color: white; padding: 10px; ">
        <p class="text-bg-info rounded-3 px-2">Contenu du message...</p>
    </div>
    <div class="message-footer p-1">
        <button type="button" class="btn btn-primary">Fermer</button>
        <button type="button" class="btn btn-secondary">Enregistrer</button>
    </div>
</div>

<script>
const messages = document.querySelector('.message-content')

function toggleMessage() {
    localStorage.setItem('isOff', false)
    messages.classList.toggle('up-down')
}
</script>