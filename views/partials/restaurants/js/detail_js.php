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
  
     document.getElementById('profile').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('preview');
                    img.src = e.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
        
        
             document.getElementById('photos').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('preview2');
                    img.src = e.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
  
  
 
             document.getElementById('logo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('preview3');
                    img.src = e.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
  
  
  
document.getElementById('profile').addEventListener('change', function (event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    const existingImage = document.getElementById('existingImage');

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            if (existingImage) {
                existingImage.style.display = 'none'; 
            }
        };
        reader.readAsDataURL(file);
    }
});


  


</script>