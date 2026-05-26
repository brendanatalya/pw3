            <hr>
        </main>

        <?php //include(COOKIE_TEMPLATE); //linha incluida ?> 
        <script>/*
            //cookies
            var msgCookies = document.getElementById('cookieModal');

            function aceitoCookies() {
                localStorage.lgpd = "aceito"; //localsrtorage para armazenar dados do navegador
                msgCookies.classList.remove('mostrar');
            }

            if (localStorage.lgpd == 'aceito') {
                msgCookies.classList.remove('mostrar');
            } else {
                msgCookies.classList.add('mostrar');
            }
*/
        </script>
        
        <footer class="bg-dark py-4 mt-4" data-bs-theme="dark">
            <div class="container">

                <!-- Linha superior: logo + seções -->
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 border-bottom border-secondary">
                    
                    <!-- Logo -->
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-gem fs-5" style="color: #776dd5;"></i>
                        <span class="text-light fw-medium">Gem Company</span>
                    </div>

                    <!-- Seções com cores temáticas -->
                    <div class="d-flex gap-4 flex-wrap align-items-center">
                        <span class="d-flex align-items-center gap-2 text-secondary small">
                            <i class="fa-solid fa-user-doctor" style="color: #5bc8dc;"></i>
                            Médicos
                        </span>
                        <span class="d-flex align-items-center gap-2 text-secondary small">
                            <i class="fa-solid fa-newspaper" style="color: #e879a0;"></i>
                            Revistas
                        </span>
                    </div>
                </div>

                <!-- Linha inferior: copyright + cookies -->
                <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 gap-2">
                    <?php $data = new DateTime("now", new DateTimeZone("America/Sao_Paulo")) ?>
                    <p class="mb-0 text-secondary small">
                        &copy; 2025 à <?php echo $data->format("Y") ?> — Brenda Natalya e Maria Luísa
                    </p>
                    <a href="#" id="open_preferences_center" class="text-secondary small text-decoration-none d-flex align-items-center gap-1">
                        <i class="fa-solid fa-cookie-bite"></i>
                        Preferências de cookies
                    </a>
                </div>

            </div>
        </footer>

        <script src="<?php echo BASEURL; ?>js/jquery-3.7.1.min.js"></script>
        <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
        <script src="<?php echo BASEURL; ?>js/jquery.mask.js"></script>
        <script src="<?php echo BASEURL; ?>js/main.js"></script>

        <script>
            //mascaras
            $('#telefone').mask('00 00000000');
        </script>
    </body>
</html>