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

          <!-- <input type="hidden" id="userid" name="userid" value="<?= $_GET['id'] ?>"> -->
        </div>
        <div class="form-group">
          <label for="reportIssue">Select Issue Type:</label>
          <select name="reportIssue" id="reportIssue">
            <option value="competitorViolation">Competitor Violation (Platform guidelines or stealing content)</option>
            <option value="fakeReview">Fake Reviews or Feedback (Spam, malicious content)</option>
            <option value="customerAbuse">Customer Abuse (Abusive behavior, fake complaints)</option>
            <option value="fraudulentActivity">Fraudulent Activities (Suspicious activity or misuse of business name)</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="issue">Provide Details (optional):</label><br>
          <textarea name="issue" id="issue" cols="75" rows="10"></textarea>
        </div>
      </div>
      <div class="second--row">
        <button type="submit" class="btn btn-submit">
          Report Issue
        </button>
        <button type="reset" class="btn btn-cancel">Cancel</button>
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
                <button type="submit" class="btn btn-submit">Remove</button>
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
<?php require (BASE_PATH.'views/partials/user/toast.php');?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>
<?php require base_path('views/partials/footer.php') ?>