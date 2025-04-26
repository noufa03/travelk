<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <p style="font-size: 18px; color: #555;">
        Customer / FAQS
    </p>
    <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
    <a href='/faq/add?id=<?= $userid ?>'>
    + Add FAQ</a></button>
    <div class="table--content">
        <table>
            <thead>
                <tr>
                    <th> ID</th>
                    <th>Questions</th>
                    <th>answer</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions as $question): ?>
                    <tr>
                        <td># <?= $question['id'] ?></td>

                        <td><?= $question['question'] ?></td>
                        <td><?= isset($question['answer']) ? $question['answer'] : 'no reply' ?></td>
                        <td> <a href="/faq/edit?id=<?= $question['id'] ?>"> <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
                        Edit</button></a></td>
                        <td>
                            <div id="delete-form">
                                <button type="submit" style="background: linear-gradient(90deg, #e57373, #d32f2f); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #d32f2f, #e57373)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #e57373, #d32f2f)'; this.style.boxShadow='none';"
                                onclick="openPopup(<?= $question['id'] ?>)">Delete</button>
                                <div class="popup" id="popup-<?= $question['id'] ?>" style="color: black;">
                                    <img src="/restaurants/menus/tick.svg" alt="">
                                    <h2>Confirm</h2>

                                    <form id="delete-form-<?= $question['id'] ?>" method="POST" action="/faq/delete">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="<?= $question['id'] ?>">
                                        <p>Note that this faq will be deleted permanently from your faq list. Are you sure?</p>
                                        <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                                        Delete</button>
                                    </form>
                                    <button type="reset" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                    onclick="closePopup_Faq(<?= $question['id'] ?>)">Cancel</button>

                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <div>
    </div>
</div>
<?php require (BASE_PATH.'views/partials/user/toast.php');?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>