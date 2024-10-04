<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Pembelian</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('https://images5.alphacoders.com/131/1311994.jpeg');
            /* Custom latar belakang */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            color: white;
            /* Membuat teks lebih mudah dibaca dengan kontras */
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            /* Memberikan latar belakang transparan pada form */
            padding: 20px;
            border-radius: 10px;
        }

        .alert {
            background-color: rgba(255, 255, 255, 0.8);
            color: black;
        }

        h2,
        h4 {
            color: rgb(red, green, blue);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Hitung Total Pembelian</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="totalBelanja" class="form-label">Total Belanja (Rp)</label>
                <input type="number" class="form-control" id="totalBelanja" name="totalBelanja"
                    placeholder="Masukkan total belanja" required>
            </div>

            <div class="mb-3">
                <label for="member" class="form-label">Status Member</label>
                <select class="form-control" id="member" name="member" required>
                    <option value="yes">Member</option>
                    <option value="no">Bukan Member</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $totalBelanja = $_POST['totalBelanja'];
            $isMember_0008 = $_POST['member'] == 'yes';

            $Diskon = 0;

            $totalharga = $totalBelanja;

            if ($isMember_0008) {
                $Diskon = 10; // Diskon member 10%
        
                $totalharga -= ($totalBelanja * ($Diskon / 100));


                // Tambahan diskon berdasarkan jumlah belanja
                if ($totalBelanja >= 500000) {
                    $tambahdiskon = 10; // Diskon tambahan 10% jika lebih dari 500.000
        
                    $totalharga -= ($totalBelanja * ($tambahdiskon / 100));

                } elseif ($totalBelanja >= 300000) {
                    $tambahdiskon = 5; // Diskon tambahan 5% jika lebih dari 300.000
        
                    $totalharga -= ($totalBelanja * ($tambahdiskon / 100));

                }
            } else {
                // Bukan member
                if ($totalBelanja >= 500000) {
                    $Diskon = 10; // Diskon 10% jika lebih dari 500.000
        
                    $totalharga -= ($totalBelanja * ($Diskon / 100));

                }
            }

            // Output hasil perhitungan
            echo "<div class='alert alert-info mt-4'>";
            echo "<h4>Hasil Perhitungan</h4>";
            echo "Total Belanja: Rp " . number_format($totalBelanja, 2, ',', '.') . "<br>";
            if ($isMember_0008) {
                echo "Status: Member <br>";
                echo "Diskon Member 10% diterapkan.<br>";
            } else {
                echo "Status: Bukan Member <br>";
            }
            if ($totalBelanja >= 500000) {
                echo "Potongan Tambahan 10% diterapkan.<br>";
            } elseif ($totalBelanja >= 300000 && $isMember_0008) {
                echo "Potongan Tambahan 5% diterapkan.<br>";
            }
            echo "Total Akhir Setelah Diskon: Rp " . number_format($totalharga, 2, ',', '.') . "<br>";
            echo "</div>";
        }
        ?>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>