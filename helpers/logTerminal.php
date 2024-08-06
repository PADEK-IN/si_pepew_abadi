<?php 
    function console_log($data) {
        // Kode warna ANSI untuk kuning
        $colorCode = '33'; // Kuning
        $colorStart = "\033[" . $colorCode . "m";
        $colorEnd = "\033[0m"; // Reset warna
        
        // Mengonversi data ke string jika bukan string
        if (is_string($data)) {
            $message = $data;
        } else {
            // Mengonversi array atau objek ke format string JSON
            $message = json_encode($data, JSON_PRETTY_PRINT);
            
            // Jika json_encode gagal, gunakan var_export sebagai alternatif
            if ($message === false) {
                $message = var_export($data, true);
            }
        }
        
        // Format pesan dengan warna kuning
        $coloredMessage = $colorStart . $message . $colorEnd . PHP_EOL;
        
        // Kirim pesan ke output standar (terminal)
        error_log($coloredMessage, 3, "php://stdout");
    }