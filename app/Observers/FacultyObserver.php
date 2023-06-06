<?php

namespace App\Observers;
use App\Models\Faculty;

class FacultyObserver
{
    /**
     * Handle the Faculty "deleted" event.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return void
     */
    public function deleted(Faculty $faculty)
    {
        $faculty->supportCourses()->delete();
    }
}
