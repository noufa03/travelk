<style>

/* Sidebar */

.logo-userprofile {
  height: 26px;
  cursor: pointer;
  margin-right: 20px;
}
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

</style>