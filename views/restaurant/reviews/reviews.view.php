<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <h3 style="color: #555;">Store Reviews</h3>
  <div class="table--content">
    <table>
      <thead>
        <tr>
          <th>Review ID</th>
          <th>Customer Profile</th>
          <th>Review</th>
          <th>Ratings</th>
          <th>Reply</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reviews as $review) : ?>
          <tr>
            <td>
              <?= "#" . $review['reviewid'] ?> </td>
            <td>
              <div style="display: flex;flex-direction:row;gap:1rem;">
                <img src='<?= $review['profile'] ?>' width="50" height="50">
                <p style="color: #555;"> <?= $review['user_name'] ?></p>
              </div>
            </td>
            <td>
              <?= $review['review'] ?>
            </td>
            <td>
              <div style="display: flex;flex-direction:column;gap:1rem;">
                <?= $review['ratings'] ?>
                <p>
                  <?php
                  if (isset($review['ratings'])) {
                    $roundedRating = round($review['ratings']);
                    for ($i = 1; $i <= 5; $i++) {
                      if ($i <= $roundedRating) {
                        echo '<i class="fa-solid fa-star" style="color: gold;"></i> ';
                      } else {
                        echo '<i class="fa-regular fa-star" style="color: gray;"></i> ';
                      }
                    }
                    echo " (" . 'Review ' . $review['ratings'] . ")";
                  } else {
                    for ($i = 1; $i <= 5; $i++) {
                      echo '<i class="fa-regular fa-star" style="color: gray;"></i> ';
                    }
                  }
                  ?>
                </p>
              </div>
            </td>
            <td>
              <?php if (!empty($review['reply'])): ?>
                <div style="display: flex; flex-direction: column; gap: 1.5rem; max-width: 300px; overflow: hidden;">
                  <div class="upload-box" style="color: #1A4D2E; padding: 15px; border: 2px dashed #d1d1d1; border-radius: 8px; background: #fff; font-size: 14px; line-height: 1.5;">
                    <?= $review['reply'] ?>
                  </div>
                  <a href="/myreviews_rest/reply?id=<?= $review['reviewid'] ?>">
                    <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease; width: 100%; max-width: 150px;"; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
                      Edit reply
                    </button>
                  </a>
                </div>
              <?php else: ?>
                <a href="/myreviews_rest/reply?id=<?= $review['reviewid'] ?>">
                  <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease; width: 100%; max-width: 150px;"; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
                    Reply
                  </button>
                </a>
              <?php endif; ?>
            </td>
            <td>
              <?php if ($review['status'] != 'flagged'): ?>
                <button type="submit"  onclick="openPopup(<?= $review['reviewee_type_id'] ?>)" style="background: linear-gradient(90deg, #333333, #1a1a1a); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;"; this.style.background='linear-gradient(90deg, #1a1a1a, #333333)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.3)'; this.style.background='linear-gradient(90deg, #333333, #1a1a1a)'; this.style.boxShadow='none';">
                  <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#ffffff">
                    <path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
                  </svg>
                  Flag as inappropriate
                </button>
              <?php endif; ?>
            </td>

            <td>
              <button type="submit"  style="background: linear-gradient(90deg, #e57373, #d32f2f); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;"; this.style.background='linear-gradient(90deg, #d32f2f, #e57373)'; this.style.background='linear-gradient(90deg, #e57373, #d32f2f)';">
                <a href="/issues/restaurant?reviewid=<?= $review['reviewid'] ?>&review=<?= urlencode($review['review']) ?>">Report</a> </button>
            </td>
            </td>
            <div class="popup" id="popup-<?= $review['reviewee_type_id'] ?>" style="color: black;">
              <br>
              <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="grey">
                <path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
              </svg>
              <h2>Flag inappropriate</h2>
              <form action="/myreviews_rest/updateflagstore?id=<?php echo $review['reviewee_type_id'] ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="reviewee_type_id" value="<?= $review['reviewee_type_id'] ?>">
                <input type="hidden" name="reviewid" value="<?= $review['reviewid'] ?>">
                <p>By clicking yes you will flag the review inappropriate</p>
                <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
               >
                  <?php if ($review['status'] == 'flagged'): ?>
                    Unflag
                    <input type="hidden" name="status" value="<?= $review['status'] ?>">
                  <?php else: ?>
                    Flag
                    <input type="hidden" name="status" value="<?= $review['status'] ?>">
                  <?php endif; ?>
                </button>
              </form>
              <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
              onclick="closePopup_review(<?= $review['reviewee_type_id'] ?>)">Cancel</button>
            </div>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
  <h3 style="color: #555;">Cuisine Reviews</h3>
  <div class="table--content">
    <table>
      <thead>
        <tr>
          <th>Cuisine ID</th>
          <th>Review ID</th>
          <th>Customer Profile</th>
          <th>Review</th>
          <th>Ratings</th>
          <th>Reply</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cuisineReviews as $cuisineReview) : ?>
          <tr>
            <td><?= "#" . $cuisineReview['cuisineID'] ?> </td>
            <td><?= "#" . $cuisineReview['reviewid'] ?> </td>
            <td>
              <div style="display: flex;flex-direction:row;gap:1rem;">
                <img src='<?= $cuisineReview['profile'] ?>' width="50" height="50">
                <p style="color: #555;"> <?= $cuisineReview['user_name'] ?></p>
              </div>
            </td>
            <td>
              <?= isset($cuisineReview['review']) ? $cuisineReview['review'] : 'no reviews' ?>
            </td>
            <td>
              <div style="display: flex;flex-direction:column;gap:1rem;">
                <?= $cuisineReview['ratings'] ?>
                <p> <?php
                    if (isset($cuisineReview['ratings'])) {
                      $roundedRating = round($cuisineReview['ratings']);
                      for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $roundedRating) {
                          echo '<i class="fa-solid fa-star" style="color: gold;"></i> ';
                        } else {
                          echo '<i class="fa-regular fa-star" style="color: gray;"></i> ';
                        }
                      }
                      echo " (" . 'Review ' . $cuisineReview['ratings'] . ")";
                    } else {
                      for ($i = 1; $i <= 5; $i++) {
                        echo '<i class="fa-regular fa-star" style="color: gray;"></i> ';
                      }
                    }
                    ?> </p>
              </div>
            </td>
            <td><?php if (!empty($cuisineReview['reply'])): ?>
                <div style="display:flex;flex-direction:column;gap:2rem;max-width:300px;overflow:hidden;">
                  <div class="upload-box" style="color:#1A4D2E;;">
                    <?= $cuisineReview['reply'] ?>
                  </div>
                  <a href="/myreviews_rest/reply/cuisinereview?id=<?= $cuisineReview['reviewid'] ?>"> <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease; width: 100%; max-width: 150px;"; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
                    Edit reply</button></a>
                </div>
              <?php else: ?>
                <a href="/myreviews_rest/reply/cuisinereview?id=<?= $cuisineReview['reviewid'] ?>"> <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease; width: 100%; max-width: 150px;"; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
                Reply</button></a>
              <?php endif; ?>
            </td>

            <td>
              <?php if ($cuisineReview['status'] != 'flagged'): ?>
                <button type="submit"  onclick="openPopup(<?= $cuisineReview['cuisineID'] ?>)" style="background: linear-gradient(90deg, #333333, #1a1a1a); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;"; this.style.background='linear-gradient(90deg, #1a1a1a, #333333)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.3)'; this.style.background='linear-gradient(90deg, #333333, #1a1a1a)'; this.style.boxShadow='none';">
                  <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#ffffff">
                    <path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
                  </svg>
                  Flag as inappropriate
                </button>
              <?php endif; ?>
            </td>
            <td>
        
              <button type="submit"  style="background: linear-gradient(90deg, #e57373, #d32f2f); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;"; this.style.background='linear-gradient(90deg, #d32f2f, #e57373)'; this.style.background='linear-gradient(90deg, #e57373, #d32f2f)';">
                <a href="/issues/restaurant?reviewid=<?= $cuisineReview['reviewid'] ?>&review=<?= urlencode($cuisineReview['review']) ?>">Report</a> </button>
            </td>
            <div class="popup" id="popup-<?= $cuisineReview['cuisineID'] ?>" style="color: black;">
              <br>
              <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="grey">
                <path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
              </svg>
              <h2>Flag inappropriate</h2>
              <form action="/myreviews_rest/updateflag?id=<?php echo $cuisineReview['cuisineID'] ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="cuisineID" value="<?= $cuisineReview['cuisineID'] ?>">
                <input type="hidden" name="reviewid" value="<?= $cuisineReview['reviewid'] ?>">
                <p>By clicking yes you will flag the review inappropriate</p>
                <button type="submit"  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                  <?php if ($cuisineReview['status'] == 'flagged'): ?>
                    Unflag
                    <input type="hidden" name="status" value="<?= $cuisineReview['status'] ?>">
                  <?php else: ?>
                    Flag
                    <input type="hidden" name="status" value="<?= $cuisineReview['status'] ?>">
                  <?php endif; ?>
                </button>
              </form>
              <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
              onclick="closePopup_review(<?= $cuisineReview['cuisineID'] ?>)">Cancel</button>
            </div>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <h3 style="color: #555;">Flagged Reviews</h3>
  <div class="table--content">
    <table>
      <thead>
        <tr>
          <th>Review ID</th>
          <th>Review</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($FlaggedReviews as $FlaggedReview): ?>
          <tr>
            <td><?= "#" . $FlaggedReview['reviewid'] ?> </td>
            <td><?= isset($FlaggedReview['review']) ? $FlaggedReview['review'] : 'no reviews' ?></td>
            <td>
              <button type="submit"  onclick="openPopup(<?= $FlaggedReview['cuisineID'] ?>)" style=" text-aliign:center;background: linear-gradient(90deg, #4fc3f7, #0288d1); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;"; this.style.background='linear-gradient(90deg, #0288d1, #4fc3f7)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)'; this.style.background='linear-gradient(90deg, #4fc3f7, #0288d1)'; this.style.boxShadow='none';">
                <?php if ($FlaggedReview['status'] == 'flagged'): ?>
                  <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#ffffff">
                    <path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
                  </svg>
                  Unflag
                <?php endif; ?>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
        <?php foreach ($FlaggedStoreReviews as $FlaggedStoreReview): ?>
          <tr>
            <td><?= "#" . $FlaggedStoreReview['reviewid'] ?> </td>
            <td><?= isset($FlaggedStoreReview['review']) ? $FlaggedStoreReview['review'] : 'no reviews' ?></td>
            <td>
              <button type="submit"  onclick="openPopup(<?= $FlaggedStoreReview['reviewee_type_id'] ?>)" style="text-aliign:center; background: linear-gradient(90deg, #4fc3f7, #0288d1); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;"; this.style.background='linear-gradient(90deg, #0288d1, #4fc3f7)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)'; this.style.background='linear-gradient(90deg, #4fc3f7, #0288d1)'; this.style.boxShadow='none';">
                <?php if ($FlaggedStoreReview['status'] == 'flagged'): ?>
                  <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#ffffff">
                    <path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
                  </svg>
                  Unflag
                <?php endif; ?>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/review.php') ?>
<?php require base_path('views/partials/footer.php') ?>