<div class="custom-calendar">
  <div class="calendar-header">
    <button class="prev-btn">←</button>
    <div class="month-year"></div>
    <button class="next-btn">→</button>
  </div>
  <div class="calendar-days">
    <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div>
    <div>Thu</div><div>Fri</div><div>Sat</div>
  </div>
  <div class="calendar-dates"></div>

  <style>
    .custom-calendar {
      display: inline-block;
      border: 1px solid #ccc;
      padding: 1rem;
      border-radius: 10px;
      width: 300px;
      font-family: Arial, sans-serif;
    }

    .custom-calendar .calendar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }

    .custom-calendar .calendar-days,
    .custom-calendar .calendar-dates {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      text-align: center;
    }

    .custom-calendar .calendar-days div {
      font-weight: bold;
    }

    .custom-calendar .calendar-dates div {
      padding: 10px;
      cursor: pointer;
      border-radius: 50%;
    }

    .custom-calendar .calendar-dates div:hover {
      background-color: #e0e0e0;
    }

    .custom-calendar .calendar-dates .selected {
      background-color: #007bff;
      color: white;
    }
  </style>

  <script>
    (function () {
      const calendar = document.currentScript.closest(".custom-calendar");
      const monthYearEl = calendar.querySelector(".month-year");
      const datesEl = calendar.querySelector(".calendar-dates");
      const prevBtn = calendar.querySelector(".prev-btn");
      const nextBtn = calendar.querySelector(".next-btn");

      let currentDate = new Date();
      let selectedDate = null;

      function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        monthYearEl.textContent = currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
        datesEl.innerHTML = "";

        for (let i = 0; i < firstDay; i++) {
          datesEl.innerHTML += `<div></div>`;
        }

        for (let i = 1; i <= lastDate; i++) {
          const dateDiv = document.createElement("div");
          dateDiv.textContent = i;
          dateDiv.addEventListener("click", () => {
            selectedDate = new Date(year, month, i);
            highlightSelected(dateDiv);
            console.log("Selected:", selectedDate.toDateString());
          });
          datesEl.appendChild(dateDiv);
        }
      }

      function highlightSelected(selectedDiv) {
        calendar.querySelectorAll(".calendar-dates div").forEach(div => div.classList.remove("selected"));
        selectedDiv.classList.add("selected");
      }

      prevBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
      });

      nextBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
      });

      renderCalendar();
    })();
  </script>
</div>