<?php
    // koneksi database
    $konek = mysqli_connect("localhost", "root", "", "grafiksensor");

    //baca data dari table tb_sensor

    //baca ID tertinggi
    $sql_ID = mysqli_query($konek, "SELECT MAX(ID) FROM tb_sensor") ;
    //tangkap datanya
    $data_ID = mysqli_fetch_array($sql_ID) ;
    //ambil ID terakhir / terbesar
    $ID_akhir = $data_ID['MAX(ID)'];
    $ID_awal = $ID_akhir - 20 ;


    //baca informasi tangal untuk 5 data terakhir  sumbu X grafik
    $tanggal = mysqli_query($konek, "SELECT tanggal FROM tb_sensor WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
    //baca informasi suhu untuk semua data -sumbu Y grafik
    $suhu    = mysqli_query($konek, "SELECT suhu FROM tb_sensor WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
    //baca informasi kelembaban untuk semua data -sumbu Y grafik
    $kelembaban    = mysqli_query($konek, "SELECT kelembaban FROM tb_sensor WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC")

?>

<!-- tampilan grafik -->
<div class= "panel panel-primary">
    <div class="panel-heading">
        Grafik Sensor
    </div>

    <div class="panel-body">
        <!-- siapkan canvas untuk grafik -->
        <canvas id="myChart"></canvas>

        <!-- gambar grafik -->
        <script type="type/javascript">
            //baca ID canvas tempat grafik akan diletakkan
            var canvas = document.getElementById('myChart') ;
            //letakkan data tanggal dan suhu untuk Grafik
            var data = {
                labels : [
                    <?php
                        while($data_tanggal = mysqli_fetch_array($tanggal))
                        {
                            echo'"'.$data_tanggal['tanggal'].'",' ;
                        }
                    ?>
                    ],
                    datasets : [
                        {
                        label : "suhu",
                        fill : true,
                        backgroundColor: "rgba(10,255,33, 0.4)",
                        borderColor: "rgba(0,0,255, .8)" ,
                        lineTension: 0.5,
                        pointRadius: 3,
                        data : [
                            <?php
                                while($data_suhu = mysqli_fetch_array($suhu))
                                {
                                    echo $data_suhu['suhu'].',' ;
                                }
                            ?>

                        ]
                    },
                    {
                        label : "kelembaban",
                        fill : true,
                        backgroundColor: "rgba(239,55,93, 0.4)",
                        borderColor: "rgba(255,0,2, .8)" ,                        
                        lineTension: 0.5,
                        pointRadius: 2,
                        data : [
                            <?php
                                while($data_kelembaban = mysqli_fetch_array($kelembaban))
                                {
                                    echo $data_kelembaban['kelembaban'].',' ;
                                }
                            ?>

                        ]
                    }
                    ]
            } ;


            //opsi Grafik
            var option = {
                showLines : true,
                animation : {duration : 3}
            } ;

            //cetak grafik kedalam canvas
            var myLineChart = Chart.Line(canvas, {
                data : data,
                options : option
            }) ;


        </script>

    
    </div>
</div>