<style>

.profile-box{
 width: 180px;  /* Set a fixed width */
        height: 180px; /* Set a fixed height (same as width to make it a circle) */
        border-radius: 50%; /* Makes it circular */
        overflow: hidden; /* Ensures the image stays within the circle */
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px solid #ccc; /* Optional: Adds a border */
        background-color: #f5f5f5; /* Optional: Background color */
        position: relative;

}


.profile-box img {
        width: 100%; /* Ensures the image fills the container */
        height: 100%;
        object-fit: cover; /* Ensures the image covers the box without stretching */
        border-radius: 50%; /* Keeps the image circular */
    }

    .profile-box input {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0; /* Makes the file input invisible but clickable */
        cursor: pointer;
    }
    
    .profile-box .plus-icon {
        position: absolute;
        font-size: 40px;
        color: gray;
        display: flex;
        justify-content: center;
        align-items: center;
    }

</style>