<?php require(BASE_PATH . 'views/partials/user/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/styles-trippage.php'); ?>

<div class="trip-container">
  <div class="trip-container-left">
    <div>
      <!-- Picked Places -->
      <div class="trip-container-section">
        <?php if (!empty($selectedPlacesDetails)): ?>
          <div class="trip-container-left-item">
            <h4><i class='bx bx-map'></i> Picked Places</h4>
            <span><?= htmlspecialchars(count($selectedPlacesDetails)) ?></span>
          </div>
          <div class="trip-container-left-item-list">
            <?php foreach ($selectedPlacesDetails as $place): ?>
              <div><?= htmlspecialchars($place['display_name']) ?></div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="change-places-form">
          <form method="POST" action="/planning/place">
            <button type="submit" class="change-button">Change Places</button>
          </form>
        </div>
      </div>

      <!-- Picked Stays -->
      <div class="trip-container-section">
        <?php if (!empty($selectedPlacesStayDetails)): ?>
          <div class="trip-container-left-item">
            <h4><i class='bx bxs-hotel'></i> Picked Stays</h4>
            <span><?= htmlspecialchars(count($selectedPlacesStayDetails)) ?></span>
          </div>
          <div class="trip-container-left-item-list">
            <?php foreach ($selectedPlacesStayDetails as $place): ?>
              <div><?= htmlspecialchars($place['display_name']) ?></div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="change-places-form">
          <form method="POST" action="/planning/stay">
            <button type="submit" class="change-button">Change Stays</button>
          </form>
        </div>
      </div>

      <!-- Picked Restaurants -->
      <div class="trip-container-section">
        <?php if (!empty($selectedPlacesRestDetails)): ?>
          <div class="trip-container-left-item">
            <h4><i class='bx bx-restaurant'></i> Picked Restaurants</h4>
            <span><?= htmlspecialchars(count($selectedPlacesRestDetails)) ?></span>
          </div>
          <div class="trip-container-left-item-list">
            <?php foreach ($selectedPlacesRestDetails as $place): ?>
              <div><?= htmlspecialchars($place['display_name']) ?></div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="change-places-form">
          <form method="POST" action="/planning/rest">
            <button type="submit" class="change-button">Change Restaurants</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Middle form -->
  <div class="trip-container-middle-form">
    <form id="travel-form" method="POST" action="/planning/trip/plan">
      <input type="hidden" name="place_ids" value="<?= htmlspecialchars(json_encode($selectedPlacesDetails)) ?>">
      <input type="hidden" name="stay_ids" value="<?= htmlspecialchars(json_encode($selectedPlacesStayDetails)) ?>">
      <input type="hidden" name="rest_ids" value="<?= htmlspecialchars(json_encode($selectedPlacesRestDetails)) ?>">
      <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">

      <div class="trip-container-middle">
        <!-- <div id="step-indicator">Step 1 of 12</div> -->
        <div id="questions-container"></div>
      </div>

      <div class="form-buttons">
        <button id="prevBtn" type="button">Previous</button>
        <button id="nextBtn" type="button">Next</button>
        <button id="submitBtn" type="submit" style="display:none;">Submit</button>
      </div>
    </form>
  </div>

  <div class="trip-container-right">
    <div id="responses" class="sticky-summary"></div>
    <!-- <?php require(BASE_PATH . 'views/partials/user/calender.php'); ?> -->
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const groupedQuestions = {
      "Your Travel Plans": [
        {
          label: "When does the trip start?",
          name: "startDate",
          type: "date",
          note: "We'll check for seasonal prices and events.",
          validate: (value) => {
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const startDate = new Date(value);
            if (startDate < today) {
              return "Start date cannot be in the past.";
            }
            return "";
          }
        },
        {
          label: "When does your trip end?",
          name: "endDate",
          type: "date",
          note: "Knowing your trip length helps us plan the best route.",
          validate: (value) => {
            const startDateInput = document.querySelector('input[name="startDate"]');
            if (!startDateInput) return "";
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(value);
            if (endDate <= startDate) {
              return "End date must be after the start date.";
            }
            return "";
          }
        },
        {
          label: "Are your dates flexible?",
          name: "flexibleDates",
          type: "checkbox",
          note: "We can suggest better or cheaper dates if you're flexible."
        }
      ],
      "Who's Traveling With You?": [
        {
          label: "How many people are going?",
          name: "num_travelers",
          type: "number",
          placeholder: "e.g., 4",
          note: "This helps us split costs and suggest suitable options.",
          validate: (value) => {
            const num = parseInt(value);
            if (isNaN(num) || num <= 0) {
              return "Number of travelers must be a positive number.";
            }
            return "";
          }
        },
        {
          label: "What's your age group?",
          name: "age_range",
          type: "select",
          options: ["18-30", "30-50", "50+"],
          note: "So we can recommend activities you'll actually enjoy."
        }
      ],
      "Money Matters": [
        {
          label: "What's your total trip budget?",
          name: "budget",
          type: "number",
          min: 1000,
          max: 100000,
          step: 1000,
          value: 50000,
          note: "We'll help you stay within your budget while making the most of your trip.",
          validate: (value) => {
            const num = parseInt(value);
            if (isNaN(num) || num < 1000 || num > 100000) {
              return "Budget must be between 1,000 and 100,000.";
            }
            return "";
          }
        }
      ]
    };

    const groupNames = Object.keys(groupedQuestions);
    const flatQuestions = groupNames.flatMap(name => groupedQuestions[name]);
    let currentQuestionIndex = 0;

    const questionsContainer = document.getElementById("questions-container");
    const responsesContainer = document.getElementById("responses");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const submitBtn = document.getElementById("submitBtn");

    function showQuestion(index) {
      const q = flatQuestions[index];
      const groupTitle = groupNames.find(name => groupedQuestions[name].includes(q));
      questionsContainer.innerHTML = `
        <div class='group-title'>

          <p>${q.note}</p>
        </div>
        <div class="input-wrapper">
          <label>${q.label}</label>
          ${q.type === "select" ? `
            <select name="${q.name}" required>
              ${q.options.map(opt => `<option value="${opt}">${opt}</option>`).join('')}
            </select>` :
            q.type === "checkbox" ? `<input type="checkbox" name="${q.name}">` :
            q.type === "range" ? `
              <div class='range-container'>
                <input type="range" name="${q.name}" min="${q.min}" max="${q.max}" step="${q.step}" value="${q.value}" oninput="document.getElementById('range-value-${q.name}').textContent='${q.label}: '+this.value">
                <span id="range-value-${q.name}">${q.label}: ${q.value}</span>
              </div>` :
            `<input type="${q.type}" name="${q.name}" placeholder="${q.placeholder || ''}" ${q.type !== "date" ? "required" : ""} ${q.min ? `min="${q.min}"` : ""} ${q.max ? `max="${q.max}"` : ""} ${q.step ? `step="${q.step}"` : ""} ${q.value ? `value="${q.value}"` : ""}>`
          }
          <span class="error-message" id="error-${q.name}"></span>
        </div>
      `;

      // Add real-time validation
      const input = questionsContainer.querySelector(`input[name="${q.name}"], select[name="${q.name}"]`);
      if (input && q.validate) {
        input.addEventListener("input", () => validateInput(input, q.validate));
      }

      prevBtn.style.display = index === 0 ? "none" : "inline-block";
      nextBtn.style.display = index < flatQuestions.length - 1 ? "inline-block" : "none";
      submitBtn.style.display = index === flatQuestions.length - 1 ? "inline-block" : "none";
      document.getElementById("step-indicator").textContent = `Step ${index + 1} of ${flatQuestions.length}`;
    }

    function validateInput(input, validateFn) {
      const value = input.type === "checkbox" ? input.checked : input.value;
      const error = validateFn ? validateFn(value) : "";
      const errorElement = document.getElementById(`error-${input.name}`);
      if (error) {
        input.classList.add("invalid");
        errorElement.textContent = error;
        showToast(error, "error");
      } else {
        input.classList.remove("invalid");
        errorElement.textContent = "";
      }
      return !error;
    }

    function validateCurrentQuestion() {
      const q = flatQuestions[currentQuestionIndex];
      const input = questionsContainer.querySelector(`input[name="${q.name}"], select[name="${q.name}"]`);
      if (!input) return true; // No validation for checkboxes without validate function
      return validateInput(input, q.validate);
    }

    function saveResponse() {
      const input = questionsContainer.querySelector("input, select");
      if (!input) return;
      const value = input.type === "checkbox" ? input.checked : input.value;
      const name = input.name;
      const existing = responsesContainer.querySelector(`[data-name="${name}"]`);
      if (existing) {
        existing.querySelector(".response-value").textContent = value;
      } else {
        const div = document.createElement("div");
        div.className = "response-item";
        div.setAttribute("data-name", name);
        div.innerHTML = `<strong>${flatQuestions[currentQuestionIndex].label}:</strong> <span class="response-value">${value}</span> <button type="button" onclick="editAnswer('${name}')">Edit</button>`;
        responsesContainer.appendChild(div);
      }
    }

    window.editAnswer = function(name) {
      const index = flatQuestions.findIndex(q => q.name === name);
      if (index !== -1) {
        currentQuestionIndex = index;
        showQuestion(currentQuestionIndex);
      }
    };

    nextBtn.addEventListener("click", () => {
      if (!validateCurrentQuestion()) return;
      saveResponse();
      currentQuestionIndex++;
      showQuestion(currentQuestionIndex);
    });

    prevBtn.addEventListener("click", () => {
      currentQuestionIndex--;
      showQuestion(currentQuestionIndex);
    });

    document.getElementById("travel-form").addEventListener("submit", function(e) {
      e.preventDefault();
      if (!validateCurrentQuestion()) return;

      // Collect user responses dynamically
      const formData = {};
      responsesContainer.querySelectorAll(".response-item").forEach(div => {
        const key = div.getAttribute("data-name");
        const value = div.querySelector(".response-value").textContent;
        formData[key] = value;
      });

      // Validate all inputs before submission
      let isValid = true;
      flatQuestions.forEach((q, index) => {
        if (q.validate) {
          const value = formData[q.name];
          if (value && q.validate(value)) {
            isValid = false;
            showToast(q.validate(value), "error");
          }
        }
      });

      if (!isValid) return;

      // Remove existing dynamic inputs
      document.querySelectorAll(".dynamic-hidden").forEach(el => el.remove());

      // Create hidden fields for each input
      for (const key in formData) {
        const hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = key;
        hiddenInput.value = formData[key];
        hiddenInput.classList.add("dynamic-hidden");
        this.appendChild(hiddenInput);
      }

      this.submit();
    });

    showQuestion(currentQuestionIndex);
  });
</script>

<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/foot.php'); ?>