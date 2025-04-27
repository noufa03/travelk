<?php require base_path("views/partials/rental/styles/main.php"); ?>
<?php require base_path("views/partials/rental/styles/dashboard.php"); ?>
<?php require base_path('views/partials/user/sidebar_trav.php'); ?>

<div style="background: #f0f2f5; min-height: 100vh;">
    <!-- Header -->
    <?php require base_path('views/partials/user/header.php') ?>

    <!-- Main Container -->
    <div style="padding: 30px 20px; max-width: 1400px; margin: 0 auto;">
        <!-- Heading -->
        <?php require base_path('views/partials/user/heading.php') ?>

        <!-- Table Container -->
        <div style="margin: 0 0 50px 0; display: flex; justify-content: center;">
            <div style="background: linear-gradient(135deg, #ffffff, #f8fafc); border-radius: 12px; box-shadow: 0 6px 16px rgba(0,0,0,0.15); width: 100%; overflow: hidden;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="text-align: left; padding: 16px 20px; background: linear-gradient(135deg, #f5f7fa, #ffffff); color: #333; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e0e0e0;">Review</th>
                            <th style="text-align: left; padding: 16px 20px; background: linear-gradient(135deg, #f5f7fa, #ffffff); color: #333; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e0e0e0;">Ratings</th>
                            <th style="text-align: left; padding: 16px 20px; background: linear-gradient(135deg, #f5f7fa, #ffffff); color: #333; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e0e0e0;">Reply</th>
                            <th style="text-align: left; padding: 16px 20px; background: linear-gradient(135deg, #f5f7fa, #ffffff); color: #333; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e0e0e0;">Action</th>
                            <th style="text-align: left; padding: 16px 20px; background: linear-gradient(135deg, #f5f7fa, #ffffff); color: #333; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e0e0e0;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reviews as $review) : ?>
                            <tr style="transition: background 0.2s ease;">
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;"><?= htmlspecialchars($review['review']) ?></td>
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;"><?= htmlspecialchars($review['ratings']) ?></td>
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;"><?= htmlspecialchars($review['reply']) ?></td>
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;">
                                    <form method="POST" action="/review/delete">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="reviewid" value="<?= $review['reviewid'] ?>">
                                        <button type="submit" style="background: linear-gradient(90deg, #dc3545, #c82333); color: #ffffff; padding: 8px 16px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #c82333, #dc3545)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #dc3545, #c82333)';">Remove</button>
                                    </form>
                                </td>
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;"></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($cuisine_reviews as $cuisine_review) : ?>
                            <tr style="transition: background 0.2s ease;">
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;"><?= htmlspecialchars($cuisine_review['review']) ?></td>
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;"><?= htmlspecialchars($cuisine_review['ratings']) ?></td>
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;"><?= htmlspecialchars($cuisine_review['reply']) ?></td>
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;">
                                    <form method="POST" action="/review/delete">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="cuisine_reviewid" value="<?= $cuisine_review['reviewid'] ?>">
                                        <button type="submit" style="background: linear-gradient(90deg, #dc3545, #c82333); color: #ffffff; padding: 8px 16px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #c82333, #dc3545)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #dc3545, #c82333)';">Remove</button>
                                    </form>
                                </td>
                                <td style="text-align: left; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; color: #555; font-size: 14px; vertical-align: middle;"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <?php require (BASE_PATH . 'views/partials/user/foot.php'); ?>
    </div>
</div>

<?php require (BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path("views/partials/restaurants/filejs.php"); ?>