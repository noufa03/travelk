<style>
.extra{
display: none;

}

input[type="checkbox"]{
height: 2em;
display: block;
appearance: none;

}
label{
position: relative;
padding: 1em;
background-color:lightskyblue;
color: white;
cursor: pointer;
border-radius: 2rem;
}
label:before{
content: "See More";

}


input[type="checkbox"]:checked~label:before{
content: "See Less";
}

.dot:has(~input[type="checkbox"]:checked){

display: none;
}

.extra:has(~input[type="checkbox"]:checked){

display:inline;
}
.original:has(~input[type="checkbox"]:checked){

display:none;


}

</style>