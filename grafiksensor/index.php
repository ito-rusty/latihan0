<!DOCTYPE html>
<html>
<head>
    <title>Grafik Sensor</title>

    <!-- panggil file bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="jquery-latest.js"></script>

    <!-- memanggil grafik -->
    <script type="text/javascript">
        var refreshid = setInterval(function(){
            $('#responsecontainer').load('data.php');
        }, 1000) ;

    </script>


</head>
<body>
    <!-- tempat untuk tampilan grafik -->
    <div class="container" style="text-align: center;">
        <h1>Grafik Sensor Secara Realtime_byRST</h1>
        <p>(Data yang ditampilkan adalah pergerakan data terakhir)</p>
    </div>

    <!-- div untuk grafik -->
    <div class="container" id="responsecontainer" style="width: 60% ; text-align: center; font-size: 100% ;">
    </div>
    
    <!-- pemanis untuk menapilkan ganbar -->
    <div class="container" style="text-align:center;">
        <img src="assets/img/rusty.png" alt="Image" height="30" width="250" ;>
    </div>


</body>


</html>