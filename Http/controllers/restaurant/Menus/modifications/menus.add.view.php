<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <p style="font-size: 18px; color: #555;">
        Cuisine / Add Cuisine
    </p>
    <div class="form--content">
        <form method="POST" enctype="multipart/form-data" action="/menu/add">
            <div class="first--row">
                <div class="first--grp">
                    <div class="form-group">
                        <label for="cuisine_name">Cuisine Name:</label><br>
                        <input type="text" id="cuisine_name" name="cuisine_name" value="<?= old('cuisine_name') ?>">
                        <?php if (isset($errors['cuisine_name'])) : ?>
                            <li class="error-text"><?= $errors['cuisine_name'] ?></li>
                        <?php endif; ?>
                    </div>
                     <div class="form-group">
                        <label for="chef">Chef:</label><br>
                        <input type="text" id="chef" name="chef" value="<?= old('chef') ?>">
                        <?php if (isset($errors['chef'])) : ?>
                            <li class="error-text"><?= $errors['chef'] ?></li>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="cuisine_type">Cuisine Type:</label><br>
                        <select id="cuisine_type" name="cuisine_type">
                            <option value="" disabled selected>Select a cuisine</option>
                            <option value="Italian" <?= old('cuisine_type') == 'Italian' ? 'selected' : '' ?>>Italian</option>
                            <option value="Chinese" <?= old('cuisine_type') == 'Chinese' ? 'selected' : '' ?>>Chinese</option>
                            <option value="Mexican" <?= old('cuisine_type') == 'Mexican' ? 'selected' : '' ?>>Mexican</option>
                            <option value="Japanese" <?= old('cuisine_type') == 'Japanese' ? 'selected' : '' ?>>Japanese</option>
                            <option value="Indian" <?= old('cuisine_type') == 'Indian' ? 'selected' : '' ?>>Indian</option>
                            <option value="Thai" <?= old('cuisine_type') == 'Thai' ? 'selected' : '' ?>>Thai</option>
                            <option value="Greek" <?= old('cuisine_type') == 'Greek' ? 'selected' : '' ?>>Greek</option>
                            <option value="French" <?= old('cuisine_type') == 'French' ? 'selected' : '' ?>>French</option>
                            <option value="srilankan" <?= old('cuisine_type') == 'srilankan' ? 'selected' : '' ?>>Srilankan</option>
                        </select>
                        <?php if (isset($errors['cuisine_type'])) : ?>
                            <li class="error-text"><?= $errors['cuisine_type'] ?></li>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label><br>
                        <textarea id="description" name="description" rows="4" cols="50"><?= old('description') ?></textarea>
                        <?php if (isset($errors['description'])) : ?>
                            <li class="error-text"><?= $errors['description'] ?></li>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="second--grp">
                    <div class="form-group">
                        <label for="photo">Photos:</label><br>
                        <div class="upload-box">
                            <img
                                id="preview"
                                class="preview-img"
                                src=""
                                alt="Image Preview"
                                style="width: 200px; margin-top: 10px;">
                        </div>
                        <input
                            type="file"
                            id="photo"
                            name="photo"
                            accept="image/*"
                            onchange="previewImage(event)">
                    </div>
                    <?php if (isset($errors['photo'])) : ?>
                        <li class="error-text"><?= $errors['photo'] ?></li>
                    <?php endif; ?>
                </div>

            </div>
            <div class="second--row">
                <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                    Add Cuisine
                </button>
                <button type="reset" style="background: #ffffff; color: #60a56a; padding: 10px 40px; border-radius: 8px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff';">
                    <a href="/mymenus" style="color: #60a56a; text-decoration: none;">Cancel</a>
                </button>
            </div>
        </form>
    </div>
</div>
</body>

</html>


<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>
<?php require base_path('views/partials/footer.php') ?>