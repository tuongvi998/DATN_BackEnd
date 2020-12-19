<?php

namespace App\Jobs\Export;

use App\ActivityDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;

class User implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $requested_by;
    private $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($requested_by, $id)
    {
        $this->requested_by = $requested_by;
        $this->id = $id;
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
//                        "id" => $user->id,
                        "Tên" => $user->name,
                        "Email" => $user->email,
                        "Ngày sinh" => $user->birthday,
                        "Điên thoại" => $user->phone
                    ];
                });
        $this->requested_by->notify(new \App\Notifications\Export\User());
    }

    public function generator()
    {
        $volunteer = ActivityDetail::where('activity_details.id','=',$this->id)
            ->join('register_profiles','register_profiles.activity_id','=','activity_details.id')
            ->join('users','users.id','=', 'register_profiles.volunteer_user_id')
            ->join('volunteers','volunteers.user_id','=','users.id')
            ->where('register_profiles.isAccept', '=', 1)
            ->select(['users.name', 'users.email', 'volunteers.birthday', 'volunteers.phone'])->cursor();
        foreach ($volunteer as $user) {
            yield $user;
        }

    }
}
