<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Cash;
use App\Models\Donation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    // Fungsi Melihat Donasi Tunai
    public function index(Request $request)
    {
        // if($request->ajax()) {
        //     $cash = Cash::
        //     where('tcs_source','like','%'.$request->keywords.'%')->
        //     paginate(10);
        //     return view('pages.cash.list', compact('cash'));
        // }
        // return view('cash.main');
        if ($request->ajax()) {
            $json = file_get_contents(public_path('data.json'));
            $cash = json_decode($json, true);
            
            $filteredData = array_filter($cash, function ($item) use ($request) {
                return strpos(strtolower($item['title']), strtolower($request->keywords)) !== false;
            });
            
            $perPage = 10;
            $currentPage = $request->page ?? 1;
            $offset = ($currentPage - 1) * $perPage;
            $pagedData = array_slice($filteredData, $offset, $perPage);
            $data = new LengthAwarePaginator($pagedData, count($filteredData), $perPage, $currentPage);
            // dd($data);
            return view('pages.cash.list', compact('data'));
        }
        
        return view('pages.cash.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Cash $cash)
    {
        $donation= Donation::get();
        return view('pages.cash.modal', compact('donation','cash'));
    }
    // Fungsi Menyetujui Donasi Tunai
    public function accept(Request $request, Cash $cash)
    {
        try {
            $cash->comment = $request->comment;
            $cash->tcs_status = 'accepted';
            $cash->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi Tunai '. $request->tc_title . ' telah disetujui',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
    // Fungsi Menolak Donasi Tunai
    public function deny(Request $request, Cash $cash)
    {
        try {
            $cash->comment = $request->comment;
            $cash->tcs_status = 'denied';
            $cash->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi Tunai '. $request->tc_title . ' telah ditolak',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    // Fungsi Membuat Donasi Tunai
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'tcs_source' => 'required|string',
                'id_donation' => 'required',
                'tcs_total' => 'required'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah: ' . $e->getMessage(),
            ], 422);
        }
        try {
            $cash = new Cash;
            $cash->tcs_source = $request->tcs_source;
            $cash->id_donation = $request->id_donation;
            $cash->tcs_total = Str::of($request->tcs_total)->replace(',','')?: 0;
            $cash->id_user = Auth::user()->id;
            $cash->tcs_status = 'waiting';
            $cash->save();
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi Tunai '. $request->tcs_source . ' telah ditambahkan',
            ]);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cash  $cash
     * @return \Illuminate\Http\Response
     */
    public function show(Cash $cash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cash  $cash
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Cash $cash)
    {
        $donation= Donation::get();
        return view('pages.cash.modal', compact('donation','cash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cash  $cash
     * @return \Illuminate\Http\JsonResponse
     */
    // Fungsi Mengubah Donasi Tunai
    public function update(Request $request, Cash $cash)
    {
        try {
            
            $cash->tcs_source = $request->tcs_source;
            $cash->id_donation = $request->id_donation;
            $cash->tcs_total = Str::of($request->tcs_total)->replace(',','')?: 0;
            $cash->tcs_status = 'waiting';
            $cash->id_user = Auth::user()->id;
            $cash->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi tunai '. $request->tcs_source . ' telah di Update',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }

  
}
