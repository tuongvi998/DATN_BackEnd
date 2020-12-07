<?php

namespace App\Jobs\Export;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;

class User implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $requested_by;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($requested_by)
    {
        $this->requested_by = $requested_by;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new FastExcel($this->generator()))
            ->export(
                Storage::disk('local')->getAdapter()->applyPathPrefix("export.xlsx"),
                function ($user) {
                    return [
                        "id" => $user->id,
                        "Tên" => $user->name,
                        "Email" => $user->email
                    ];
                });
        $this->requested_by->notify(new \App\Notifications\Export\User());
    }

    public function generator()
    {
        $users = \App\User::select(['id', 'name', 'email'])->cursor();
        foreach ($users as $user) {
            yield $user;
        }
    }
}
