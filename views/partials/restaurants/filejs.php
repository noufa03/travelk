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


let popup=document.getElementById('popup');

 function openPopup(){
popup.classList.add("open-popup");

}

function  closePopup(){
    popup.classList.remove("open-popup");
    window.location.href = "/mymenus";
    
}


function  closePopuptable(){
    popup.classList.remove("open-popup");
    window.location.href = "/tables";
    
}



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


    </script>
        
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>