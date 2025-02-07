<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

:root {
    --base-clr:#1A4D2E;
    --line-clr: #76c07d ;
    --hover-clr: white;
    --text-clr: #F6FCDF;
    --accent-clr: #76c07d;
    --secondary-text-clr: #1A1A19;
  }
*{
margin: 0;
padding: 0;

}  

html{
font-family:Poppins 1.5rem;


}

body{

min-height: 100vh;
min-height: 100dvh;
background-color: var(--base-clr);
color: var(--text-clr);
display: grid;
grid-template-columns: auto 1fr;
}

#sidebar{
box-sizing: border-box;
height: 100vh;
width: 250px;
padding: 5px 1em;
background-color: var(--base-clr);
border-right: 1px solid var(--line-clr);

position: sticky;
top: 0; 
align-self: start;
transition: 300ms ease-in-out;
overflow: hidden;
text-wrap: nowrap;
}

#sidebar.close{
padding: 5px;
width: 60px;

}
#sidebar ul{
list-style: none;
}

#sidebar >ul >li:first-child{


display: flex;
justify-content: flex-end;
margin-bottom: 16px;
.logo{
 font-weight: 600;
};

}

#sidebar ul li.active  a{

color: var(--accent-clr);
svg{
    
    fill: var(--accent-clr);
}
}

#sidebar a, #sidebar .dropdown-btn ,#sidebar .logo{
border-radius: .5em;
padding: .85em;
text-decoration: none;
color: var(--text-clr);
display: flex;
align-items: center;
gap:1em;

}

.dropdown-btn
{
width: 100%;
text-align: left;
background: none;
border: none;
font: inherit;
cursor: pointer;

}

#sidebar svg{
flex-shrink: 0;
fill: var(--text-clr );


}

#sidebar a span ,#sidebar .dropdown-btn span{

flex-grow: 1 ;

}

#sidebar a:hover ,#sidebar .dropdown-btn:hover{

background-color: var(--hover-clr );
color: #1A1A19;


}

#sidebar .sub-menu{
 display: grid;
 grid-template-rows: 0fr;
transition: 300ms ease-in-out;

> div{
    overflow: hidden;
}

}

#sidebar .sub-menu.show{
    grid-template-rows: 1fr;
    
}

.dropdown-btn svg{
transition: 200ms ease;

}
.rotate svg:last-child{
    rotate: 180deg;
}

#sidebar .sub-menu a{
    padding-left: 2em;

}

#toggle-btn{
margin-left: auto;
padding: 1em;
border: none;
border-radius: .5em;
background: none;
cursor: pointer;

svg{
    transition: rotate 150ms ease;
}

}

#toggle-btn:hover{
background-color: var(--hover-clr);
}


@media(max-width:800px){
    
body{

grid-template-columns: 1fr;

}

#sidebar{
height: 60px;
width: 100%;
border-right: none;
border-top: 1px solid var(--line-clr);
padding: 0;

position: fixed;
top: unset;
bottom: 0;

> ul{
padding: 0;
display: grid;
grid-auto-columns: 60px;
grid-auto-flow: column;
align-items: center;
overflow-x: scroll;
}

ul li{

height: 100%;}

ul a, ul .dropdown-btn{
width: 60px;
height: 60px;
padding: 0;
border-radius: 0;
justify-content: center;

}

ul li span,ul li:first-child, .dropdown-btn svg:last-child{
    display: none;
}

ul li .sub-menu.show {
position: fixed;
bottom: 60px;
left: 0;
box-sizing: border-box;
height: 60px;
width: 100%;
background-color: var(--hover-clr);
border-top: 1px solid var(--line-clr);
display: flex;
justify-content: center;
}

> div{
overflow-x: auto;
}
li{
display: inline-flex;

}

a{
box-sizing: border-box;
padding: 1em;
width: auto;
justify-content: center;
padding: 1rem;


}


}

}


/* main body */

.main--content{
position: relative;
background-color:var(--hover-clr) ;
width: 100%;

padding: 1rem;
}

