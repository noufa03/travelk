<style>
.text-color-active {
  color: #76c07d; /* Active color */
}
.text-color-default {
  color: #000000; /* Default color */
}



*{
    margin: 0;
    padding: 0;
}  

html{
    font-family: Poppins, sans-serif;
}

body{   
    position: relative;
    background-color: #ffffff;
    color: black;
    display: grid;
    min-height: 100vh;
    min-height: 100dvh;
    grid-template-columns: auto 1fr;

       
}
.profile-page-body{
 
  display: flex;
  flex-direction: column;
   border: 1px solid #000000;
  border-radius: 1em;
  margin: 20px;
  padding: min(3em, 2%)

 

}



.main-profile{
border: radius 10px; ;
padding:1.2rem ;
width: 700px;
height: 440px;

transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
display: grid;
grid-template-rows:  1fr 1fr;
gap: 1rem;

}
.main-profile:hover{
transform: translateY(-5px);
}

.profile-header{
display: flex;
flex-direction: column;
align-items: center;

}
.profile-info{
display: flex;
flex-direction: column;
align-items: center;
gap: 1rem;

}
.profile-info img{

border-radius: 50%;


}

.profile-details{
display: flex;
flex-direction: column;

}

/* .main-profile{
  padding: min(30px, 7%);
} */
nav {
  display: flex;
  align-items: center;
  gap: 20px;
}
nav a {
  text-decoration: none;
  color: black;
  font-weight: 700;
}
.logo-and-navigation{
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding: 20px;
  width: 100%;
  box-sizing: border-box;
  /* position: absolute; */
  top: 0;
  right: 0;
}
/* .main-profile{
  border: 1px solid #000000;
  border-radius: 1em;
  margin: 20px;
  padding: min(3em, 2%)
} */


/* User Statistics */
.stats-grid {
   max-width: 100%;
    padding: 2rem;
    border-radius: 10px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* dynamic columns */
    justify-content: center;
    gap: 1rem;
    box-sizing: border-box;
    
 
} 

.stat-card {
border: radius 10px; ;
padding:1.2rem ;
width: 300px;
height: 150px;
display: flex;
flex-direction: column;
justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
}

.stat-card:hover {
  background-color: #f5f5f5;
  transform: translateY(-2px);
}

.stat-card h2 {
  margin: 0;
  font-size: 1.3em;
  font-weight: 700;
}

.stat-card p {
  margin: 8px 0 0;
  color: gray;
  font-size: 0.9em;
}

.icon{
color: #fff;
padding: 1rem;
height: 60px;
width: 60px;
text-align: center;
border-radius: 50%;
font-size: 1.5rem;
background-color:#ffdc83;

}
/* Edit Profile Button */
.edit-profile-btn {
  background-color: #76c07d;
  width: 200px;
  color: white;
  border: none;
  border-radius: 25px;
  padding: 10px 20px;
  font-size: 1em;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s;
}

.edit-profile-btn:hover {
  background-color: #5ebc67;
  transform: translateY(-2px);
}


.review-card {
background-color:white;
border-radius :10px;
padding:1.2rem ;
width: 100%;
width: 600px;
height: 100px;
display: flex;
flex-direction: column;

justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
}


/* Travel Blog/Journal */
/* .travel-blog {
  margin-top: 40px;
}

.travel-blog h2 {
  font-size: 1.8em;
  font-weight: 700;
  margin-bottom: 20px;
} */

/* .blog-entry {
  background-color: #f9f9f9;
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.blog-entry:hover {
  transform: translateY(-5px);
  background-color: #76c07d;
  color: white;
}

.blog-entry h3 {
  margin: 0;
  font-size: 1.5em;
  font-weight: 700;
} */

/* Friends/Connections Section */
/* .friends-section {
  margin-top: 40px;
}

.friends-section h2 {
  font-size: 1.8em;
  font-weight: 700;
  margin-bottom: 20px;
} */

/* .friend-card {
  display: flex;
  align-items: center;
  gap: 20px;
  background-color: #f9f9f9;
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.friend-card:hover {
  transform: translateY(-5px);
  background-color: #76c07d;
  color: white;
}

.friend-card img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.friend-card .friend-name {
  font-size: 1.2em;
  font-weight: 700;
} */

/* Reviews and Ratings Section */
/* .reviews-section {
  margin-top: 40px;
}

.reviews-section h2 {
  font-size: 1.8em;
  font-weight: 700;
  margin-bottom: 20px;
}

.review-card {
  background-color: #f9f9f9;
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.review-card:hover {
  transform: translateY(-5px);
  background-color: #76c07d;
  color: white;
}

.review-card h3 {
  margin: 0;
  font-size: 1.5em;
  font-weight: 700;
}

.review-card p {
  color: gray;
  margin: 10px 0 0;
} */ 


</style>

</head>

<body>