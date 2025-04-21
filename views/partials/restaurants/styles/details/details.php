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
    
    
    select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    background-color: #fff;
    cursor: pointer;
}

select:hover {
    border-color: #888;
}

select:focus {
    outline: none;
    border-color: #007BFF;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* image style */
.image-container {
display: grid;
grid-template-columns: 1fr ;
    
}

.image-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.preview-img {
    max-width: 300px;
    height: 180px;
    object-fit: cover;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.preview-img2{
    max-width: 300px;
    height: 180px;
    object-fit: cover;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

/* IMAGE UPLOADER */
    .wrapper {
  width: 430px;
  padding: 30px;
  background: #fff;
  border-radius: 5px;
}

.wrapper header {
  color: #6990f2;
  font-size: 27px;
  font-weight: 600;
  text-align: center;
}

.wrapper form {
  height: 167px;
  display: flex;
  margin: 30px 0;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  flex-direction: column;
  border-radius: 5px;
  border: 2px dashed #6990f2;
}

form :where(i, p) {
  color: #6990f2;
}

form i {
  font-size: 50px;
}

form p {
  font-size: 16px;
  margin-top: 15px;
}

section .row {
  background: #e9f0ff;
  margin-bottom: 10px;
  list-style: none;
  padding: 15px 20px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

section .row i{
    font-size: 30px;
    color: #6990f2;
}

section .details span {
    font-size: 14px;
}

.progress-area .row .content {
    width: 100%;
    margin-left: 15px;
}

.progress-area .details {
    display: flex;
    align-items: center;
       margin-bottom: 7px;
    justify-content: space-between;
}

.progress-area .progress-bar {
   height: 6px;
   width: 100%;
   background-color: #fff;
   margin-bottom: 4px;
   border-radius: 30px;
   
   
   
   
}

.progress-bar .progress{
height: 100%;
width: 0%;
background: #6990f2;
border-radius: inherit;

}

.uploaded-area{
max-height: 230px;
overflow-y: scroll;
}

.uploaded-area .onprogress{
max-height: 150px;
}
.uploaded-area::-webkit-scrollbar{
width: 0px;
}

.uploaded-area .row .content {
    display: flex;
  align-items: center;
}

.uploaded-area .row .details {
    display: flex;
    margin-left: 15px;
    flex-direction: column;
}


.uploaded-area  .details .size {
  font-size: 11px;
  color: #404040;
}

.uploaded-area .fa-check{
color: #6990f2;
font-size: 16px;

}


</style>