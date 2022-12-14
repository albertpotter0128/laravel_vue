<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('moon:coins_data')->everyFiveMinutes();
        $schedule->command('moon:fear-greed')->dailyAt('05:00');
        $schedule->command('moon:twitter')->daily();
        $schedule->command('moon:telegram')->daily();
        $schedule->command('moon:coins_links')->daily();
        $schedule->command('moon:global')->twiceDaily();
        $schedule->command('moon:trading_volume_history')->daily();
        $schedule->command('moon:lunarcrush')->twiceDaily(1,13);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
