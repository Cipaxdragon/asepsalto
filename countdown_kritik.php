<script>
    // Set the countdown time in seconds
    var countdownTime = <?php echo selisihspamkritik()?>;
    
    // Update the countdown every second
    var countdownElement = document.getElementById('countdown_kritik');
    var countdownInterval = setInterval(function() {
        // Display the remaining time
        countdownElement.innerHTML = 'Jangan Spam Cuy Ballassi Server <br>Tunggu dalam waktu ' + countdownTime + ' detik';
    
        // Check if the countdown has reached zero
        if (countdownTime <= 0) {
            clearInterval(countdownInterval); // Stop the countdown
            countdownElement.innerHTML = 'Nah Bisa Mako Input Refresh ki rong aokwoawk';
        } else {
            A
            countdownTime--; // Decrement the countdown time
        }
    }, 1000); // Update every 1000 milliseconds (1 second)
</script>