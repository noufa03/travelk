<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/script.php');?>

    <button class="btn btn-back" onclick="goBack()">Back</button>
    <div class="question-container">
        <div class="question active" id="q1">
            <h3>What is the main purpose of your trip?</h3>
            <div class="options">
                <div class="option">Adventure</div>
                <div class="option">Relaxation</div>
                <div class="option">Sightseeing</div>
                <div class="option">Cultural exploration</div>
                <div class="option">Nature and Wildlife</div>
            </div>
        </div>

        <div class="question" id="q2">
            <h3>Who are you traveling with?</h3>
            <div class="options">
                <div class="option">Alone</div>
                <div class="option">Friends</div>
                <div class="option">Family (with kids)</div>
                <div class="option">Partner</div>
                <div class="option">Large group</div>
            </div>
        </div>

        <div class="question" id="q3">
            <h3>What type of environment do you enjoy?</h3>
            <div class="options">
                <div class="option">Mountains</div>
                <div class="option">Beaches</div>
                <div class="option">Forests</div>
                <div class="option">Urban/City</div>
                <div class="option">Countryside</div>
            </div>
        </div>
    </div>
    <div class="buttons">
        <button class="btn btn-next" onclick="nextQuestion()">Next</button>
        <button class="btn btn-skip" onclick="skipQuestion()">Skip</button>
        <button type="submit" class="btn btn-next-step" onclick="nextStep()">Next Step</button>
        <form id="searchForm" action="/planning/place" method="POST">
            <input type="hidden" name="selectedSearchOptions" id="selectedSearchOptionsInput">
        </form>
    </div>

<?php require (BASE_PATH.'views/partials/user/foot.php');?>