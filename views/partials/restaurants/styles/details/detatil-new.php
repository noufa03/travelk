<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

:root {
    --base-clr: #f0f2f0;
    --line-clr: #76c07d;
    --hover-clr: #ffffff;
    --text-clr: #1a1a19;
    --accent-clr: #76c07d;
    --secondary-text-clr: #333;
    --primary-btn: #ff9500;
    --primary-btn-hover: #e69500;
    --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    --border-radius: 8px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
}

body {
    min-height: 100vh;
    background-color: var(--base-clr);
    color: var(--text-clr);
    display: grid;
    grid-template-columns: auto 1fr;
}

/* Profile Box */
.profile-box {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 3px solid var(--line-clr);
    background-color: #f8f8f8;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.profile-box:hover {
    transform: scale(1.05);
    box-shadow: var(--shadow);
}

.profile-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.profile-box input {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

.profile-box .plus-icon {
    position: absolute;
    font-size: 36px;
    color: var(--accent-clr);
    background: rgba(255, 255, 255, 0.8);
    padding: 10px;
    border-radius: 50%;
    transition: opacity 0.3s ease;
}

.profile-box:hover .plus-icon {
    opacity: 0.9;
}

/* Select Styling */
select {
    width: 100%;
    padding: 12px;
    border-radius: var(--border-radius);
    border: 1px solid #d1d5db;
    font-size: 16px;
    background-color: #fff;
    cursor: pointer;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

select:hover {
    border-color: var(--accent-clr);
}

select:focus {
    outline: none;
    border-color: var(--accent-clr);
    box-shadow: 0 0 8px rgba(118, 192, 125, 0.3);
}

/* Image Container */
.image-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

.image-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.preview-img,
.preview-img2 {
    width: 100%;
    max-width: 300px;
    height: 180px;
    object-fit: cover;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    transition: transform 0.3s ease;
}

.preview-img:hover,
.preview-img2:hover {
    transform: scale(1.02);
}

/* Image Uploader */
.wrapper {
    width: 100%;
    max-width: 450px;
    padding: 30px;
    background: #fff;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    transition: transform 0.3s ease;
}

.wrapper:hover {
    transform: translateY(-5px);
}

.wrapper header {
    color: var(--accent-clr);
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 20px;
}

.wrapper form {
    height: 180px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 2px dashed var(--accent-clr);
    border-radius: var(--border-radius);
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.wrapper form:hover {
    background-color: rgba(118, 192, 125, 0.05);
}

form :where(i, p) {
    color: var(--accent-clr);
}

form i {
    font-size: 48px;
}

form p {
    font-size: 16px;
    margin-top: 12px;
}

section .row {
    background: #e9f0ff;
    margin-bottom: 12px;
    padding: 15px;
    border-radius: var(--border-radius);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

section .row i {
    font-size: 28px;
    color: var(--accent-clr);
}

section .details span {
    font-size: 14px;
    color: var(--secondary-text-clr);
}

.progress-area .row .content {
    width: 100%;
    margin-left: 15px;
}

.progress-area .details {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
}

.progress-area .progress-bar {
    height: 6px;
    width: 100%;
    background-color: #e5e7eb;
    border-radius: 30px;
    overflow: hidden;
}

.progress-bar .progress {
    height: 100%;
    width: 0%;
    background: var(--accent-clr);
    border-radius: inherit;
    transition: width 0.3s ease;
}

.uploaded-area {
    max-height: 230px;
    overflow-y: auto;
    padding-right: 10px;
}

.uploaded-area::-webkit-scrollbar {
    width: 6px;
}

.uploaded-area::-webkit-scrollbar-thumb {
    background: var(--accent-clr);
    border-radius: 10px;
}

/* .uploaded-area .row . coquille {
    display: flex;
    align-items: center;
} */

.uploaded-area .row .details {
    margin-left: 15px;
    flex-direction: column;
}

.uploaded-area .details .size {
    font-size: 12px;
    color: #6b7280;
}

.uploaded-area .fa-check {
    color: var(--accent-clr);
    font-size: 16px;
}

.error-text {
    color: #ef4444;
    font-size: 0.75rem;
    margin-top: 0.5rem;
    text-align: center;
}

/* Form Content */
.form--content {
    width: 100%;
    max-width: 900px;
    margin: 40px auto;
    padding: 40px;
    background: #fff;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    transition: transform 0.3s ease;
}

.form--content:hover {
    transform: translateY(-5px);
}

.form--content .first--grp,
.form--content .second--grp {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form--content .first--grp {
    max-width: 450px;
}

.first--row,
.second--row {
    display: flex;
    flex-direction: row;
    gap: 2rem;
    align-items: center;
}

.form--content label {
    font-weight: 500;
    color: var(--secondary-text-clr);
    margin-bottom: 8px;
}

.form--content input,
.form--content textarea {
    width: 100%;
    padding: 14px;
    font-size: 16px;
    border: 1px solid #d1d5db;
    border-radius: var(--border-radius);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form--content input:focus,
.form--content textarea:focus {
    border-color: var(--accent-clr);
    outline: none;
    box-shadow: 0 0 8px rgba(118, 192, 125, 0.3);
}

.form--content textarea {
    resize: vertical;
    min-height: 120px;
}

.upload-box,
.upload-box2 {
    border: 2px dashed var(--accent-clr);
    border-radius: var(--border-radius);
    padding: 20px;
    text-align: center;
    font-size: 14px;
    /* color: var(--secondary-text  color: var(--secondary-text-clr); */
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.upload-box:hover,
.upload-box2:hover {
    background-color: rgba(118, 192, 125, 0.05);
}

.upload-box span a {
    color: var(--primary-btn);
    text-decoration: none;
    font-weight: 500;
}

.upload-box span a:hover {
    text-decoration: underline;
}

.btn {
    padding: 12px 40px;
    font-size: 16px;
    border: none;
    border-radius: var(--border-radius);
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-submit {
    background-color: var(--primary-btn);
    color: #fff;
}

.btn-submit:hover {
    background-color: var(--primary-btn-hover);
    transform: translateY(-2px);
}

.btn-cancel {
    background-color: #fff;
    color: var(--primary-btn);
    border: 1px solid var(--primary-btn);
}

.btn-cancel:hover {
    background-color: #f8f8f8;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .form--content {
        max-width: 700px;
        padding: 30px;
    }

    .first--row,
    .second--row {
        flex-direction: column;
        gap: 1rem;
    }

    .form--content .first--grp {
        max-width: 100%;
    }

    .image-container {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .form--content {
        max-width: 500px;
        padding: 20px;
    }

    .wrapper {
        padding: 20px;
    }

    .profile-box {
        width: 150px;
        height: 150px;
    }
}

@media (max-width: 480px) {
    .form--content {
        max-width: 100%;
        padding: 15px;
    }

    .profile-box {
        width: 120px;
        height: 120px;
    }

    .btn {
        width: 100%;
        padding: 12px;
    }

    .wrapper {
        padding: 15px;
    }

    .preview-img,
    .preview-img2 {
        max-width: 100%;
    }
}
</style>