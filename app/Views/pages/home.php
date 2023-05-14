<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Project Test</title>
</head>
<body>
  <div class="container">
    <div class="col p-4 m-4">
      <div class="row justify-content-around py-4">
        <div class="col p-2">
          <?php
          helper('form');
          echo form_open('home'); ?>
          <div class="row py-4">
            <div class="form-group col-3">
              <select name="area_id" class="form-control">
                <option value="">Select Area</option>
                <?php if(count($area)) :?>
                  <?php foreach ($area as $item):?>
                    <option value="<?php echo $item->area_id?>"><?php echo $item->area_name?></option>
                  <?php endforeach;?>
                <?php else:?>
                <?php endif;?>
              </select>
            </div>
            <div class="form-group col-3">
              <select name="formDate" class="form-control">
                <option value="">Select dateFrom</option>
                <?php if(count($report_product)) :?>
                  <?php foreach ($report_product as $item):?>
                    <option value="<?php echo $item->tanggal?>"><?php echo $item->tanggal?></option>
                  <?php endforeach;?>
                <?php else:?>
                <?php endif;?>
              </select>
            </div>
            <div class="form-group col-3">
              <select name="toDate" class="form-control">
                <option value="">Select dateTo</option>
                <?php if(count($report_product)) :?>
                  <?php foreach ($report_product as $item):?>
                    <option value="<?php echo $item->tanggal?>"><?php echo $item->tanggal?></option>
                  <?php endforeach;?>
                <?php else:?>
                <?php endif;?>
              </select>
            </div>
            <div class="form-group col-3">
              <button class="btn btn-primary" type="submit">View</button>
            </div>
          </div>
          <?php echo form_close() ?>
        </div>
      </div>
      <div class="row py-4">
        <div class="col px-4">
          <canvas id="barChart"></canvas>
        </div>
      </div>
      <div class="row py-4">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th scope="col">Brand</th>
              <?php 
              foreach ($area as $a) {
                { ?>
                <th scope="col"><?php echo $a->area_name?></th>
                <?php }
              }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $resultsByBrand = array();
            foreach($brand_area as $result) {
              $resultsByBrand[$result->brand_name][$result->area_name] = $result->CountComp;
            }
            foreach ($resultsByBrand as $brand => $resultsByArea) 
            { ?>
            <tr>
              <td scope="row"><?php echo $brand?></td>
              <?php 
              ksort($resultsByArea);
              foreach($resultsByArea as $area_name => $CountComp) :?>
              <td><?php echo $CountComp?>%</td>
              <?php endforeach;?>
            </tr>
            <?php }  
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctxB = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
        labels: [
          <?php 
							foreach ($chart as $row){
							   echo "'$row->area_name',";
						} ?>
        ],
        datasets: [{
          label: 'Nilai',
          data: [
            <?php 
							foreach ($chart as $row){
							   echo "'$row->CountComp',";
						} ?>
          ],
          backgroundColor: '#3399ff',
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
</body>
</html>