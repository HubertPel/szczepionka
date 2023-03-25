<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\StreamOutput;

class StartProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start-project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Komenda do wystarowania projektu dla opornych';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Komenda sprawdzi czy wszystko jest gotowe do startu i zrobi to za ciebie');
        $this->newLine();
        $this->info('Instalacja paczek potrzebnych do startu');
        $this->newLine();

        //composer install
        $this->info('-------------------------------COMPOSER OUTPUT------------------------------');
        $this->newLine();
        shell_exec('composer install');
        $this->newLine();
        $this->info('-------------------------------COMPOSER OUTPUT------------------------------');

        $this->newLine();

        //env file
        $this->line('<fg=yellow>Sprawdzanie czy istnieje plik .env</>');

        if (file_exists(base_path() . '\.env')) {
            $this->info('Istnieje');
        } else {
            $this->line('<fg=yellow>Brak pliku kopiowanie</>');
            if (file_exists(base_path() . '\.env.example') && copy(base_path() . '\.env.example', base_path() . '\.env')) {
                $this->info('Success');
                $this->info('Urochom ponownie komende w celu wczytania zmiennych projektowych');

                return 0;
            } else {
                $this->error('Kopiowanie nie powiodło się zrób to ręcznie i odpal komende jeszcze raz                     |');
                $this->error('W folderze powinien znajdować sie .env.example przekopiuj go                                |');
                $this->error('lub pobierz go z stąd https://blog.quickadminpanel.com/how-to-use-laravel-env-example-files/|');
            }
        }
        $this->newLine(2);

        // sprawdzanie połaczenia z baza
        $this->line('<fg=yellow>Sprawdzanie połączenia z bazą danych</>');
        $connectionExist = false;
        try {
            \DB::connection()->getPDO();
            $connectionExist = true;
        } catch (\Exception $e) {
            $connectionExist = false;
        }

        if ($connectionExist) {
            $this->info('Baza danych jest poprawnie podłączona');
            $this->newLine(2);
        } else {
            $this->error('Nie można połaczyć się z baza danych, sprawdź czy xampp jest odpalony                                  |');
            $this->error('lub czy baza w pliku .env jest dobrze skonfigurowana                                                   |');
            $this->error('nie ma to wpływu na start projektu lecz miejsca w których dane są pobierane z bazy będa wyświetlać błąd|');
            $this->error('sprawdź także czy istnieje baza danych o takiej nazwie "' . env('DB_DATABASE') . '"                                   |');
            $this->newLine(2);
            $this->info('Start projektu będzie kontynuowany');
        }

        $this->info('-------------------------------INFORMACJE NA TEMAT BAZY------------------------------');
        $this->line('<fg=yellow>Połączenie:</>  <fg=bright-blue>' . env('DB_CONNECTION') . '</>');
        $this->line('<fg=yellow>Host:</>        <fg=bright-blue>' . env('DB_HOST') . '</>');
        $this->line('<fg=yellow>Port:</>        <fg=bright-blue>' . env('DB_PORT') . '</>');
        $this->line('<fg=yellow>Baza:</>        <fg=bright-blue>' . env('DB_DATABASE') . '</>');
        $this->line('<fg=yellow>Użytkownik:</>  <fg=bright-blue>' . env('DB_USERNAME') . '</>');
        $this->info('-------------------------------INFORMACJE NA TEMAT BAZY------------------------------');

        //migracje
        if ($connectionExist) {
            $this->newLine(2);
            $this->info('Migrowanie bazy  danych');
            $this->info('-------------------------------MIGRACJE------------------------------');
            $this->newLine();
            \Artisan::call('migrate', [], $this->getOutput());
            $this->newLine();
            $this->info('-------------------------------MIGRACJE------------------------------');
        }

        // serve
        $this->newLine();
        $this->info('-------------------------------START LOKALNEGO SERWERA------------------------------');
        $this->info('Poniżej pokaże się adres twojego lokalnego serwera wpisz go w przeglądarkę');
        $this->newLine();
        \Artisan::call('serve', [], $this->getOutput());
    }
}
