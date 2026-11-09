<?php

function catatAktivitas($conn, $jenis, $nama_tabel, $id_data, $keterangan = '')
{
    $id_akun = $_SESSION['id_akun'] ?? null;

    $stmt = mysqli_prepare($conn, "
        INSERT INTO aktivitas
        (id_akun, jenis_aktivitas, nama_tabel, id_data, keterangan)
        VALUES (?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        error_log("Gagal menyiapkan aktivitas: " . mysqli_error($conn));
        return false;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "issis",
        $id_akun,
        $jenis,
        $nama_tabel,
        $id_data,
        $keterangan
    );

    $berhasil = mysqli_stmt_execute($stmt);

    if (!$berhasil) {
        error_log("Gagal mencatat aktivitas: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    return $berhasil;
}
?>