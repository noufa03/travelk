<script>
// Get references to the "add more" button and the file input
var addMore = document.querySelector('.add-more')
var fileInput = document.querySelector('.file-input')

// When the button got clicked...
addMore.addEventListener('click', function (event) {
	
  // Prevent the default action, which would be
  // the form submission for a button
  event.preventDefault()
  
  // Create a clone of the file input (you could also
  // create a new one from scrath, but then you'd
  // have to manually add the attributes and all...)
  var newFileInput = fileInput.cloneNode()
  
  // Insert the clone right after the original (this
  // can only be done inderectly)
  fileInput.parentNode.insertBefore(
  	newFileInput,
    fileInput.nextSibling
  )
  
  // Set the file input reference to the clone, so 
  // that the next input will be added after the
  // new input
  fileInput = newFileInput
})

</script>