<?php

namespace App\Console;

use App\Models\Billing;
use App\Models\Donate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {

            $users = User::where("type", 100)->with('sponsar')->get();
            try {

                foreach ($users as $user) {
                    if ($user->sponsar) {
                        $donationType = $user->sponsar->contribution_type; // Billing type
                        $amount = $user->sponsar->sponsor_number; // Amount
                        $userId = $user->id;
                        $createdAt = Carbon::parse($user->created_at);
                        $today = Carbon::now();
                        $billcheck = Billing::where("user_id", $userId)->orderBy("id", "desc")->first();

                        if ($billcheck) {
                            $createdAt = Carbon::parse($billcheck->created_at);
                            if ($donationType === "Monthly") {
                                $nextBillingDate = $createdAt->copy()->addDays(30);
                            } elseif ($donationType === "quarterly") {
                                $nextBillingDate = $createdAt->copy()->addDays(90);
                            } elseif ($donationType === "Half Yearly") {
                                $nextBillingDate = $createdAt->copy()->addDays(180);
                            } elseif ($donationType === "Yearly") {
                                $nextBillingDate = $createdAt->copy()->addDays(365);
                            } else {
                                return; 
                            }
                            $check =  Billing::where("user_id", $userId)
                                ->whereDate("created_at", $nextBillingDate) // Check if already billed
                                ->first();
                                
                            if (!$check) {
                                Billing::create([
                                    "user_id" => $userId,
                                    "amount" => $amount,
                                    "status" => "not_paid", // Enum: paid / not_paid / partial
                                    "paid_amount" => 0,
                                    "partial" => 0,
                                ]);
                            }
                        }
                    }
                }
            } catch (\Throwable $th) {
                
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
