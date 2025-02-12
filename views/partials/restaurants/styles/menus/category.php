<style>
/* Card Container */
.card {
  width: 450px;  /* Increased width */
  height: 500px; /* Increased height */
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: transform 0.3s ease;
  margin: 20px;

}

.card:hover {
  transform: translateY(-10px);
}

/* Card Image */
.card-img {
  width: 100%;
  height: 250px; /* Increased height for image */
  object-fit: cover;
  display: block;
  margin: 0 auto; /* Centers the image horizontally */
 
}

/* Card Body */
.card-body {
  padding: 20px;
  height: calc(100% - 250px); /* Adjust height to fit body */
  display: flex;
  flex-direction: column;
  justify-content: space-around;
}

.card-title {
  font-size: 1.5rem; /* Slightly larger font size */
  font-weight: lighter;
  margin: 0;
  color: black;
}

.card-description {
  font-size: 1.1rem; /* Slightly larger font size */
  color: #555;
  margin-top: 10px;
  margin-bottom: 20px;
  flex-grow: 1;
}

/* Button */
.card-btn {
  background-color:orange;
  color: #fff;
  border: none;
  padding: 10px 20px; /* Slightly larger button */
  font-size: 1.1rem;  /* Slightly larger font size */
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-bottom: 100px;
}

.card-btn:hover {
  background-color: #2980b9;
}


</style>