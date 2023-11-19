<style>
  
    .progress-container {
      margin-top: 30px;
    }
  </style>

<?php $penyimpanan = penyimpanan()?>
  <div class="container d-flex flex-column my-5">
    <style>
    </style>
    <h2 class="d-flex justify-content-center">Penyimpanan Web</h2>
    <!-- Progress Bar Container -->
    <div class="progress-container ">
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?= $penyimpanan['persen']+10?>%;" aria-valuenow="<?= $penyimpanan['persen']?>" aria-valuemin="0" aria-valuemax="100">
          <?= $penyimpanan['persen']?>%
        </div>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <div>Terpakai :
            <span class="badge bg-primary text-white"><?= $penyimpanan['terpakai']?> MB</span>
        </div>
        <div>Total Penyimpanan:
            <span class="badge bg-light text-black"><?= $penyimpanan['total']?> MB</span>
        </div>
        <div>Tersisa :
            <span class="badge bg-secondary text-white "><?= $penyimpanan['bebas']?> MB</span>
        </div>

    </div>

    </div>

  </div>


  <script>
    function simpanData() {
      // Fungsi simulasi penyimpanan data
      let progress = 25; // Ganti dengan nilai progres aktual

      // Simulasi peningkatan nilai progres setiap 2 detik
      let interval = setInterval(function () {
        progress += 10;
        document.querySelector('.progress-bar').style.width = progress + '%';
        document.querySelector('.progress-bar').innerText = progress + '%';

        if (progress >= 100) {
          clearInterval(interval);
          alert('Data berhasil disimpan!');
        }
      }, 2000);
    }
  </script>

