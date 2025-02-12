<script type="text/javascript" defer>


        function togglePrice(size) {
            const priceInput = document.getElementById('price_' + size);
            const checkbox = document.getElementById('size-' + size);

            if (checkbox.checked) {
                priceInput.style.display = 'block'; // Show input
                priceInput.setAttribute('required', 'true'); // Make it required
            } else {
                priceInput.style.display = 'none'; // Hide input
                priceInput.removeAttribute('required'); // Remove required
                priceInput.value = ''; // Clear input value
            }
        }
</script>