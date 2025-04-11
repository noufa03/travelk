<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>
<?php require (BASE_PATH.'views/partials/user/script.php');?>

    <button class="btn btn-back" onclick="goBack()">Back</button>
    <div class="question-container">
        <div class="question active" id="q1">
            <h3>What is the main purpose of your trip?</h3>
            <div class="options">
                <div class="option">
                    <input type="checkbox" id="adventure" name="purpose[]" value="Adventure">
                    <label for="adventure">Adventure</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="relaxation" name="purpose[]" value="Relaxation">
                    <label for="relaxation">Relaxation</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="sightseeing" name="purpose[]" value="Sightseeing">
                    <label for="sightseeing">Sightseeing</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="cultural" name="purpose[]" value="Cultural exploration">
                    <label for="cultural">Cultural exploration</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="nature" name="purpose[]" value="Nature and Wildlife">
                    <label for="nature">Nature and Wildlife</label>
                </div>
            </div>
        </div>

        <div class="question" id="q2">
            <h3>Who are you traveling with?</h3>
            <div class="options">
                <div class="option">
                    <input type="checkbox" id="solo" name="companions[]" value="Solo Traveler">
                    <label for="solo">Solo Traveler</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="couple" name="companions[]" value="Couple">
                    <label for="couple">Couple</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="family" name="companions[]" value="Family with Kids">
                    <label for="family">Family with Kids</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="friends" name="companions[]" value="Friends">
                    <label for="friends">Friends</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="business" name="companions[]" value="Business Trip">
                    <label for="business">Business Trip</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="group" name="companions[]" value="Tour Group">
                    <label for="group">Tour Group</label>
                </div>
            </div>
        </div>

        <div class="question" id="q3">
            <h3>What type of environment do you enjoy?</h3>
            <div class="options">
                <div class="option">
                    <input type="checkbox" id="mountains" name="environment[]" value="Mountains">
                    <label for="mountains">Mountains</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="beaches" name="environment[]" value="Beaches">
                    <label for="beaches">Beaches</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="forests" name="environment[]" value="Forests">
                    <label for="forests">Forests</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="urban" name="environment[]" value="Urban/City">
                    <label for="urban">Urban/City</label>
                </div>
                <div class="option">
                    <input type="checkbox" id="countryside" name="environment[]" value="Countryside">
                    <label for="countryside">Countryside</label>
                </div>
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