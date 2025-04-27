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
            <?= htmlspecialchars(count($selectedPlacesDetails)) ?>
          </div>
          <div class="trip-container-left-item-list">
            <?php foreach ($selectedPlacesDetails as $place): ?>
              <div><?= htmlspecialchars($place['display_name']) ?></div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="change-places-form">
          <form method="POST" action="/planning/place">
            <button type="submit" class="next-button">Change Places</button>
          </form>
        </div>
      </div>

      <!-- Picked Stays -->
      <div class="trip-container-section">
        <?php if (!empty($selectedPlacesStayDetails)): ?>
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
        <div class="change-places-form">
          <form method="POST" action="/planning/stay">
            <button type="submit" class="next-button">Change Stays</button>
          </form>
        </div>
      </div>

      <!-- Picked Restaurants -->
      <div class="trip-container-section">
        <?php if (!empty($selectedPlacesRestDetails)): ?>
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
        <div class="change-places-form">
          <form method="POST" action="/planning/rest">
            <button type="submit" class="next-button">Change Restaurants</button>
          </form>
        </div>
      </div>
    </div>

    <div class="trip-container-right">
      <div id="responses"></div>
      <!-- <?php require(BASE_PATH . 'views/partials/user/calender.php'); ?> -->
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
        <div id="step-indicator">Step 1 of 12</div>
        <div id="questions-container"></div>
      </div>

      <div class="form-buttons">
        <button id="prevBtn" type="button">Previous</button>
        <button id="nextBtn" type="button">Next</button>
        <button id="submitBtn" type="submit" style="display:none;">Submit</button>
      </div>
    </form>
  </div>


</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const groupedQuestions = {
      "Your Travel Plans": [{
          label: "When does the trip start?",
          name: "startDate",
          type: "date",
          note: "We'll check for seasonal prices and events."
        },
        {
          label: "When does your trip end?",
          name: "endDate",
          type: "date",
          note: "Knowing your trip length helps us plan the best route."
        },
        {
          label: "Are your dates flexible?",
          name: "flexibleDates",
          type: "checkbox",
          note: "We can suggest better or cheaper dates if you're flexible."
        }
      ],
      "Who's Traveling With You?": [{
          label: "How many people are going?",
          name: "num_travelers",
          type: "number",
          placeholder: "e.g., 4",
          note: "This helps us split costs and suggest suitable options."
        },
        {
          label: "What's your age group?",
          name: "age_range",
          type: "select",
          options: ["18-30", "30-50", "50+"],
          note: "So we can recommend activities you'll actually enjoy."
        }
      ],
      "Money Matters": [{
        label: "What's your total trip budget?",
        name: "budget",
        type: "number",
        min: 1000,
        max: 100000,
        step: 1000,
        value: 50000,
        note: "We'll help you stay within your budget while making the most of your trip."
      }],
      // "Tell Us About You": [{
      //     label: "Where are you from?",
      //     name: "your_country",
      //     placeholder: "Sri Lanka",
      //     type: "text",
      //     note: "This helps us plan better and show prices in your currency if you're not from Sri Lanka."
      //   },
      //   {
      //     label: "Preferred currency?",
      //     name: "currency",
      //     type: "select",
      //     options: ["LKR", "USD", "EUR", "INR"],
      //     note: "We'll show prices in the currency you prefer."
      //   }
      // ]
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
      <div class='group-title'><h3>${groupTitle}</h3><p>${q.note}</p></div>
      <label>${q.label}<span class="tooltip" title="${q.note}"></span><br>
        ${q.type === "select" ? `
          <select name="${q.name}" required>
            ${q.options.map(opt => `<option value="${opt}">${opt}</option>`).join('')}
          </select>` :
          q.type === "checkbox" ? `<input type="checkbox" name="${q.name}">` :
          q.type === "range" ? `
            <div class='range-container'>
              <input type="range" name="${q.name}" min="${q.min}" max="${q.max}" step="${q.step}" value="${q.value}" oninput="document.getElementById('range-value').textContent='${q.label}: '+this.value">
              <span id="range-value">${q.label}: ${q.value}</span>
            </div>` :
          `<input type="${q.type}" name="${q.name}" placeholder="${q.placeholder || ''}" required>`
        }
      </label>
    `;

      prevBtn.style.display = index === 0 ? "none" : "inline-block";
      nextBtn.style.display = index < flatQuestions.length - 1 ? "inline-block" : "none";
      submitBtn.style.display = index === flatQuestions.length - 1 ? "inline-block" : "none";
      document.getElementById("step-indicator").textContent = `Step ${index + 1} of ${flatQuestions.length}`;
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
    }

    nextBtn.addEventListener("click", () => {
      saveResponse();
      currentQuestionIndex++;
      showQuestion(currentQuestionIndex);
    });

    prevBtn.addEventListener("click", () => {
      currentQuestionIndex--;
      showQuestion(currentQuestionIndex);
    });

    document.getElementById("travel-form").addEventListener("submit", function(e) {
      e.preventDefault(); // prevent default first

      // ✅ Remove existing dynamic inputs
      document.querySelectorAll(".dynamic-hidden").forEach(el => el.remove());

      // ✅ Collect user responses dynamically
      const formData = {};
      responsesContainer.querySelectorAll(".response-item").forEach(div => {
        const key = div.getAttribute("data-name");
        const value = div.querySelector(".response-value").textContent;
        formData[key] = value;
      });

      // ✅ Create hidden fields for each input
      for (const key in formData) {
        const hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = key;
        hiddenInput.value = formData[key];
        hiddenInput.classList.add("dynamic-hidden");
        this.appendChild(hiddenInput);
      }

      this.submit(); // now allow submit
    });

    showQuestion(currentQuestionIndex);
  });
</script>

<?php require(BASE_PATH . 'views/partials/user/foot.php'); ?>