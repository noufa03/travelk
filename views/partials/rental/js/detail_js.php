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
  
   
document.getElementById('profile_picture').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});




  


</script>