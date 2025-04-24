<?php require (BASE_PATH.'views/partials/user/head.php');?>
<?php require (BASE_PATH.'views/partials/user/styles-trippage.php');?>
<?php require (BASE_PATH.'views/partials/user/right-logo.php');?>

<div class="trip-container">
  <div class="trip-container-left">
    <div class="trip-container-section">
      <?php if(!empty($selectedPlacesDetails)): ?>
        <div class="trip-container-left-item">
          <h4><i class='bx bx-map'></i> Picked Places</h4>
          <?= htmlspecialchars(count($selectedPlacesDetails)) ?>
        </div>
        <div class="trip-container-left-item-list">
          <?php foreach ($selectedPlacesDetails as $place): ?>
            <div><?= htmlspecialchars($place['display_name']) ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div id="traveler-form-change-places">
        <form method="POST" action="/planning/place">
          <button type="submit" class="next-button">Change Places</button>
        </form>
      </div>
    </div>
    <div class="trip-container-section">
      <?php if(!empty($selectedPlacesStayDetails)): ?>
        <div class="trip-container-left-item">
          <h4><i class='bx bxs-hotel'></i> Picked Stays</h4>
          <?= htmlspecialchars(count($selectedPlacesStayDetails)) ?>
        </div>
        <div class="trip-container-left-item-list">
          <?php foreach ($selectedPlacesStayDetails as $place): ?>
            <div><?= htmlspecialchars($place['display_name']) ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div id="traveler-form-change-places">
        <form method="POST" action="/planning/stay">
          <button type="submit" class="next-button">Change Stays</button>
        </form>
      </div>
    </div>
    <div class="trip-container-section">
      <?php if(!empty($selectedPlacesRestDetails)): ?>
        <div class="trip-container-left-item">
          <h4><i class='bx bx-restaurant'></i> Picked Restaurants</h4>
          <?= htmlspecialchars(count($selectedPlacesRestDetails)) ?>
        </div>
        <div class="trip-container-left-item-list">
          <?php foreach ($selectedPlacesRestDetails as $place): ?>
            <div><?= htmlspecialchars($place['display_name']) ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div id="traveler-form-change-places">
        <form method="POST" action="/planning/rest">
          <button type="submit" class="next-button">Change Restaurants</button>
        </form>
      </div>
    </div>
  </div>

  <div class="trip-container-middle">
    <div id="questions-container"></div>
    <div class="form-buttons">
      <button id="prevBtn" type="button">Previous</button>
      <button id="nextBtn" type="button">Next</button>
      <button id="resetBtn" type="button">Reset</button>
      <button id="submitBtn" type="submit" style="display:none;">Submit</button>
    </div>
  </div>

  <div class="trip-container-right">
    <div id="responses"></div>
  </div>
  <!-- <?php require (BASE_PATH.'views/partials/user/calender.php');?> -->
</div>

<script>
const questions = [
  // 1. Traveler Profile
  { label: "Nationality", name: "nationality", placeholder: "e.g., Germany", type: "text", note: "Auto-convert currency, provide country-specific travel tips." },
  { label: "Preferred Language", name: "language", placeholder: "e.g., English", type: "text", note: "Tailor recommendations (e.g., English-speaking guides)." },

  // 2. Trip Basics
  { label: "Start Date", name: "startDate", type: "date", note: "Calculate duration, check seasonality pricing." },
  { label: "End Date", name: "endDate", type: "date", note: "Calculate duration, check seasonality pricing." },
  { label: "Date Flexibility", name: "flexibleDates", type: "checkbox", note: "Suggest cheaper dates if budget exceeds." },

  // 3. Group Composition
  { label: "Number of Travelers", name: "num_travelers", type: "number", placeholder: "e.g., 4", note: "Calculate per-person costs." },
  { label: "Age Range", name: "age_range", type: "select", options: ["18-30", "30-50", "50+"], note: "Filter age-appropriate activities." },
  { label: "Traveler Type", name: "traveler_type", type: "select", options: ["Solo", "Family", "Couple", "Friends"], note: "Family vs. romantic vs. group itineraries differ." },

  // 4. Budget & Currency
  { label: "Total Budget", name: "budget", type: "range", min: 1000, max: 100000, step: 1000, value: 50000, note: "Core constraint for planning." },
  { label: "Currency Preference", name: "currency", type: "select", options: ["LKR", "USD", "EUR", "INR"], note: "Core constraint for planning." },
  { label: "Budget Preference", name: "budget_preference", type: "select", options: ["Luxury", "Mid-Range", "Budget"], note: "A $1k 'luxury' vs 'budget' trip differ radically." }
];

