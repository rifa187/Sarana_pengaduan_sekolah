<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentsImport implements ToModel, WithHeadingRow, SkipsEmptyRows, WithChunkReading
{
    private int $importedCount = 0;

    /**
     * Ambil nilai dari row dengan berbagai kemungkinan nama kolom.
     * Kolom-kolom diluar yang dibutuhkan akan otomatis diabaikan.
     */
    private function getColumnValue(array $row, array $possibleKeys): ?string
    {
        foreach ($possibleKeys as $key) {
            // Cari kolom yang cocok (case-insensitive, ignoring spaces/underscores)
            foreach ($row as $rowKey => $rowValue) {
                $normalizedRowKey = strtolower(str_replace([' ', '_', '-', '.'], '', $rowKey));
                $normalizedKey    = strtolower(str_replace([' ', '_', '-', '.'], '', $key));

                if ($normalizedRowKey === $normalizedKey && !empty($rowValue)) {
                    return trim((string) $rowValue);
                }
            }
        }

        return null;
    }

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // ===================================================
        // Ambil NIS — cari dari berbagai kemungkinan nama kolom
        // ===================================================
        $nis = $this->getColumnValue($row, [
            'nis', 'nisn', 'no_induk', 'no induk', 'nomor_induk',
            'nomor induk', 'id_siswa', 'id siswa', 'kode_siswa'
        ]);

        if (empty($nis)) {
            return null; // Skip baris tanpa NIS
        }

        // ===================================================
        // Ambil Nama — cari dari berbagai kemungkinan nama kolom
        // ===================================================
        $name = $this->getColumnValue($row, [
            'nama_lengkap', 'nama lengkap', 'nama', 'name',
            'full_name', 'full name', 'nama_siswa', 'nama siswa'
        ]) ?? 'Siswa ' . $nis;

        // ===================================================
        // Ambil Kelas — cari dari berbagai kemungkinan nama kolom
        // ===================================================
        $kelas = $this->getColumnValue($row, [
            'kelas', 'class', 'tingkat_kelas', 'rombel',
            'rombongan_belajar', 'kelas_jurusan'
        ]) ?? '-';

        // Extract Jurusan dari Kelas (Misal "XII RPL 1" -> "RPL")
        $parts   = explode(' ', $kelas);
        $jurusan = isset($parts[1]) ? $parts[1] : '-';

        // Skip jika NIS sudah ada di database
        if (User::where('nis', $nis)->exists()) {
            return null;
        }

        $this->importedCount++;

        return new User([
            'nis'      => $nis,
            'name'     => $name,
            'kelas'    => $kelas,
            'jurusan'  => $jurusan,
            'role'     => 'siswa',
            'password' => Hash::make($nis), // Password default = NIS
        ]);
    }

    public function chunkSize(): int
    {
        return 200; // Proses 200 baris sekaligus agar efisien untuk file besar
    }

    public function getImportedCount(): int
    {
        return $this->importedCount;
    }
}
