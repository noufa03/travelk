<style>







.card--container1{
/* background-color:var(--accent-clr); */
padding: 3rem;
border-radius: 10px;
display: grid;
grid-template-columns: .75fr .5fr;
gap: 3rem;
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
width: 600px;
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




.button-6 {
  align-items: center;
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: .25rem;
  box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
  box-sizing: border-box;
  color: rgba(0, 0, 0, 0.85);
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 1.25;
  margin: 0;
  min-height: 3rem;
  padding: calc(.875rem - 1px) calc(1.5rem - 1px);
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  width: auto;
}

.button-6:hover,
.button-6:focus {
  border-color: rgba(0, 0, 0, 0.15);
  box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
  color: rgba(0, 0, 0, 0.65);
}

.button-6:hover {
  transform: translateY(-1px);
}

.button-6:active {
  background-color: #F0F0F1;
  border-color: rgba(0, 0, 0, 0.15);
  box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
  color: rgba(0, 0, 0, 0.65);
  transform: translateY(0);
}

    </style>
 
</head>