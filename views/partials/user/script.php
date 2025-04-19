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

    

    //handling the survey
    let currentQuestion = 1;
    const totalQuestions = 3; 
    
    function nextQuestion() {
        if (currentQuestion < totalQuestions) {
            const currentQuestionElement = document.getElementById(`q${currentQuestion}`);
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
    function nextStep() {
        event.preventDefault();

        const selectedSearchOptions = [];

        for (let i = 1; i <= totalQuestions; i++) {
            const questionElement = document.getElementById(`q${i}`);
            if (questionElement) {
                const checkedOptions = questionElement.querySelectorAll('input[type="checkbox"]:checked');
                checkedOptions.forEach(option => {
                    selectedSearchOptions.push({
                        question: i,
                        answer: option.value
                    });
                });
            }
        }

        console.log('Selected options:', selectedSearchOptions);

        const selectedSearchOptionsInput = document.getElementById('selectedSearchOptionsInput');
        if (!selectedSearchOptionsInput) {
            console.error('Selected search options input not found');
            return;
        }

        selectedSearchOptionsInput.value = JSON.stringify(selectedSearchOptions);
        
        const searchForm = document.getElementById('searchForm');
        if (!searchForm) {
            console.error('Search form not found');
            return;
        }

        searchForm.submit();
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.option input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                console.log('Checkbox changed:', this.value, 'Checked:', this.checked);
                const label = this.parentElement;
                if (this.checked) {
                    label.style.backgroundColor = '#76c07d'; // Light blue background when checked
                    label.style.transition = 'background-color 0.3s';
                } else {
                    label.style.backgroundColor = ''; // Reset to default background
                }
            });
        });
    });
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

    document.addEventListener("DOMContentLoaded", () => {
        const popup = document.getElementById("menu-popup");
        const popupContent = popup.querySelector(".popup-details");
        const closeBtn = popup.querySelector(".close-btn");

        document.querySelectorAll(".cuisine-item img").forEach(img => {
            img.addEventListener("click", function () {
                const cuisineItem = this.closest(".cuisine-item");
                const detailsHTML = cuisineItem.querySelector(".details")?.innerHTML || '';
                const name = cuisineItem.querySelector("p")?.textContent || '';

                popupContent.innerHTML = `
                    <h2>${name}</h2>
                    <img src="${this.src}" alt="${name}">
                    ${detailsHTML}
                `;
                popup.style.display = "flex";
            });
        });

        closeBtn.addEventListener("click", () => {
            popup.style.display = "none";
        });

        window.addEventListener("click", (e) => {
            if (e.target === popup) {
                popup.style.display = "none";
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("reviewModal");
        const openBtn = document.getElementById("openReviewModal");
        const closeBtn = document.getElementById("closeReviewModal");

        if (openBtn) {
            openBtn.addEventListener("click", (e) => {
            e.preventDefault();
            modal.style.display = "block";
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener("click", () => {
            modal.style.display = "none";
            });
        }

        window.addEventListener("click", (e) => {
            if (e.target === modal) {
            modal.style.display = "none";
            }
        });

        const reviewType = document.getElementById("review-type");
        const menuSelectContainer = document.getElementById("menu-select-container");

        if (reviewType) {
            reviewType.addEventListener("change", function () {
            if (this.value === "menu") {
                menuSelectContainer.style.display = "block";
            } else {
                menuSelectContainer.style.display = "none";
            }
            });
        }
    });




</script>