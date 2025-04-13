<script type="text/javascript" defer>
    const toggleButton=document.getElementById('toggle-btn');
const sidebar = document.getElementById('sidebar');


function toggleSidebar(){
    sidebar.classList.toggle('close')
    toggleButton.classList.toggle('rotate')

 CloseAllSubMenus()

  
}


function  toggleSubMenu(button){

if(!button.nextElementSibling.classList.contains('show')){
    closeAllSubMenus()
}


button.nextElementSibling.classList.toggle('show')
button.classList.toggle('rotate')

if(sidebar.classList.contains('close')){
    sidebar.classList.toggle('close')
    toggleButton.classList.toggle('rotate')
}


}
// to have one drop down at atime
function closeAllSubMenus(){
    
    Array.from(sidebar.getElementsByClassName('show')).forEach((ul) => {
        ul.classList.remove('show');
        ul.previousElementSibling.classList.remove('rotate');
      });
    
    
}
//popup
function openPopup(tableid) {
    var popup = document.getElementById('popup-' + tableid); // Get the unique popup
    popup.classList.add("open-popup"); // Add class to show the popup
}
function openPopup2(tableid) {
    var popup = document.getElementById('popup-' + tableid); // Get the unique popup
    popup.classList.add("open-popup"); // Add class to show the popup
}

function closePopup(tableid) {
    var popup = document.getElementById('popup-' + tableid); // Get the unique popup
    popup.classList.remove("open-popup"); // Remove class to hide the popup
    window.location.href = "/tables"; // Redirect to the tables page
}

// reservation
function closePopup_reservation(tableid) {
    var popup = document.getElementById('popup-' + tableid); // Get the unique popup
    popup.classList.remove("open-popup"); // Remove class to hide the popup
    window.location.href = "/reservations"; // Redirect to the tables page
}

function  closePopup_cuisine(cuisineid){
       var popup = document.getElementById('popup-' + cuisineid); // Get the unique popup
    popup.classList.remove("open-popup"); // Remove class to hide the popup
    window.location.href = "/mymenus"; // Redirect to the tables page
    
}
function  closePopup_review(cuisineid){
       var popup = document.getElementById('popup-' + cuisineid); // Get the unique popup
    popup.classList.remove("open-popup"); // Remove class to hide the popup
    window.location.href = "/myreviews_rest"; // Redirect to the tables page
    
}
function  closePopup_review2(cuisineid){
       var popup = document.getElementById('popup-' + cuisineid); // Get the unique popup
    popup.classList.remove("open-popup"); // Remove class to hide the popup
    window.location.href = "/myreviews_rest"; // Redirect to the tables page
    
}


// let popup=document.getElementById('popup');



//  function openPopup(){
 
// popup.classList.add("open-popup");

// }

// function  closePopup(){
//     popup.classList.remove("open-popup");
//     window.location.href = "/mymenus";
    
// }

// function  cancelPopup(){
//     popup.classList.remove("open-popup");
 
    
// }

// function  closePopuptable(){
//     popup.classList.remove("open-popup");
//     window.location.href = "/tables";
    
// }



    function handleTableTypeChange() {
        const tableTypeSelect = document.getElementById("category");
        const customTableContainer = document.getElementById("custom-table-container");

        // Check if "Custom Table" is selected
        if (tableTypeSelect.value === "custom") {
            customTableContainer.style.display = "block"; // Show the custom table input
        } else {
            customTableContainer.style.display = "none"; // Hide the custom table input
        }
    }
    
    
    
    
        function handleReserveTypeChange() {
        const reserveTypeSelect = document.getElementById("tablepricetype");
        const customTableContainer = document.getElementById("tableprice-container");

        // Check if "Custom Table" is selected
        if (reserveTypeSelect.value === "NoCharge") {
            customTableContainer.style.display = "none"; // hide
        } else {
            customTableContainer.style.display = "block"; // show
        }
    }
    
    //edit handlecustom table
    
    function handleTableTypeChange() {
    const category = document.getElementById('category').value;
    const customTableContainer = document.getElementById('custom-table-container');
    const customTableInput = document.getElementById('customtable');

    if (category === 'custom') {
        customTableContainer.style.display = 'block';
        customTableInput.required = true;
    } else {
        customTableContainer.style.display = 'none';
        customTableInput.required = false;
        customTableInput.value = ''; // Clear input value
    }
}
//fiter
let field = document.querySelector('.table--content tbody'); // Adjusted to target the table body
let rows = Array.from(field.children); // Select all rows in the table
let select = document.getElementById('select'); // Dropdown for filtering
let originalRows = [...rows]; // Preserve the original order of rows

// Attach change event listener to the select dropdown
select.onchange = filterRows;

function filterRows() {
    let filterValue = this.value;

    // Clear current rows in the table
    while (field.firstChild) {
        field.removeChild(field.firstChild);
    }

    if (filterValue === 'Default') {
        // Reset to original order
        field.append(...originalRows);
    } else {
        // Filter rows based on selected cuisine type
        let filteredRows = rows.filter(row => {
            let cuisineTypeCell = row.querySelector('td:nth-child(4)'); // 4th column (Cuisine Type)
            return cuisineTypeCell.textContent.trim() === filterValue;
        });

        field.append(...filteredRows);
    }
}

// popup the welcome message

window.addEventListener("load",function(){
setTimeout(
function open(event){
document.querySelector(".popup2").style.display="block";
},
1000
)
})




document.querySelector("#close").addEventListener
("click",function(){
document.querySelector(".popup2").style.display="none";

})

// start here or profiel

  document.addEventListener("DOMContentLoaded", function () {
    let hasProfile = <?= json_encode(!empty($name)); ?>; // Check if the user has a profile

    if (hasProfile) {
      document.querySelector(".card--wrapper--starthere").style.display = "none";
    } else {
      document.querySelector(".card--wrapper--profile").style.display = "none";
    }
  });






    </script>
        
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>