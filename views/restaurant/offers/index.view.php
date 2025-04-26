<?php require base_path('views/partials/restaurants/styles/offers/offers.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
    <a href="/myoffers/add?id=<?= $userid ?>">+ Add Offers</a></button>
    <div class="table--content">
        <table>
            <thead>
                <tr>
                    <th>Offer ID</th>
                    <th>Offer Name</th>

                    <th>Description</th>
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Discount percentage</th>
                    <th>cuisine ID(optional)</th>
                    <th>active</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offers as $offer) : ?>
                    <tr>
                        <td><?= '#' . $offer['offer_id'] ?></td>
                        <td><?= $offer['offer_title'] ?></td>
                        <td><?= $offer['offer_description'] ?></td>
                        <td><?= $offer['start_time'] ?></td>
                        <td><?= $offer['end_time'] ?></td>
                        <td><?= $offer['discount_percentage'] ?></td>
                        <td><?= $offer['cuisineID'] ?></td>
                        <td><?= ($offer['is_active'] == 'active') ? 'active' : 'inactive'
                            ?></td>
                        <td>
                            <a href="/offers/edit?id=<?= $offer['offer_id'] ?>">
                                <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td>
                            <form id="delete-form" method="POST" action="/offers/delete" style="display: inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $offer['offer_id'] ?>">
                                <button type="submit" class="delete" style="background: linear-gradient(90deg, #e57373, #d32f2f); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #d32f2f, #e57373)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #e57373, #d32f2f)'; this.style.boxShadow='none';">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </span>
    </div>
</div>
<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>