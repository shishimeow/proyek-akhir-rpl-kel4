<?php

namespace App\Observers;

use App\Models\ReviewMbkm;
use App\Models\mbkm;

class ReviewMbkmObserver
{
    private function updateAverageRating(ReviewMbkm $reviewMbkm)
    {
        $courseId = $reviewMbkm->mbkm_id;
        $averageRating = ReviewMbkm::where('mbkm_id', $courseId)->avg('rating');
        $averageRating = number_format($averageRating, 1);

        $course = mbkm::find($courseId);
        $course->rating = $averageRating;
        $course->save();
    }
    /**
     * Handle the ReviewMbkm "created" event.
     */
    public function created(ReviewMbkm $reviewMbkm)
    {
        $this->updateAverageRating($reviewMbkm);
    }

    /**
     * Handle the ReviewMbkm "updated" event.
     */
    public function updated(ReviewMbkm $reviewMbkm)
    {
        $this->updateAverageRating($reviewMbkm);
    }

    /**
     * Handle the ReviewMbkm "deleted" event.
     */
    public function deleted(ReviewMbkm $reviewMbkm)
    {
        $this->updateAverageRating($reviewMbkm);
    }
}
