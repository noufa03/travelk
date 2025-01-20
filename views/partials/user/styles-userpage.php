<style>
.text-color-active {
  color: #76c07d; /* Active color */
}
.text-color-default {
  color: #000000; /* Default color */
}

.logo-userprofile {
  height: 26px;
  cursor: pointer;
  margin-right: 20px;
}
body {
  font-family: Poppins, sans-serif;
  position: relative;
  background-color: #ffffff;
  color: black;
  padding: 0;
  margin: 0;
}
.profile-page-body{
  margin : 0;
  padding: 0;
  min-height: 100vh;
  min-height: 100dvh;
  display: grid;
  grid-template-columns: auto 1fr;
}
.main-profile{
  padding: min(30px, 7%);
}
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
.main-profile{
  border: 1px solid #000000;
  border-radius: 1em;
  margin: 20px;
  padding: min(3em, 2%)
}


/* Sidebar */
.sidebar{
  box-sizing: border-box;
  height: 100vh;
  width: 250px;
  padding: 5px 1em;
  background-color: #f0f2f0;
  color: black;
  border-right: 1px solid #000000;
  position: sticky;
  top: 0;
  align-items: start;
  transition: 300ms ease-in-out;
  overflow: hidden;
}
.sidebar.close{
  padding: 5px;
  width: 60px;
}
.sidebar > ul, .dropdown-menu{
  list-style: none;
  /* padding: 15px; */
  padding-left: 6px;
  margin: 0;
}
.sidebar-item-logo{
  display: flex;
  justify-content: flex-end;
  margin-top: 40px;
  font-weight: 600;
}
.sidebar-item-container{
  margin-top: 40px;
}
.toggle-btn{
  padding: 0;
  margin-left: 2px;
  margin-right: 6px;
  background-color: transparent;
  border: none;
  cursor: pointer;
  font-size: 26px;
}
.sidebar-item a, .dropdown-menu li > a, .dropdown-toggle{
  border-radius: .5em;
  padding: .85em;
  display: flex;
  align-items: center;
  gap: 1em;
  color: black;
  text-decoration: none;
  font-size: 15px;
}
.dropdown-toggle{
  border: none;
  width: 100%;
  background: none;
  cursor: pointer;
}
.sidebar-item.active a{
  color: #76c07d;
}
.sidebar-item i{
  flex-shrink: 0;
  fill: #000000;
  font-size: 20px;
}
.sidebar > a span, .dropdown-toggle > span{
  /* flex-grow: 1 makes the span element take up all remaining space in the flex container,
     which pushes any elements after it to the end. This effectively centers the text
     because the span grows to fill available space while maintaining flex layout. */
  flex-grow: 1;
  /* To prevent centering, you can add: */
  text-align: left; 
}
.sidebar a:hover, .dropdown-toggle:hover{
  background-color: #76c07d;
  color: white;
}
.dropdown-menu{
  display: grid;
  /* grid-template-columns: 0fr; */
  transition: 300ms ease-in-out;
  grid-template-rows: 0fr;

  .dropdown-menu-container{
    overflow: hidden;
  }
}
.dropdown-menu.show{
  /* grid-template-columns: 1fr; */
  grid-template-rows: 1fr;
}
.dropdown-menu-container {
  list-style: none;
}
.dropdown-icon.rotate{
  transform: rotate(180deg);
}

/* User Statistics */
.user-stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
  margin: 20px 0;
  justify-items: center;
}

.stat-card {
  border: 2px solid #000000;
  border-radius: 8px;
  padding: 15px;
  text-align: center;
  transition: all 0.3s ease;
  width: 150px;
  display: inline-block;
  margin: 0 auto;
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

/* Edit Profile Button */
.edit-profile-btn {
  background-color: #76c07d;
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

/* Travel Blog/Journal */
.travel-blog {
  margin-top: 40px;
}

.travel-blog h2 {
  font-size: 1.8em;
  font-weight: 700;
  margin-bottom: 20px;
}

.blog-entry {
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
}

/* Friends/Connections Section */
.friends-section {
  margin-top: 40px;
}

.friends-section h2 {
  font-size: 1.8em;
  font-weight: 700;
  margin-bottom: 20px;
}

.friend-card {
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
}

/* Reviews and Ratings Section */
.reviews-section {
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
}


</style>

</head>

<body>