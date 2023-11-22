<style>
  #drop-area {
    border: 2px dashed #ccc;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
  }

  #preview {
    margin-top: 20px;
  }
</style>

<div id="up_gambar" class="container-fluid my-5">
  <h2 class="d-flex justify-content-center m-5"> T4 Gambar</h2>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <?php if(isset($_GET['u'])) :?>
      <?php if($_GET['u'] == 1) :?>
        <div class="alert alert-success" role="alert"> Gambar Berhasil Di Upload  buka <a href="gambar.php">Daftar Gambar</a> untuk melihat hasil upload</div>
        <?php else : ?>
          <div class="alert alert-danger" role="alert"> gagal </div>
        <?php endif ?>
      <?php endif ?>
      
      <form id="upload-form" method="post" enctype="multipart/form-data">
        <div id="drop-area" class="text-muted >
          <h3 class="mb-4">Drag & Drop Gambar</h3>
          <p>Atau klik di sini untuk memilih gambar</p>
          <label for="file-input" class="btn btn-secondary">Pilih File</label>
          <input type="file" id="file-input" name="gambar" accept="image/*" style="display:none">
        </div>
        <div id="preview" class="d-flex justify-content-center"></div>
        <button type="submit" class="btn btn-primary mt-3 d-flex w-100 justify-content-center">Upload File</button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const dropArea = document.getElementById('drop-area');
  const fileInput = document.getElementById('file-input');
  const preview = document.getElementById('preview');

  dropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropArea.classList.add('active');
  });

  dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('active');
  });

  dropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    dropArea.classList.remove('active');

    const files = e.dataTransfer.files;

    if (files.length > 0) {
      fileInput.files = files;
      showPreview();
    }
  });

  fileInput.addEventListener('change', () => {
    showPreview();
  });

  function showPreview() {
    preview.innerHTML = '';

    const files = fileInput.files;

    for (const file of files) {
      const reader = new FileReader();

      reader.onload = (e) => {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.classList.add('img-fluid', 'mt-3');
        preview.appendChild(img);
      };

      reader.readAsDataURL(file);
    }
  }
</script>
