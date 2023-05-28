<?php

namespace App\Observers;

use App\Models\User;
use App\Models\ReviewSc;
use App\Models\ReviewMbkm;
use App\Models\SupportCourse;

class UserObserver
{
    private function updateAverageRatingSc($courseId)
    {
        $averageRating = ReviewSc::where('courses_id', $courseId)->avg('rating');
        $averageRating = number_format($averageRating, 1);

        $course = SupportCourse::find($courseId);
        $course->rating = $averageRating;
        $course->save();
    }

    private function updateAverageRatingMbkm($mbkmId)
    {
        $averageRating = ReviewMbkm::where('mbkm_id', $mbkmId)->avg('rating');
        $averageRating = number_format($averageRating, 1);

        $course = SupportCourse::find($mbkmId);
        $course->rating = $averageRating;
        $course->save();
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $coursesIds = $user->reviewscs()->pluck('courses_id')->unique();
        $mbkmIds = $user->reviewmbkms()->pluck('mbkm_id')->unique();

        $user->reviewscs()->delete();
        foreach ($coursesIds as $courseId) {
            $this->updateAverageRatingSc($courseId);
        }

        $user->reviewmbkms()->delete();
        foreach ($mbkmIds as $mbkmId){
            $this->updateAverageRatingMbkm($mbkmIds);
        }

        $user->comments()->delete();
    }
}
