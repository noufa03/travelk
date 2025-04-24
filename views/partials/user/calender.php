<div class="custom-calendar">
  <div class="calendar-header">
    <button class="nav-btn prev-btn">←</button>
    <div class="month-year"></div>
    <button class="nav-btn next-btn">→</button>
  </div>

  <div class="calendar-days">
    <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div>
    <div>Thu</div><div>Fri</div><div>Sat</div>
  </div>

  <div class="calendar-dates"></div>

  <style>
    .custom-calendar {
      display: inline-block;
      border: 1px solid #ddd;
      padding: 1rem;
      border-radius: 12px;
      width: 100%;
      max-width: 320px;
      font-family: 'Segoe UI', sans-serif;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      background: #fff;
    }

    .calendar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0.8rem;
    }

    .month-year {
      font-size: 1.2rem;
      font-weight: 600;
    }

    .nav-btn {
      background-color: #f0f0f0;
      border: none;
      padding: 6px 12px;
      font-size: 1rem;
      cursor: pointer;
      border-radius: 6px;
      transition: background-color 0.2s;
    }

    .nav-btn:hover {
      background-color: #e0e0e0;
    }

    .calendar-days, .calendar-dates {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      text-align: center;
    }

    .calendar-days div {
      font-weight: bold;
      padding: 5px 0;
      color: #555;
    }

    .calendar-dates div {
      padding: 10px;
      margin: 2px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.2s, color 0.2s;
    }

    .calendar-dates div:hover {
      background-color: #f1f1f1;
    }

    .calendar-dates .selected {
      background-color: #007bff;
      color: #fff;
    }

    .calendar-dates .today {
      border: 2px solid #007bff;
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

      const today = new Date();
      today.setHours(0, 0, 0, 0);

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
          const thisDate = new Date(year, month, i);
          dateDiv.textContent = i;

          if (thisDate.getTime() === today.getTime()) {
            dateDiv.classList.add("today");
          }

          if (selectedDate && thisDate.getTime() === selectedDate.getTime()) {
            dateDiv.classList.add("selected");
          }

          dateDiv.title = thisDate.toDateString();

          dateDiv.addEventListener("click", () => {
            selectedDate = thisDate;
            renderCalendar(); // re-render to update selected state
            console.log("Selected:", selectedDate.toDateString());
          });

          datesEl.appendChild(dateDiv);
        }
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
