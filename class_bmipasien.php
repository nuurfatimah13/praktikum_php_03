<?php

class bmiPasien {
    public $nama,
           $umur,
           $jeniskelamin,
           $beratbadan,
           $tinggibadan;

     function hasilBMI () {
        return "<b>Nama : $this->nama <br><br>
              Berat Badan : $this->berat <br><br>
              Tinggi Badan : $this->tinggi <br><br>
              Umur : $this->umur <br><br>
              Jenis Kelamin : $this->jenisKelamin </b>";
    }
     function statusBMI($BMI) {
         if ($BMI < 18.5){
             return "<td>Kekurangan Berat Badan</td>";
         }
         else if ($BMI >= 18.5 && $BMI <= 24.9) {
             return "<td>Normal (ideal)</td>";
         }
         else if ($BMI >= 25.0 && $BMI <= 29.9) {
             return "<td>Kelebihan Berat Badan</td>";
         }
         else {
             return "<td>Kegemukan (Obesitas)</td>";
         }
     }
}
if (isset($_GET["nama__lengkap"])) {
    $bmi = new bmiPasien;
    $bmi->nama = $_GET["nama__lengkap"];
    $bmi->berat = $_GET["berat__"];
    $bmi->tinggi = $_GET["tinggi__"];
    $bmi->umur = $_GET["umur__"];
    $bmi->jenisKelamin = $_GET["jenis__kelamin"];
}
$pasien1 = ['nama'=>'Hamzah', 'kelamin'=>'Laki-Laki', 'umur'=>15, 'berat'=>30,'tinggi'=>135];
$pasien2 = ['nama'=>'Ahmad Yasin','kelamin'=>'Laki-Laki','umur'=>13, 'berat'=>24,'tinggi'=>120];
$pasien3 = ['nama'=>'Yahya Ayasy','kelamin'=>'Laki-laki', 'umur'=>9,  'berat'=>20,'tinggi'=>118];
$pasien4 = ['nama'=> $bmi->nama, 'kelamin'=> $bmi->jenisKelamin, 'umur'=>$bmi->umur, 'berat'=>$bmi->berat,'tinggi'=>$bmi->tinggi];

$ar_pasien = [$pasien1, $pasien2, $pasien3, $pasien4];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>OUTPUT</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-5">Data BMI Pasien</h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Kelamin</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Tinggi</th>
                    <th scope="col">BMI</th>
                    <th scope="col">Hasil</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $nomor = 1;
                    foreach($ar_pasien as $pasien) {
                        echo '<tr><td>'.$nomor.'</td>';
                        echo '<td>'.$pasien['nama'].'</td>';
                        echo '<td>'.$pasien['kelamin'].'</td>';
                        echo '<td>'.$pasien['umur'].'</td>';
                        echo '<td>'.$pasien['berat'].'</td>';
                        echo '<td>'.$pasien['tinggi'].'</td>';
                        $BMI = $pasien["berat"] / (($pasien["tinggi"]/100)**2);
                        echo '<td>'.number_format($BMI,1).'</td>';
                        $status = new bmiPasien();
                        echo $status->statusBMI($BMI);
                        echo '</tr>';
                        $nomor++;
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>

?>
