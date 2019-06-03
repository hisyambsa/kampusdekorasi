<?php
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hisyam Husein .......... -->
<!-- Email : hisyam.husein@gmail.com .. -->
<!-- About : hisyam.ismul.com ......... -->
<!-- Instagram : @hisyambsa............ -->
<!-- .................................. -->
*/
?>
<h2 style="margin-top:0px">
<?php echo $button ?> Akses
</h2>
<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">
            Nama Akses <?php echo form_error('nama_akses') ?>
        </label>
        <input class="form-control" id="Masukan nama_akses" name="nama_akses" placeholder="Nama Akses" type="text" value="<?php echo $nama_akses; ?>"/>
    </div>
    <div class="form-group">
        <label for="varchar">
            Grup <?php echo form_error('grup') ?>
        </label>
        <input class="form-control" id="Masukan grup" name="grup" placeholder="Grup" type="text" value="<?php echo $grup; ?>"/>
    </div>
    <input name="id_akses" type="hidden" value="<?php echo $id_akses; ?>"/>
    <button class="btn btn-primary btn-rounded" type="submit">
    <?php echo $button ?>
    </button>
    <a class="btn btn-danger btn-rounded" href="<?php echo site_url('wo_akses') ?>">
        Batal
    </a>
</form>