<?php
include 'header.php';
require('function.php');
?>
<?php
define('DB', 'produk.txt');
if (!file_exists(DB)) {
    saveTxt(DB, "Id#Kategori#Nama#Harga#Foto" . PHP_EOL, 'a');
}
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="insert.php" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
        </div>
        <?php
        $loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $i = 0;
        foreach ($loadDB as $data) {
            if ($i == 0) {
            } else {
                $expData = explode('#', $data);
                $Id = $expData[0];
                $Kategori = $expData[1];
                $Nama = $expData[2];
                $Harga = $expData[3];
                $foto = $expData[4];
        ?>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <img src="image/<?php echo $foto; ?>" class="card-img-top img-fluid" alt="...">
                    <strong class="card-title"><?php echo $Nama; ?></strong>
                    <p class="card-subtitle text-muted"><small><?php echo $Kategori; ?></small></p>
                    <p class="card-text text-danger"><?php echo 'Rp.' . $Harga; ?></p>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a class="btn btn-warning" href="edit.php?id=<?php echo $Id; ?>"><i
                                class="fa-solid fa-pen"></i></a>
                        <a href="#" class="btn btn-danger confirm" data-id="<?php echo $Id; ?>"
                            data-nama="<?php echo $Nama; ?>"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php };
            $i++;
        }; ?>
    </div>
</div>
<?php include 'footer.php'; ?>