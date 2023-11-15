<footer class="bg-light py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>Menu</h4>
          <ul class="list-unstyled">
            <li><a href="index.php">Home</a></li>
            <li><a href="#list">List</a></li>
            <li><a href="#kritik">Kritik</a></li>
            <li><a href="kritik.php">Daftar Kritik</a></li>
            <li><a href="https://drive.google.com/drive/u/1/folders/1KYIIWXLfMhZVOo1TfdR4DsorSGipS9mw">Tempat Rahasia</a></li>
            <!-- Add more menu links as needed -->
          </ul>
        </div>
        <div class="col-md-6">
          <h4>Follow Us</h4>
          <!-- Add your social media links here -->
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <!-- Add more social media links as needed -->
          </ul>
        </div>
      </div>
      <hr class="my-4">
      <div class="row">
        <div class="col-md-6">
          <p>&copy; 2023 Asepsalto. All rights reserved.</p>
          <p>Designed by Cet gi pi ti</p>
          <p>Backend By Ghazali</p>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
// Set the countdown time in seconds
var countdownTime = <?php echo selisihspam()?>;

// Update the countdown every second
var countdownElement = document.getElementById('countdown');
var countdownInterval = setInterval(function() {
    // Display the remaining time
    countdownElement.innerHTML = 'Jangan Spam Cuy Tunggu dalam waktu ' + countdownTime + ' detik';

    // Check if the countdown has reached zero
    if (countdownTime <= 0) {
        clearInterval(countdownInterval); // Stop the countdown
        countdownElement.innerHTML = 'Nah Bisa Mako Input Refresh ki rong aokwoawk';
    } else {
        countdownTime--; // Decrement the countdown time
    }
}, 1000); // Update every 1000 milliseconds (1 second)
</script>

</body>
</html>