<script type="text/javascript" defer>


        function togglePrice(size) {
            const priceInput = document.getElementById('price_' + size);
            const checkbox = document.getElementById('size-' + size);

            if (checkbox.checked) {
                priceInput.style.display = 'block'; // Show input
                priceInput.setAttribute('required', 'true'); // Make it required
            } else {
                priceInput.style.display = 'none'; // Hide input
                priceInput.removeAttribute('required'); // Remove required
                priceInput.value = ''; // Clear input value
            }
        }
        
        document.getElementById("photo").addEventListener("change", function (event) {
    let fileList = document.getElementById("fileList"); 
 

    for (let file of event.target.files) {
        let listItem = document.createElement("li");
        listItem.textContent = file.name;
        fileList.appendChild(listItem);
    }
});


// img preview
  function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
      preview.src = '';
      preview.style.display = 'none';
    }
  }

</script>