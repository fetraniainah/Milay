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

const searchInput = document.getElementById('search');


searchInput.addEventListener('input', function(event) {
    const searchContent = event.target.value;
    if (searchContent.charAt(searchContent.length - 1) === '\n') {
        event.preventDefault();
        document.getElementById('post_search').submit();
        event.target.value = searchContent.slice(0, -1);
    }
});
  </script>
  <script src="<?php echo BASE_PATH; ?>assets/js/app.js"></script>
  <script src="<?php echo BASE_PATH; ?>assets/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>