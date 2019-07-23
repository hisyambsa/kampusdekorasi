<?php 

$string = "
        <div class=\"row\">
            <div class=\"col-md-1 text-center mt-2\">
                <button class=\"btn btn-flat btn-rounded hoverable btn-kembali\"><h4><i class=\"fas fa-chevron-circle-left\"></i></h4></button>
            </div>
            <div class=\"col-md-3 text-center mt-2\">
                <?php echo anchor(site_url('".$c_url."/create'),'Buat ".ucfirst($table_name)."', 'class=\"btn btn-primary btn-rounded d-inline\"'); ?>
                <br>
                <br>
            </div>
            <div class=\"col-md-4 text-center\">
                <h2 style=\"margin-top:0px\">"."Daftar ".ucfirst($table_name)."</h2>

            </div>
            <div class=\"col-md-4 text-right\">
                <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-group\" method=\"get\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control mt-2\" name=\"q\" value=\"<?php echo \$q; ?>\">
                        <span class=\"input-group-btn\">
                            <?php 
                                if (\$q <> '')
                                {
                                    ?>
                                    <a href=\"<?php echo site_url('$c_url'); ?>\" class=\"btn btn-amber\">Ulangi</a>
                                    <?php
                                }
                            ?>
                          <button class=\"btn btn-dark-green\" type=\"submit\">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class=\"table-responsive\">
        <table class=\"table table-hover text-nowrap table-sm text-center\" style=\"margin-bottom: 10px\">
            <tr>
                <th class=\"th-sm\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th class=\"th-sm\">" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th class=\"th-sm\">Aksi</th>
            </tr>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "<td style=\"text-align:center\" width=\"120px\">
                    <a href=\"<?php echo base_url().'".$c_url."/read/'.\$".$c_url."->".$pk." ?>\"  class=\"btn btn-sm btn-info\" data-toggle=\"tooltip\" title=\"Lihat\">
                     <span class=\"fa fa-eye\"></span>
                      <a onclick=\"redirectPesan('info','mohon tunggu...')\" href=\"<?php echo base_url().'".$c_url."/update/'.\$".$c_url."->".$pk." ?>\"  class=\"btn btn-sm btn-warning\" data-toggle=\"tooltip\" title=\"Ubah\">
                        <span class=\"fa fa-edit\"></span>
                        <a onclick=\"return confirmHapus('Hapus','anda yakin akan menghapus data?','<?php echo '".$c_url."/delete/'.\$".$c_url."->".$pk." ?>')\" class=\"btn btn-sm btn-danger\" data-toggle=\"tooltip\" title=\"Hapus\">
                          <span class=\"fa fa-trash\"></span>
                      </td>";
$string .=  "\n\t\t</tr>
            <?php
            }
             if (\$start==0) {
                ?>
        <script>
          redirectPesan('error','Data tidak ditemukan');
        </script>   
            <?php } ?>
        </table>
        </div>
        <div class=\"row mt-2\">
            <div class=\"col-md-4\">
                <a href=\"#\" class=\"btn btn-elegant btn-sm disabled \">Jumlah Data ".ucfirst($table_name)." : <?php echo \$total_rows ?></a>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}
$string .= "\n\t    </div>
            <div class=\"col-md-8 text-right\">
                <?php echo \$pagination ?>
            </div>
        </div>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>