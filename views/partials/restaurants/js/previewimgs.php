<script>


    const inputprofile = document.getElementById('profile');
    const previewprofile = document.getElementById('previewprofile');

    // add an event listener
    inputprofile.addEventListener('input', () => {
        const url = window.URL.createObjectURL(inputprofile.files[0]); // creates a temp link to the user file in the user browser
        const img = document.createElement('img');
        img.src = url; // pass in the url to the src;
        previewprofile.innerHTML = ""; // empty the element of the preview element, clean the old img

        previewprofile.appendChild(img);
    });

    const input = document.getElementById('logo');
    const preview = document.getElementById('preview-logo')

    //    add a event listener
    input.addEventListener('input', () => {
        const url = window.URL.createObjectURL(input.files[0]); // creates atemp link to the user file in the user browser
        const img = document.createElement('img');
        img.src = url; //pass in the url to the src;
        preview.innerHTML = ""; //empy the element of the preview element,clean the old img

        preview.appendChild(img);
    })
</script>