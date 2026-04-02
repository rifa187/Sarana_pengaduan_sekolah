<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    private $importedCount = 0;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Skip empty NIS
        if (!isset($row['nis']) || empty($row['nis'])) {
            return null;
        }

        $nis = $row['nis'];
        
        // Handle name fallback
        $name = $row['nama_lengkap'] ?? ($row['nama'] ?? 'Siswa Baru');
        
        // Handle class
        $kelas = $row['kelas'] ?? '-';
        
        // Extract Jurusan dari Kelas (Misal "XII RPL 1" -> "RPL")
        $parts = explode(' ', $kelas);
        $jurusan = isset($parts[1]) ? $parts[1] : '-';

        // Check if user already exists
        if (!User::where('nis', $nis)->exists()) {
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

        return null;
    }

    public function getImportedCount()
    {
        return $this->importedCount;
    }
}
