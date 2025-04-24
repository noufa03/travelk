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
                    <div class="form-group">
                        <?php $oldSizes = is_array(old('sizes')) ? old('sizes') : []; ?>
                        <label>Portion Sizes:</label><br>
                        <div class="checkbox-group">
                            <label>
                                <input type="checkbox" id="size-small" name="sizes[]" value="small" onchange="togglePrice('small')" <?php if (in_array('small', $oldSizes)) echo 'checked'; ?>>
                                Small
                            </label>
                            <label>
                                <input type="checkbox" id="size-medium" name="sizes[]" value="medium" onchange="togglePrice('medium')" <?php if (in_array('medium', $oldSizes)) echo 'checked'; ?>>
                                Medium
                            </label>
                            <label>
                                <input type="checkbox" id="size-large" name="sizes[]" value="large" onchange="togglePrice('large')" <?php if (in_array('large', $oldSizes)) echo 'checked' ?>>
                                Large
                            </label>
                        </div>
                        <?php if (isset($errors['sizes'])) : ?>
                            <li class="error-text"><?= $errors['sizes'] ?></li>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <?php $oldPrices = is_array(old('prices')) ? old('prices') : []; ?>
                        <label for="price">Price (Rs):</label><br>
                        <input type="number" id="price_small" class="price-input" value="<?= $oldPrices['small'] ?? '' ?>" name="prices[small]" step="0.01" placeholder="Price for Small">
                        <input type="number" id="price_medium" class="price-input" value="<?= $oldPrices['medium'] ?? '' ?>" name="prices[medium]" step="0.01" placeholder="Price for Medium">
                        <input type="number" id="price_large" class="price-input" value="<?= $oldPrices['large'] ?? '' ?>" name="prices[large]" step="0.01" placeholder="Price for Large">
                        <p style="color: red; font-size: smaller;">Mention prices for all the sizes selected</p>
                    </div>
                    <?php if (isset($errors['prices']) && is_array($errors['prices'])) : ?>
                        <?php foreach ($errors['prices'] as $priceError) : ?>
                            <li class="error-text"><?= $priceError ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
                <button type="submit" class="btn btn-submit">
                    Add Cuisine
                </button>
                
                <button type="reset" class="btn btn-cancel"><a href="/mymenus">Cancel</a></button>
            </div>
        </form>
    </div>
</div>
</body>

</html>
<script>
    function togglePrice(size) {
        const checkbox = document.getElementById(`size-${size}`);
        const priceInput = document.getElementById(`price_${size}`);
        if (checkbox.checked) {
            priceInput.style.display = 'inline-block';
        } else {
            priceInput.style.display = 'none';
            priceInput.value = '';
        }
    }


    window.onload = function() {
        ['small', 'medium', 'large'].forEach(size => {
            togglePrice(size);
        });
    };
</script>

<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>
<?php require base_path('views/partials/footer.php') ?>