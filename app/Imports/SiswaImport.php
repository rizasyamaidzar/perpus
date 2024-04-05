<?php

namespace App\Imports;
use Carbon\Carbon;
use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tanggal= \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6])->format('Y-m-d');
        $tanggalTanpaStrip = Str::replace('-', '', $tanggal);
        $user = User::create([
            "username" => $row[2],
            "password" =>  $tanggalTanpaStrip,
            "role" => 0,
        ]);
        $newUser = $user->id;
        return new Siswa([
            //
            'nama' => $row[1],
            'nisn' => $row[2],
            'jenis_kelamin' => $row[3],
            'kelas' => $row[4],
            'tempat_lahir' => $row[5],
            'tanggal' => $tanggal,
            'foto' => 'no-file',
            'point' => 0,
            'user_id' => $newUser
            
        ]);
    }
}
