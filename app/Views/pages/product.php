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
      <div class="row py-4">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th scope="col">Nama Produk</th>
              <th scope="col">Brand</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Nama Toko</th>
              <th scope="col">Jenis Toko</th>
              <th scope="col">Wilayah</th>
            </tr>
          </thead>
          <tbody>
            <?php if(count($filter)) :?>
              <?php
              foreach ($filter as $row) : ?>
              <tr>
                <td><?php echo $row->product_name?></td>
                <td><?php echo $row->brand_name?></td>
                <td><?php echo $row->tanggal?></td>
                <td><?php echo $row->store_name?></td>
                <td><?php echo $row->account_name?></td>
                <td><?php echo $row->area_name?></td>
              </tr>
              <?php endforeach;?>
            <?php else:?>
              <tr>
                <td>No Data Found</td>
              </tr>
            <?php endif;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>