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

    

    let currentQuestion = 1;
    const totalQuestions = 3;
    
    function nextQuestion() {
        if (currentQuestion < totalQuestions) {
            const currentQuestionElement = document.getElementById(`q${currentQuestion}`);
            
            const selectedOption = currentQuestionElement.querySelector('.option.selected');
            
            if (selectedOption) {
                // Use fetch to send selected option to server
                console.log(selectedOption.textContent);
            }

            currentQuestionElement.classList.remove('active');
            currentQuestion++;
            document.getElementById(`q${currentQuestion}`).classList.add('active');
            
            if (currentQuestion === totalQuestions) {
                document.querySelector('.btn-next').style.display = 'none';
                document.querySelector('.btn-next-step').style.display = 'inline-block';
            }
        }
    }

    function goBack() {
        if (currentQuestion > 1) {
            document.getElementById(`q${currentQuestion}`).classList.remove('active');
            currentQuestion--;
            document.getElementById(`q${currentQuestion}`).classList.add('active');
            
            if (currentQuestion < totalQuestions) {
                document.querySelector('.btn-next').style.display = 'inline-block';
                document.querySelector('.btn-next-step').style.display = 'none';
            }
        }
    }
    
    function skipQuestion() {
        nextQuestion();
    }

    // document.addEventListener('DOMContentLoaded', function() {
    //     nextStep();
    // });

    function nextStep() {
        const nextStepBtn = document.querySelector('.btn-next-step');
        nextStepBtn.addEventListener('click', function(event) {
            event.preventDefault();
            // Get all selected options
            // console.log("nextStep");
            const selectedSearchOptions = [];
            for (let i = 1; i <= totalQuestions; i++) {
            const questionElement = document.getElementById(`q${i}`);
            const selectedOption = questionElement.querySelector('.option.selected');
            if (selectedOption) {
                selectedSearchOptions.push({
                    question: i,
                    answer: selectedOption.textContent.trim()
                });
            }
        }
        console.log(selectedSearchOptions);
        document.getElementById('selectedSearchOptionsInput').value = JSON.stringify(selectedSearchOptions);
        document.getElementById('searchForm').submit();
        // console.log('Selected options:', selectedSearchOptions);
        // redirect('/planning/place');
        });
        
    }

    // Add click event listeners to options
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.option').forEach(option => {
            option.addEventListener('click', function() {
                console.log('Option clicked:', this); // Log the clicked option

                // Get all options in the current question
                const options = this.parentElement.querySelectorAll('.option');
                
                // Remove 'selected' class from all options
                options.forEach(opt => {
                    if (opt.classList.contains('selected')) {
                        opt.classList.remove('selected');
                    }
                });
                
                // Add 'selected' class to clicked option
                if (!this.classList.contains('selected')) {
                    this.classList.add('selected');
                }

                // Log the updated options
                console.log('Updated options:', options);
            });
        });
    });

    // Function to show the authentication popup
    function showAuthPopup() {
        document.getElementById('auth-popup').style.display = 'flex'; 
    }
    function closePopup() {
        document.getElementById('auth-popup').style.display = 'none'; 
    }
    function redirectToLogin() {
        window.location.href = '/login'; 
    }
    function redirectToRegister() {
        window.location.href = '/register_user'; 
    }
    window.onclick = function(event) {
        const popup = document.getElementById('auth-popup');
        if (event.target === popup) {
            closePopup();
        }
    }
</script>