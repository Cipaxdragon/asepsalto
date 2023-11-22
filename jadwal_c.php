<div id="jadwal_c" class="container  my-5">
  <h2 class="text-center mb-4">Jadwal Kuliah Kelas C</h2>
  <?php
include_once "data_jadwal.php";

    $j = 1;
    $i = 1;
  ?>
  <?php while($j <= 3 ) :?>
    <div class="row mb-4">
     <?php while ($i <= $j * 3) :?> 
      <?php if($i === 7){
        break;
        }?>
    <div class="col-md-4">
      <div class="card ">
        <div class="card-header bg-primary text-white text-center">
          <h4>
            <?= hari($i)?>
          </h4>
        </div>
        <div class="card-body">
          <ul class="list-group">
            <?php foreach ($matkul as $row): ?>
              <?php if($i === $row['hari']):?>
            <li class="list-group-item list-group-item-action">
              <div class="row">
                <div class="col text-left">
                  <?= $row['matkul'] ?>
                </div>

                <div class="col text-right">
                  <?= $row['jam'] ?>
                </div>
              </div>
            </li>
            <?php endif?>
            <?php endforeach?>
          </ul>
        </div>
      </div>
      <?php $i++?>
    </div>
     <?php endwhile ?> 
    
  </div>
  <?php $j++;?>
  <?php endwhile ?>
</div>
