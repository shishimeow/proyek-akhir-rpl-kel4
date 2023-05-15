<?php

namespace App\Http\Controllers;

use App\Models\ReviewSc;
use App\Models\ReviewMbkm;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        switch ($request->input('action')){
            case 'cancel':

                break;
            
            case 'reply':
                $comment = new Comment;
                $comment->comment = $request->comment;
                $comment->rev_id = $request->rev_id;
                $comment->user_id = $request->user_id;
                $comment->type = $request->type;
                $comment->user()->associate($request->user());
                
                $tipe = $request->type;
                if($tipe == 'sc')
                    $review = ReviewSc::find($request->rev_id);
                else
                    $review = ReviewMbkm::find($request->rev_id);

                $review->comments()->save($comment);
                
                return back();
                break;
        }
    }

    public function replyStore(Request $request){
        switch ($request->input('action')){
            case 'cancel':

                break;
            
            case 'reply':
                $reply = new Comment();
                $reply->comment = $request->comment;
                $reply->rev_id = $request->rev_id;
                $reply->user_id = $request->user_id;
                $reply->parent_id = $request->comment_id;
                $reply->type = $request->type;
                $reply->user()->associate($request->user());
        
                $tipe = $request->type;
                if($tipe == 'sc')
                    $review = ReviewSc::find($request->rev_id);
                else
                    $review = ReviewMbkm::find($request->rev_id);
                
                $review->comments()->save($reply); 

                $counter = Comment::where('parent_id', $request->comment_id)->count();
                return back();
                break;
        }
    }

    public function update(Request $request){
        switch ($request->input('action')){
            case 'cancel':

                break;
            
            case 'save':
                $id = $request->input('comment_id');
                $review = Comment::where('id', $id);
        
                $review->update([
                    'comment' => $request->input('comment')
                ]);
        
                session()->flash('updateCom', 'Komen berhasil diperbarui!');
                return back();
                break;
        }
    }

    public function destroy(Request $request){
        $id = $request->input('comment_id');

        Comment::destroy($id);
        session()->flash('deleteCom', 'Komen berhasil dihapus!');
        return back();
    }
}
