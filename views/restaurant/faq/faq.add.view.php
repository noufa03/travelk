<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
      <?php require base_path('views/partials/restaurants/heading.php') ?>
      <p style="font-size: 18px; color: #555;">
            FAQS / Add FAQ
      </p>
      <div class="form--content">
            <form method="POST" enctype="multipart/form-data">
                  <div class="first--row">
                        <div class="form-group">
                              <label for="question">Question:</label><br>
                              <textarea id="question" name="question" rows="4" cols="50"><?= old('question') ?></textarea>
                              <?php if (isset($errors['question'])) : ?>
                                    <p class="error-text"><?= $errors['question'] ?></p>
                              <?php endif; ?>
                        </div>
                        <div class="form-group">
                              <label for="answer">Answer:</label><br>
                              <textarea id="answer" name="answer" rows="4" cols="50"><?= old('answer') ?></textarea>
                              <?php if (isset($errors['answer'])) : ?>
                                    <p class="error-text"><?= $errors['answer'] ?></p>
                              <?php endif; ?>
                        </div>
                  </div>

                  <div class="second--row">
                        <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                              Add FAQ
                        </button>
                        <button type="reset" style="background: #ffffff; color: #60a56a; padding: 10px 24px; border-radius: 8px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff';">
                        <a href="/FAQs_rest">Cancel</a> </button>
                  </div>
            </form>
      </div>
</div>
</body>

</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>
<?php require base_path('views/partials/footer.php') ?>