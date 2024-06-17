<?php
    include"tampilkan_data.php";
    $data_edit = isset($_GET['id']) ? mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = " . $_GET['id'])) : null;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>INPUT DATA MAHASISWA</title>

            <link href="liblary/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
            <link href="liblary/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
            <link href="liblary/assets/styles.css" rel="stylesheet" media="screen">
            <script src="liblary/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
         <body>

            <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Input Nilai Mahasiswa</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                <form action="<?php echo isset($data_edit['id']) ? 'edit_data.php?id=' . $data_edit['id'] . '&proses=1' : 'proses_pertemuan6.php'; ?>" method="POST">
                                      <fieldset>
                                        <legend>Input Nilai Mahasiswa</legend>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="Nama">Nama Mahasiswa : </label>
                                          <div class="controls">
                                          <input type="text" class="input-xlarge focused" id="nama" name="nama" value="<?php echo isset($data_edit['nama_mahasiswa']) ? $data_edit['nama_mahasiswa'] : ''; ?>">  
                                                </div>
                                            </div>

                                        <div class="control-group">
                                          <label class="control-label" for="PRODI">Prodi Mahasiswa : </label>
                                          <div class="controls">
                                          <input type="text" class="input-xlarge focused" id="prodi" name="prodi" value="<?php echo isset($data_edit['prodi']) ? $data_edit['prodi'] : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="Foto">Foto Mahasiswa : </label>
                                                    <div class="controls">
                                                     <input type="file" class="input-xlarge focused" id="Foto" name="foto">
                                                                </div>
                                                                         </div>

                                    
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">PROSES</button>
                                            <button type="reset" class="btn">Cancel</button>
                                        </div>
                                </form>

                                </div>   
                            </div> 
                        </div>
                    </div>
                    
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Mahasiswa</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table">
						              <thead>
						                <tr>
						                  <th>NPM Mahasiswa</th>
						                  <th>Nama Mahasiswa</th>
						                  <th>Prodi Mahasiswa</th>
						                  <th>Action</th>
						                </tr>
						              </thead>
						              <tbody>
                                        <form method="GET" action="pertemuan6.php">
                                            <label> Search Data :</label> 
                                            <input type= "text" name="cari" value = "<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>">
                                            <button type ="submit">Cari</button>
                                        </form>
                                      <?php
                                       include "koneksi.php";
                                        if(isset($_GET['cari'])){
                                            $pencarian = $_GET['cari'];
                                            $query = "SELECT * FROM  mahasiswa where id like '%$pencarian%' or nama_mahasiswa like '$pencarian%'
                                            or prodi like '%$pencarian%' ";
                                        } else {
                                            $query = "SELECT * FROM mahasiswa ";
                                        }
                                         $result = mysqli_query($koneksi, $query);
                                         while ($data = mysqli_fetch_array($result)) {
                                      ?>
						                <tr>
						                  <td><?php echo $data['id']?></td>
						                  <td><?php echo $data['nama_mahasiswa']?></td>
						                  <td><?php echo $data['prodi']?></td>
						                  <td> 
                                          <a href="edit_data.php?id=<?php echo $data['id']; ?>">Edit</a> |
                                         <a href="hapus_data.php?id=<?php echo $data['id']; ?>">Hapus</a>
                                        </td>
						                </tr>
                                    <?php
                                            }
                                        
                                    ?>
						                
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                </div>
    
        </body>
</html>