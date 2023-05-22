<?php 

function formatPhoneNumber($phoneNumber)
{
    // Menghapus spasi dan karakter non-digit dari nomor telepon
    $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

    // Mengubah nomor telepon jika diawali dengan '0'
    if (substr($phoneNumber, 0, 1) === '0') {
        $phoneNumber = '+62' . substr($phoneNumber, 1);
    }
    // Mengubah nomor telepon jika diawali dengan '62'
    elseif (substr($phoneNumber, 0, 2) === '62') {
        $phoneNumber = '+' . $phoneNumber;
    }
    // Menambahkan '+62' jika tidak ada '0' di awal nomor telepon
    else {
        $phoneNumber = '+62' . $phoneNumber;
    }

    return $phoneNumber;
}

function formatCurrency($amount)
{
    $formattedAmount = 'Rp. ' . number_format($amount, 0, ',', '.');
    return $formattedAmount;
}
