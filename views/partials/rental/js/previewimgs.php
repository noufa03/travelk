<script>


    const inputprofile = document.getElementById('profile_picture');
    const previewprofile = document.getElementById('previewprofile');

    // add an event listener
    inputprofile.addEventListener('input', () => {
        const url = window.URL.createObjectURL(inputprofile.files[0]); // creates a temp link to the user file in the user browser
        const img = document.createElement('img');
        img.src = url; // pass in the url to the src;
        previewprofile.innerHTML = ""; // empty the element of the preview element, clean the old img

        previewprofile.appendChild(img);
    });


</script>