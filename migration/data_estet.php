<?php
include('../Connections/connection.class.php');
$tahun="2010";
/*header("Content-type: application");
header("Content-Disposition: attachment; filename=excel_data_$tahun.xls");*/
include("baju.php");
$con = connect();
?>

<table width="100%" class="baju">
  <tr>
    <th>Bil.</th>
    <th>Nama Estet</th>
    <th>Syarikat Induk</th>
    <th>Daerah </th>
    <th>Negeri</th>
    <th>age_profile</th>
    <th>bak_emolumen </th>
    <th>bak_kos_ibupejabat </th>
    <th>bak_kos_agensi </th>
    <th>bak_kebajikan </th>
    <th>bak_sewa_tol </th>
    <th>bak_penyelidikan </th>
    <th>bak_perubatan </th>
    <th>bak_penyelenggaraan </th>
    <th>bak_cukai_keuntungan </th>
    <th>bak_penjagaan </th>
    <th>bak_kawalan </th>
    <th>bak_air_tenaga </th>
    <th>bak_perbelanjaan_pejabat </th>
    <th>bak_susut_nilai </th>
    <th>bak_perbelanjaan_lain </th>
    <th>bak_total_perbelanjaan</th>
    <th>b_mandur_penuai_tempatan </th>
    <th>b_mandur_am_tempatan </th>
    <th>b_jumlah_mandur_tempatan </th>
    <th>b_mandur_penuai_asing </th>
    <th>b_mandur_am_asing </th>
    <th>b_jumlah_mandur_asing </th>
    <th>b_kekurangan_mandur_estet </th>
    <th>b_mandur_penuai_k_tempatan </th>
    <th>b_mandur_am_k_tempatan </th>
    <th>b_jumlah_mandur_k_tempatan </th>
    <th>b_mandur_penuai_k_asing </th>
    <th>b_mandur_am_k_asing </th>
    <th>b_jumlah_mandur_k_asing </th>
    <th>b_kekurangan_mandur_kontraktor </th>
    <th>b_pekerja_estet_tempatan </th>
    <th>b_pekerja_am_tempatan </th>
    <th>b_jumlah_pekerja_tempatan </th>
    <th>b_pekerja_estet_asing </th>
    <th>b_pekerja_estet_k_tempatan </th>
    <th>b_pekerja_am_k_tempatan </th>
    <th>b_jumlah_pekerja_k_tempatan </th>
    <th>b_pekerja_estet_k_asing </th>
    <th>b_pekerja_am_k_asing </th>
    <th>b_jumlah_pekerja_k_asing </th>
    <th>b_kekurangan_pekerja_kontraktor </th>
    <th>b_eksekutif_tempatan </th>
    <th>b_kakitangan_tempatan </th>
    <th>b_jumlah_kakitangan_tempatan </th>
    <th>b_eksekutif_asing </th>
    <th>b_eksekutif_tempatan </th>
    <th>b_kakitangan_tempatan </th>
    <th>b_jumlah_kakitangan_tempatan </th>
    <th>b_eksekutif_asing </th>
    <th>b_kakitangan_asing </th>
    <th>b_jumlah_kakitangan_asing </th>
    <th>b_kekurangan_eksekutif </th>
    <th>b_eksekutif_k_tempatan </th>
    <th>b_kakitangan_k_tempatan </th>
    <th>b_jumlah_kakitangan_k_tempatan </th>
    <th>b_eksekutif_k_asing </th>
    <th>b_kakitangan_k_asing </th>
    <th>b_jumlah_kakitangan_k_asing </th>
    <th>b_kekurangan_kakitangan_kontraktor </th>
    <th>b_penuai_tempatan </th>
    <th>b_penuai_asing </th>
    <th>b_penuai_tempatan_kontraktor </th>
    <th>b_penuai_asing_kontraktor </th>
    <th>b_penuai_kumpulan_tempatan </th>
    <th>b_penuai_kumpulan_asing </th>
    <th>b_penuai_kumpulan_tempatan_kontraktor </th>
    <th>b_penuai_kumpulan_asing_kontraktor </th>
    <th>b_pemungut_bts_tempatan </th>
    <th>b_pemungut_bts_asing </th>
    <th>b_pemungut_bts_tempatan_kontraktor </th>
    <th>b_pemungut_bts_asing_kontraktor </th>
    <th>b_pemungut_buahrelai_tempatan </th>
    <th>b_pemungut_buahrelai_asing </th>
    <th>b_pemungut_buahrelai_tempatan_kontraktor </th>
    <th>b_pemungut_buahrelai_asing_kontraktor </th>
    <th>b_jumlah_tempatan </th>
    <th>b_jumlah_asing </th>
    <th>b_jumlah_tempatan_kontraktor </th>
    <th>b_jumlah_asing_kontraktor </th>
    <th>b_jumlahkumpulan_tempatan </th>
    <th>b_jumlahkumpulan_asing </th>
    <th>b_jumlahkumpulan_tempatan_kontraktor </th>
    <th>b_jumlahkumpulan_asing_kontraktor </th>
    <th>b_kekurangan_penuai_estet </th>
    <th>b_kekurangan_penuai_kontraktor</th>
    <th>j_value</th>
    <th>j_percent </th>
    <th>ffb_jumlah_pengeluaran </th>
    <th>ffb_purata_hasil_buah</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>
  <tr class="alt">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <?php } ?>
  
</table>
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td width="3%">bak_</td>
    <td width="97%">belanja am kos (PERBELANJAAN AM)</td>
  </tr>
  <tr>
    <td>b_</td>
    <td>buruh (BURUH)</td>
  </tr>
  <tr>
    <td>j_</td>
    <td>jentera (JENTERA)</td>
  </tr>
  <tr>
    <td>ffb_</td>
    <td>FFB PRODUCTION</td>
  </tr>
</table>
