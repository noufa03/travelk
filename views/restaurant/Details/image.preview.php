<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<input type="file" name="" id="upload-input" accept="image/*">
<div id="preview"> </div>
    
    
    <script>
   const input=document.getElementById('upload-input');
   const preview=document.getElementById('preview')
   
//    add a event listener
input.addEventListener('input',()=>{
  const url= window.URL.createObjectURL(input.files[0]);// creates atemp link to the user file in the user browser
    const img=document.createElement('img');
    img.src=url;//pass in the url to the src;
    preview.innerHTML="";//empy the element of the preview element,clean the old img
    
    preview.appendChild(img);
})
    
    </script>
</body>
</html>