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
   

input.addEventListener('input',()=>{
  const url= window.URL.createObjectURL(input.files[0]);
    const img=document.createElement('img');
    img.src=url;
    preview.innerHTML="";
    
    preview.appendChild(img);
})
    
    </script>
</body>
</html>