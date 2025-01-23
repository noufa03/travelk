<!-- one menu item -->


<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>

<main>


          <!-- pop up -->
        <div class="popup" id="popup" style="color: black;">
        <img src="/restaurants/menus/tick.svg" alt="">
        <h2>success!</h2>
        <p>New menu item is successfully added to your menu list </p>
        <button type="submit" onclick="closePopup()">Ok</button>
 </div>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline">go back...</a>
        </p>

        <p><?= htmlspecialchars($cuisine['resID']) ?></p>
        <p><?= htmlspecialchars($cuisine['cuisine_name']) ?></p>
        <p><?= htmlspecialchars($cuisine['cuisine_type']) ?></p>
        <p><?= htmlspecialchars($cuisine['description']) ?></p>

        <footer class="mt-6">
            <a href="/menu/edit?cid=<?= $cuisine['cuisineID'] ?>" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>
        </footer>
    </div>
</main>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>


