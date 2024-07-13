<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        // * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1 -> servidor
        // $schedule->call(function () {
        //     $empresas = Empresa::where('data_expiracao', '<', now())->get();
        //     foreach ($empresas as $empresa) {
        //         $empresa->status = 'bloqueada';
        //         $empresa->save();
        //     }
        // })->monthly() ou ->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
