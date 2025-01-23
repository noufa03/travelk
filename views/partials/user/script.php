<script>
    function previewImage(input) {
        const imagePreview = document.getElementById('imagePreview');
        const profilePreview = document.getElementById('profile-preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function (e) {
                profilePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the preview and button
            };
            
            reader.readAsDataURL(input.files[0]); // Convert image to data URL
        }
    }

    function removeImage() {
        const imagePreview = document.getElementById('imagePreview');
        const profileInput = document.getElementById('profile');
        const profilePreview = document.getElementById('profile-preview');
        
        // Reset the input field and hide the preview
        profileInput.value = '';
        profilePreview.src = '';
        imagePreview.style.display = 'none';
    }

    function toggleDropdown(button){
        button.nextElementSibling.classList.toggle('show');
        button.querySelector('.dropdown-icon').classList.toggle('rotate');
    }

    function toggleSidebar() {
        const toggleBtn = document.querySelector('.toggle-btn');
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('close');
        toggleBtn.classList.toggle('rotate');
    }
</script>