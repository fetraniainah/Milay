  <?php
  use App\Milay\Utils\Messages;
    Messages::clearErrors();
    Messages::clearSuccesses();
  ?>
  <script>
window.addEventListener("load", () => {
    const load = document.querySelector(".load")
    load.classList.add("d-none")
})
  </script>
  <script src="<?php echo BASE_PATH; ?>assets/js/app.js"></script>
  <script src="<?php echo BASE_PATH; ?>assets/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>