<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportJK implements FromCollection, WithHeadings
{
    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->users->map(function ($user, $index) {
            return [
                $index + 1, // Nomor
                $user->name,
                $user->phone_number,
                $user->job_title,
                $user->address,
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama Karyawan',
            'No Telepon',
            'Jabatan',
            'Alamat'
        ];
    }
}
