<style>





.main-card--container{

display: grid;
grid-row: 1fr 1fr;
gap: 10px;
border:
1px solid #000000;
  border-radius:
1em;
  margin:
20px;
  padding:
min(3em, 2%);


}


.card--container {
    max-width: 100%;
    padding: 2rem;
    border-radius: 10px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* dynamic columns */
    justify-content: center;
    gap: 2rem;
    box-sizing: border-box;
}



.card--wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
    width: 100%;
    box-sizing: border-box;
}


.card--wrapper--starthere{
display: flex;
flex-wrap: wrap;


}


.starthere--card{
/* background-color:#F5EFE6; */
border: radius 10px; ;
padding:1.2rem ;
width: 700px;
height: 400px;

transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
}


.card--wrapper--profile{
display: flex;
flex-wrap: wrap;


}


.starthere--profile{
/* background-color:#F5EFE6; */
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





.main--title{
    color:var(--secondary-text-clr);
    padding-bottom: 10px;
    font-size: 15px;
    
    }

    
.payment--card{

 
    flex: 1 1 300px;
    max-width: 100%;
    padding: 1rem;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);


/* background-color:#F5EFE6; */
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


.location--wrapper{
display: grid;
grid-template-columns: 1fr 1fr;


}

.location--title{

color: #1A1A19;
}

.location--card{
/* background-color:#F5EFE6; */
border-radius: 10px; 
padding:1.2rem ;
width: 700px;
height: 400px;
display: flex;
flex-direction: column;
justify-content:space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;

}

.location--card .button{
color: #1A1A19;
}
.location--card:hover{
transform: translateY(-5px);

}

/* daily offers small cards */
.daily--container{
padding: 1rem;
border-radius: 10px;

}
.daily--wrapper{
display: flex;
flex-wrap: wrap;
gap: 1rem;

}
.daily--card{
background-color:white;
border-radius :10px;
padding:1.2rem ;
width: 100%;
max-width: 600px;
height: 100px;
display: flex;
flex-direction: column;
justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
}

.daily--header{
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 20px;

}
.daily--card:hover{
transform: translateY(-5px);

}
.daily-amount{
display: flex;
flex-direction: column;
}
.daily-title{
font-size: small;
color: #1A1A19;
font-weight: 600;
}
.daily-des{
font-size: small;
color: #1A1A19;
}






    
.welcome--card{

border: radius 10px; ;

width: 100%;
max-width:1200px;
height: 400px;
display: flex;
flex-direction: row;
justify-content: center;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

.welcome--wrapper a {
    color: black;
    text-decoration: none;
}


.welcome--card:hover{
transform: translateY(-5px);

}
.welcome--header{
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 20px;

}
.welcome{
display: flex;
flex-direction: column;

}
.title{
font-size:20px;
font-weight: 200;

}
.welcome--value{
font-size: 20px;
font-family:Poppins;
font-weight: 600;
display: grid;
grid-template-columns: 1fr 1fr;


}



/* */
/* .welcome--value p{


}

.welcome--card img{

} */

.card--wrapper1{
display: flex;
flex-wrap: wrap;
gap: 1rem;
}
.payment--card1{
/* background-color:#F5EFE6; */
border: radius 10px; ;

width: 100%;
max-width:1200px;
height: 400px;
display: flex;
flex-direction: row;
justify-content: center;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

.payment--card1:hover{
transform: translateY(-5px);

}

.card--header1{
display: flex;
/* justify-content: space-between; */
align-items: center;
/* margin-bottom: 20px; */

}
/* end */
.card--container2{
/* background-color:var(--accent-clr); */
padding: 2rem;
border-radius: 10px;
display: grid;
grid-template-columns: 1fr 1fr;
gap: 0rem;

}






.main--title{
    color:var(--secondary-text-clr);
    padding-bottom: 10px;
    font-size: 15px;
    
    }

    
.payment--card{
/* background-color:#F5EFE6; */
border: radius 10px; ;
padding:1.2rem ;
width: 290px;
height: 150px;
display: flex;
flex-direction: column;
justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
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





.location--wrapper{
display: flex;
flex-wrap: wrap;
gap: 1rem;

}

.location--title{

color: #1A1A19;
}

.location--card{
/* background-color:#F5EFE6; */
border-radius: 10px; 
padding:1.2rem ;
max-width:1200px;
height: 600px;
display: flex;
flex-direction: column;
justify-content:space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
overflow: hidden;
/* box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px; */
}

.location--card .button{
color: #1A1A19;
}
.location--card:hover{
transform: translateY(-5px);

}

/* daily offers small cards */
.daily--container{
padding: 1rem;
border-radius: 10px;

}
.daily--wrapper{
display: flex;
flex-wrap: wrap;
gap: 1rem;

}
.daily--card{
background-color:white;
border-radius :10px;
padding:1.2rem ;
width: 100%;
max-width: 600px;
height: 100px;
display: flex;
flex-direction: column;
justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;


}

.daily--header{
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 20px;

}
.daily--card:hover{
transform: translateY(-5px);


}
.daily-amount{
display: flex;
flex-direction: column;
}
.daily-title{
font-size: small;
color: #1A1A19;
font-weight: 600;
}
.daily-des{
font-size: small;
color: #1A1A19;
}

.today-data{
display: grid;
grid-template-rows:0.1fr 1fr 1fr;

}

/* profile */
.profile-card {
  width: 300px;
  padding: 20px;
  background: #fff;
  border-radius: 10px;

  text-align: center;
}

.profile-card img {
  width: 200px;
  height: 150px;
  border-radius: 50%;
  margin-top:10px;
}

.profile-card h2 {
  font-size: 2rem;
  font-weight: lighter;
  color: #333;
  margin-top: 10px;
}

.profile-card p {
  color: #666;
  font-size: 0.9rem;
  margin: 10px;
}

.profile-card .data{
display: flex;
flex-direction: row;

}





         
          /* responsive */
          
          @media (max-width: 1024px) {
  .starthere--card,
  .starthere--profile,
  .location--card,
  .welcome--card,
  .payment--card1 {
    width: 90%;
    height: auto;
  }

  .card--container2 {
    grid-template-columns: 1fr;
  }

  .welcome--value {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .main-card--container {
    padding: 2em 1em;
  }

  .card--container {
    grid-template-columns: 1fr;
  }

  .card--wrapper,
  .card--wrapper1,
  .location--wrapper,
  .daily--wrapper {
    flex-direction: column;
    align-items: center;
  }

  .daily--card,
  .payment--card,
  .payment--card1,
  .starthere--card,
  .starthere--profile,
  .location--card,
  .welcome--card {
    width: 100%;
    max-width: 100%;
  }

  .icon {
    height: 50px;
    width: 50px;
    font-size: 1.2rem;
  }
}

@media (max-width: 480px) {
  .main--title {
    font-size: 14px;
  }

  .title,
  .amount--value,
  .card--detail,
  .daily-title,
  .daily-des {
    font-size: 14px;
  }

  .icon {
    padding: 0.8rem;
  }

  .card--header {
    flex-direction: column;
    gap: 0.5rem;
  }
}

  
    </style>
 
</head>