.header--wrapper img{
 width: auto;
height: 100%;
cursor: pointer;
border-radius: 50%;


}
.header--wrapper{
display: flex;
justify-content:space-between;
align-items: center;
flex-wrap: wrap;
background:white;

border-radius: 0 10px 10px 0;
padding: 10px 2rem;
margin-bottom: 1rem;

border: 1px solid #ccc;
box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

}



.header--title{
color:var(--base-clr);

padding: 10px;
border-radius: 10px 0 0 10px;

}

.user--info{
    display: flex;
    align-items: center;
    gap: 10px;
    


}
.info{
  display: flex;
    align-items: center;
    height: 50px;
  
   /* border: 1px solid var(--line-clr); */
/* background-color:var(--base-clr); */
border-radius: 10px;

}


.search--box{
    background:var(--hover-clr);
    border-radius:15px;
    color:var(--text-clr) ;
    display: flex;
    align-items:center;
    gap: 5px;
    padding: 4px 12px;

}

.search--box input{
    background: transparent;
    padding: 10px;
    
}
.search--box svg{
font-size: 1.2rem;
cursor: pointer;
transition: all 0.5s ease-out;


}
.search--box svg:hover{
    transform: scale(1.1);

}

/* big card */
.card--container1{
/* background-color:var(--accent-clr); */
padding: 2rem;
border-radius: 10px;
}
.card--wrapper1{
display: flex;
flex-wrap: wrap;
gap: 1rem;
}
.payment--card1{
background-color:#F5EFE6;
border: radius 10px; ;
padding:1.2rem ;
width: 100%;
max-width:1200px;
height: 150px;
display: flex;
flex-direction: column;
justify-content: center;
transition: all 0.5s ease-in-out;
border-radius: 10px;
}

.payment--card1:hover{
transform: translateY(-5px);

}
/* end */
.card--container{
/* background-color:var(--accent-clr); */
padding: 2rem;
border-radius: 10px;
}

.card--wrapper{
display: flex;
flex-wrap: wrap;
gap: 1rem;

}


.main--title{
    color:var(--secondary-text-clr);
    padding-bottom: 10px;
    font-size: 15px;
    
    }

    
.payment--card{
background-color:#F5EFE6;
border: radius 10px; ;
padding:1.2rem ;
width: 290px;
height: 150px;
display: flex;
flex-direction: column;
justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
}

.card--wrapper a {
    color: black;
    text-decoration: none;
}


.payment--card:hover{
transform: translateY(-5px);

}
.card--header{
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 20px;

}
.amount{
display: flex;
flex-direction: column;

}
.title{
font-size:20px;
font-weight: 200;


}
.amount--value{
font-size: 20px;
font-family:Poppins;
font-weight: 600;
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
.card--detail{
font-size: 18px;
color:var(--text-clr);
letter-spacing: 2px;
font-family:Poppins;
}
.light-red{
background-color: rgb(254,233,254);

}
/* notifications */

.notification {
    position: relative;
    display: inline-block;
}

.notification a {
    text-decoration: none;
    color: inherit;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.notification svg {
    transition: transform 0.2s ease-in-out;
}

.notification svg:hover {
    transform: scale(1.2);
}

.notification span {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: red;
    color: white;
    font-size: 12px;
    font-weight: bold;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    /* Uncomment below if needed */
    /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); */
}

 .dropbtn {
        /* background-color: #4CAF50; */
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .dropbtn svg {
        vertical-align: middle;
    }

    .dropbtn:hover {
        background-color: #45a049;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 300px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 8px;
        margin-top: 10px;
        padding: 10px;
    }

    .notification:hover .dropdown-content {
        display: block;
    }

    .dropdown-content h1 {
        font-size: 18px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .notification-item {
        /* color: black; */
        display: block;
        padding: 10px;
        font-size: smaller;
        text-decoration: none;
        margin-bottom: 8px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .notification-item:hover {
        background-color: #f1f1f1;
    }

    .no-confirmed-bookings, .no-notifications {
        color: red;
        font-weight: bold;
        text-align: center;
    }

    .no-confirmed-bookings {
        font-size: 16px;
    }

    .no-notifications {
        font-size: 16px;
    }

    </style>
 
</head>