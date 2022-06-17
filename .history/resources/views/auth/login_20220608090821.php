<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <!-- <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="<?php echo SERVERIMG; ?>logos.jpeg" alt="">
                                <span class="d-none d-lg-block">NiceAdmin</span>
                            </a>
                        </div> -->
                        <!-- End Logo -->

                        <!-- <div id="alerta">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                        <!-- SVG icon code with class="alert-icon" -->
                    </div>
                    <div>
                        <h4 class="alert-title">I'm so sorry&hellip;</h4>
                        <div class="text-muted">Your account has been deleted and can't be restored.
                        </div>
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
    </div> -->

    <div class="card mb-3">

        <div class="card-body">

            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Panel Administrativo Distribuidora J.A
                </h5>
                <!-- <p class="text-center small">Distribuidora J.A</p> -->
            </div>

            <form class="row g-3 needs-validation" novalidate>
                <div class="col-12">
                    <label for="yourUsername" class="form-label">Usuario</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="16"
                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                        </span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <!-- <div class="invalid-feedback">Por favor, introduzca su nombre de usuario.
                                            </div> -->
                    </div>
                </div>

                <div class="col-12">
                    <label for="yourPassword" class="form-label">Contrase&ntilde;a</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="16"
                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                <circle cx="12" cy="16" r="1"></circle>
                                <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                            </svg>
                        </span>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <!-- <div class="invalid-feedback">¡Por favor, introduzca su contraseña!</div> -->
                    </div>

                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100 btn-login" type="submit">
                        Acceso <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                            </path>
                            <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                        </svg>
                    </button>
                </div>
            </form>

        </div>
    </div>
    </div>
    </div>
    </div>

    </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script src="<?php echo SERVER_SCRIPT_LOGIN; ?>index.js" type="module"></script>