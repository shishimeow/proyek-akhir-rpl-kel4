<?php

namespace App\Observers;

use App\Models\ReviewSc;
use App\Models\SupportCourse;

class ReviewScObserver
{
    private function updateAverageRating(ReviewSc $reviewSc)
    {
        $courseId = $reviewSc->courses_id;
        $averageRating = ReviewSc::where('courses_id', $courseId)->avg('rating');
        $averageRating = number_format($averageRating, 1);

        $course = SupportCourse::find($courseId);
        $course->rating = $averageRating;
        $course->save();
    }
    /**
     * Handle the ReviewSc "created" event.
     */
    public function created(ReviewSc $reviewSc)
    {
        $this->updateAverageRating($reviewSc);
    }

    /**
     * Handle the ReviewSc "updated" event.
     */
    public function updated(ReviewSc $reviewSc)
    {
        $this->updateAverageRating($reviewSc);
    }

    /**
     * Handle the ReviewSc "deleted" event.
     */
    public function deleted(ReviewSc $reviewSc)
    {
        $this->updateAverageRating($reviewSc);
    }
}
