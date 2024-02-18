<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Sellers;
use App\Models\Sales;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {

            $modelSellers = new Sellers;

            $modelSales = new Sales;

            $date = date('Y-m-d');

            $Allsellers = $modelSellers->all();

            $sales = $modelSales->listSale('', $date, $date);
            $SumSalesTotal = $modelSales->SumSales('', $date, $date);
            
            foreach($Allsellers as $seller){
                Mail::to($seller)->send(new Contact($seller, $sales, $SumSalesTotal));
            }
            
        })->timezone('America/Sao_Paulo')->daily();
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
