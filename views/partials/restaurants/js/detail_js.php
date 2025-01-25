<script>
  function updateCityField() {
    const district = document.getElementById("district").value;
    const cityInput = document.getElementById("city");
    
    // Example behavior based on district selection:
 if (district) {
  cityInput.placeholder = "Enter a city in " + district;
} else {
  cityInput.placeholder = "Enter a city";
}
  }
  
  
  
  


</script>