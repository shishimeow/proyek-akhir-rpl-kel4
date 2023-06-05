<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mbkm;
use App\Models\ReviewMbkm;
use Carbon\Carbon;

class MbkmController extends Controller
{
    
    public function index(){
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        return view('mbkm.index', [
            'title' => 'MBKM',
            'mbkms' => mbkm::all(),
            'months' => $months
        ]);
    }

    public function show(mbkm $course){
        $reviews = ReviewMbkm::where('mbkm_id', $course->id)->get();

        return view('mbkm.context', [
            'title' => $course->mbkm_name,
            'mbkm' => $course,
            'reviews' => $reviews
        ]);
    }

    public function filter(Request $request){
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        if($request->has('filter') && $request->input('filter') != 'all'){
            $filters = (array) $request->input('filter');
            $mbkm = mbkm::whereIn(mbkm::raw('MONTH(periode_begin)'), $filters)->get();

            return view('mbkm.index', [
                'title' => 'MBKM',
                'mbkms' => $mbkm,
                'months' => $months
            ]);
        }
        else if($request->has('rate')){
            $course = [];
            $filter = (int) $request->input('rate');

            switch($filter){
                case 1: $course = mbkm::where('rating', 5)->select('mbkm_name', 'periode_begin', 'periode_end', 'excerpt', 'slug', 'rating')->get();
                        break;
                case 2: $course = mbkm::whereBetween('rating', [4, 4.99])->select('mbkm_name', 'periode_begin', 'periode_end', 'excerpt', 'slug', 'rating')->get();
                        break;
                case 3: $course = mbkm::where('rating', '<', 4)->select('mbkm_name', 'periode_begin', 'periode_end', 'excerpt', 'slug', 'rating')->get();
                        break;
                default: $course = mbkm::all();
            };

            return view('mbkm.index', [
                'title' => 'MBKM',
                'mbkms' => $course,
                'months' => $months
            ]);
        }

        return redirect('mbkm');
    }


    public function store(Request $request, Mbkm $course){
        switch ($request->input('action')) {
            case 'cancel':

                break;
    
            case 'add':
                $request->validate([
                    'rev_mbkm' => 'required',
                    'mbkm_id' => 'required',
                    'rating' => 'required'
                ]);

                $validate = $request->all();
                $validate['user_id'] = auth()->user()->id;
        
                ReviewMbkm::create($validate);

                session()->flash('successRev', 'Review berhasil ditambahkan!');
                return redirect('/mbkm/'.$course->slug);
                break;
        }
    }

    public function update(Request $request){
        $id = $request->input('rev_id');
        $review = ReviewMbkm::findOrFail($id);
    
        $review->rev_mbkm = $request->input('rev_mbkm');
        $review->rating = $request->input('rating');
        $review->save();
    
        session()->flash('successRev', 'Review berhasil diperbarui!');
        return back();
    }

    public function destroy(Request $request){
        $id = $request->input('rev_id');

        ReviewMbkm::destroy($id);
        session()->flash('deleteRev', 'Review berhasil dihapus!');
        return back();
    }

    public function search(){
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        return view('mbkm.index',  [
            'title' => 'MBKM',
            'mbkms' => Mbkm::query()->filter()->get(),
            'months' => $months
        ]);
    }
}
