<footer id="footer">
  <?php wp_footer(); ?>
  <div class="container">
    <span> DuyCode &copy; 2019. Website được phát triển bởi công ty TNHH Medihome - 0986.021.190 </span>
  </div>
</footer>

<div class="modal" id="modal-image-root">
  <div class="modal-mask">
    <img loading="lazy" src="" />
  </div>
</div>


<script>
  window.addEventListener("click", (e) => {
    // nếu click vào ảnh có root và không phải thumbnail thì hiện modal
    if (
      e.target.closest("img") &&
      e.target.getAttribute("show-modal") != null &&
      !e.target.closest(".post-thumbnail")
    ) {
      const modal = document.getElementById("modal-image-root");
      const modalImage = modal.querySelector("img");

      modal.classList.add("show");
      const srcLink = e.target.getAttribute("show-modal") || e.target.getAttribute("src");
      modalImage.src = srcLink;
    } else {
      // còn lại click vào đâu cũng ẩn modal
      document.getElementById("modal-image-root").classList.remove("show");
    }
  });
</script>
</body>

</html>