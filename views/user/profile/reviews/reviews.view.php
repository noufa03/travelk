<?php require base_path("views/partials/rental/styles/main.php"); ?>
<?php require base_path("views/partials/rental/styles/dashboard.php"); ?>
<?php require base_path('views/partials/user/sidebar_trav.php'); ?>



<div style="background: #f0f2f5; min-height: 100vh; font-family: 'Segoe UI', Arial, sans-serif;">
<?php require base_path('views/partials/user/header.php') ?>
<div style="padding: 30px 20px; max-width: 1400px; margin: 0 auto;">
<?php require base_path('views/partials/user/heading.php') ?>

 
<div class="table--content" style="margin: 0 0 50px 20px; display: flex; justify-content: center; ">
    <table style="width: 100%; border-collapse: collapse; background-color: #fff; border-radius: 10px; box-shadow: 0 3px 15px rgba(0,0,0,0.08); border-radius: 10px;">
        <thead>
            <tr>
                <th style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; background-color: #f8fbf8; color: #444; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">Review</th>
                <th style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; background-color: #f8fbf8; color: #444; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">Ratings</th>
                <th style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; background-color: #f8fbf8; color: #444; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">Reply</th>
                <th style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; background-color: #f8fbf8; color: #444; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;"></th>
                <th style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; background-color: #f8fbf8; color: #444; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review) : ?>
            <tr>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;"><?= $review['review'] ?></td>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;"><?= $review['ratings'] ?></td>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;"><?= $review['reply'] ?></td>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;">
                    <form method="POST" action="/review/delete">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="reviewid" value="<?= $review['reviewid'] ?>">
                        <button type="submit" style="background-color: #5EBC67; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 500; transition: background-color 0.2s; border: none; cursor: pointer; display: inline-block;">Remove</button>
                    </form>
                </td>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;"></td>
            </tr>
            <?php endforeach; ?>
            <?php foreach ($cuisine_reviews as $cuisine_review) : ?>
            <tr>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;"><?= $cuisine_review['review'] ?></td>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;"><?= $cuisine_review['ratings'] ?></td>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;"><?= $cuisine_review['reply'] ?></td>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;">
                    <form method="POST" action="/review/delete">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="cuisine_reviewid" value="<?= $cuisine_review['reviewid'] ?>">
                        <button type="submit" style="background-color: #5EBC67; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 500; transition: background-color 0.2s; border: none; cursor: pointer; display: inline-block;">Remove</button>
                    </form>
                </td>
                <td style="text-align: left; padding: 14px 16px; border-bottom: 1px solid #eaeef2; color: #555; font-size: 14px; vertical-align: middle;"></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
 
<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
