<?php

namespace App\Console\Commands;

Use App\Models\Siswa;
use Illuminate\Console\Command;
use Carbon\Carbon;

class KurangiPoinSiswa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siswa:kurangi-poin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengurangi poin siswa jika tidak meminjam buku';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $siswas = Siswa::all();

        foreach ($siswas as $siswa) {
            if (!$siswa->meminjamBukuHariIni()) {
                $siswa->kurangiPoin();
            }
        }

        $this->info('Poin siswa berhasil diperbarui.');
    }
}
