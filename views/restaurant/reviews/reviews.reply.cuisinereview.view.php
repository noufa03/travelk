<?php require base_path('views/partials/restaurants/styles/details/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/details.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
      <?php require base_path('views/partials/restaurants/heading.php') ?>
      <div class="form--content">
            <form method="POST" enctype="multipart/form-data" action="cuisinereview/store">
                  <div style="display: flex;flex-direction:column">
                        <div class="form-group">
                              <label for="review">Cuisine ID:</label><br>
                              <input type="number" id="id" name="id" value="<?= $cuisineReview['cuisineID'] ?>" required disabled>
                        </div>
                        <div class="form-group">
                              <label for="review">Cuisine Name:</label><br>
                              <input type="text" id="cuisine_name" name="cuisine_name" value="<?= $cuisineReview['cuisine_name'] ?>" required disabled>
                        </div>
                        <div class="form-group">
                              <label for="review">Review:</label><br>
                              <input type="hidden" id="reviewid" name="reviewid" min="0" max="100" value="<?= $cuisineReview['reviewid'] ?>" required disabled>
                              <input type="varchar" id="review" name="review" min="0" max="100" value="<?= $cuisineReview['review'] ?>" required disabled>
                        </div>
                        <div class="form-group">
                              <label for="ratings">Ratings:</label><br>
                              <input type="email" id="ratings" name="ratings" min="0" max="100" value="<?= $cuisineReview['ratings'] ?>" required disabled>
                        </div>
                  </div>
                  <div>
                        <div class="form-group">
                              <label for="reply">Reply:</label><br>
                              <input type="hidden" id="reviewid" name="reviewid" min="0" max="100" value="<?= $cuisineReview['reviewid'] ?>" required>
                              <textarea name="reply" id="reply"><?= isset($cuisineReview['reply']) ? $cuisineReview['reply'] : '' ?></textarea>
                        </div>
                        <div style="display: flex;gap:2rem;justify-content:center">
                              <button type="submit" class="btn btn-submit">
                                    Send
                              </button>
                              <button type="reset" class="btn btn-cancel">Cancel</button>
                        </div>
                  </div>
            </form>
      </div>
</div>
</body>

</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>