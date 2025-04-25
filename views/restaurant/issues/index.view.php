<?php require base_path('views/partials/restaurants/styles/issues.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <p style="font-size: 18px; color: #555;">
    General / Report Issue
  </p>
  <div class="form--content">
    <form method="POST" enctype="multipart/form-data">
      <div class="first--row" style="display: grid;grid-template-rows: 1fr 2fr">
        <div class="form-group">

          <input type="hidden" id="reviewid" name="reviewid" value="<?= $_GET['reviewid'] ?? null ?>">
        </div>
        <?php if (isset($_GET['reviewid'])): ?>
          <div class="form-group">
            <label for="review">Review:</label>
            <input type="text" name="review" value="<?= $_GET['review'] ?>" disabled>
          </div>
        <?php endif; ?>

        <div class="form-group">
          <label for="reportIssue">Issue:</label>
          <input type="text" name="reportIssue">
        </div>
        <div class="form-group">
          <label for="issue">Provide Details (optional):</label><br>
          <textarea name="issue" id="issue" cols="75" rows="10"></textarea>
        </div>
      </div>
      <div class="second--row">
        <button type="submit" class="btn btn-submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 24px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
          Report Issue
        </button>
        <button type="reset" class="btn btn-cancel" style="background: #ffffff; color: #60a56a; padding: 10px 24px; border-radius: 6px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff'; this.style.boxShadow='none';">
          Cancel
        </button>
      </div>
    </form>
  </div>
  <p style="font-size: 18px; color: #555;">
    Reported Issues
  </p>
  <div class="table--content">
    <table>
      <thead>
        <tr>
          <th>Issue</th>
          <th>status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($issues as $issue) : ?>
          <tr>
            <td><?= $issue['issue'] ?></td>
            <td><?= $issue['status'] ?></td>
            <td>
              <form method="POST" action="/issues/delete">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="issueid" value="<?= $issue['issueid'] ?>">
                <?php if ($issue['status'] == 'pending'): ?>
                  <button type="submit" style="background: linear-gradient(90deg, #e57373, #d32f2f); color: #ffffff; padding: 10px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #d32f2f, #e57373)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #e57373, #d32f2f)';">
                    Remove</button>
                <?php endif; ?>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</body>

</html>
<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>
<?php require base_path('views/partials/footer.php') ?>