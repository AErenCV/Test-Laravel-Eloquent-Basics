<?php

namespace App\Listeners;

use App\Models\Stat;
use App\Events\Observer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CountObserver
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Observer  $event
     * @return void
     */
    public function handle(Observer $event)
    {
        $projects_count = Stat::select('projects_count')->where('id', '=', 1)->get();
        $update_project_count = Stat::where('id', '=', 1)->update('projects_count', ++$projects_count);

        return $update_project_count;
    }
}
