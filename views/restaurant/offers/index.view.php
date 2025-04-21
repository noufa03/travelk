<?php require base_path('views/partials/restaurants/styles/offers/offers.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <button class="btn btn-submit"> <a href="/myoffers/add?id=<?= $userid ?>">+ Add Offers</a></button>
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
                            <a href="/offers/edit?id=<?= $offer['offer_id']  ?>"><button type="submit">Edit </button></a>
                        <td>
                            <form id="delete-form" method="POST" action="/offers/delete">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="offer_id" value="<?= $offer['offer_id'] ?>">
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </span>
    </div>
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>