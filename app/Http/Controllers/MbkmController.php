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

    public function filterMonth(Request $request){
        if($request->has('filter')){
            $filters = $request->input('filter');
            $mbkm = Mbkm::whereIn(Mbkm::raw('MONTH(periode_begin)'), $filters)->get();
            $months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            return view('mbkm.index', [
                'title' => 'MBKM',
                'mbkms' => $mbkm,
                'months' => $months
            ]);
        }

        return redirect('mbkm');
    }

    // public function filterRange(Request $request){
    //     if($request->has('filter')){
    //         $toDate = Carbon::parse($request->endAt);
    //         $fromDate = Carbon::parse($request->beginAt);
    //         $range = $toDate->diffInMonths($fromDate);
    //         $months = [
    //             'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    //             'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    //         ];

    //         return view('mbkm.index', [
    //             'title' => 'MBKM',
    //             'mbkms' => $mbkm,
    //             'months' => $months
    //         ]);
    //     }

    //     return redirect('mbkm');
    // }

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

                session()->flash('success', 'Review berhasil ditambahkan!');
                return redirect('/mbkm/'.$course->slug);
                break;
        }
    }

    public function update(Request $request){
        $id = $request->input('rev_id');
        $review = Mbkm::where('id', $id);

        $review->update([
            'rev_mbkm' => $request->input('rev_mbkm')
        ]);

        return back();
    }

    public function destroy(Request $request){
        $id = $request->input('rev_id');

        ReviewMbkm::destroy($id);
        session()->flash('delete', 'Review berhasil dihapus!');
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