let currentQuestionIndex = 0;
const questionsContainer = document.getElementById("questions-container");
const responsesContainer = document.getElementById("responses");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");
const submitBtn = document.getElementById("submitBtn");
const resetBtn = document.getElementById("resetBtn");

function showQuestion(index) {
  questionsContainer.innerHTML = "";
  const q = questions[index];
  let inputHTML = "";
  if (q.type === "select") {
    inputHTML += `<select name="${q.name}" required>`;
    q.options.forEach(opt => inputHTML += `<option value="${opt}">${opt}</option>`);
    inputHTML += `</select>`;
  } else if (q.type === "checkbox") {
    inputHTML = `<input type="checkbox" name="${q.name}" />`;
  } else if (q.type === "range") {
    inputHTML = `<input type="range" name="${q.name}" min="${q.min}" max="${q.max}" step="${q.step}" value="${q.value}" oninput="this.nextElementSibling.textContent='${q.label}: '+this.value"> <span>${q.label}: ${q.value}</span>`;
  } else {
    inputHTML = `<input type="${q.type}" name="${q.name}" placeholder="${q.placeholder || ''}" required>`;
  }
  questionsContainer.innerHTML = `<label>${q.label}<br>${inputHTML}</label>`;

  prevBtn.style.display = index === 0 ? "none" : "inline-block";
  nextBtn.style.display = index < questions.length - 1 ? "inline-block" : "none";
  submitBtn.style.display = index === questions.length - 1 ? "inline-block" : "none";
}

function saveResponse() {
  const input = questionsContainer.querySelector("input, select");
  if (!input) return;
  const name = input.name;
  const value = input.type === "checkbox" ? input.checked : input.value;
  const existing = responsesContainer.querySelector(`[data-name="${name}"]`);
  if (existing) {
    existing.innerHTML = `<strong>${questions[currentQuestionIndex].label}:</strong> ${value}`;
  } else {
    const div = document.createElement("div");
    div.setAttribute("data-name", name);
    div.innerHTML = `<strong>${questions[currentQuestionIndex].label}:</strong> ${value}`;
    responsesContainer.appendChild(div);
  }
}

nextBtn.onclick = () => {
  saveResponse();
  if (currentQuestionIndex < questions.length - 1) {
    currentQuestionIndex++;
    showQuestion(currentQuestionIndex);
  }
};

prevBtn.onclick = () => {
  if (currentQuestionIndex > 0) {
    currentQuestionIndex--;
    showQuestion(currentQuestionIndex);
  }
};

resetBtn.onclick = () => {
  currentQuestionIndex = 0;
  responsesContainer.innerHTML = "";
  showQuestion(currentQuestionIndex);
};

submitBtn.onclick = (e) => {
  e.preventDefault();
  saveResponse();
  alert("Form submitted!");
};

showQuestion(currentQuestionIndex);
</script>

<!-- <style>
.trip-container { display: flex; gap: 20px; }
.trip-container-left, .trip-container-right { width: 25%; }
.trip-container-middle { width: 50%; }
.form-buttons { margin-top: 20px; display: flex; gap: 10px; }
</style> -->

<?php require (BASE_PATH.'views/partials/user/foot.php');?>

