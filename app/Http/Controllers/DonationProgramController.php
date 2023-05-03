<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Donation;
use App\Models\Category;
use App\Services\DonationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DonationProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    // Fungsi Melihat Program Donasi
    public function index(Request $request)
    {
        // try {
        //     $donation = null;

        //     if (getenv('MOCK_DONASI_LIST') === true) {
        //         $json = file_get_contents('../../../Mock/data_donation_list.json');
        //         $donation = json_decode($json);
        //     } else {
        //         $payload = {
        //             'title' => $request->judul,
        //             'penyelenggara' => $request->penyelenggara,
        //             'description' => $request->deskripsi,
        //         };

        //         if ($request->hasFile('td_image')) {
        //             $file = $request->file('td_image');
        //             $extension = $file->getClientOriginalExtension();
        //             $filename = preg_replace('/\s+/', '', $request->td_title) . '-' . $donation->id .  '.' . $extension;
        //             $file->move(Donation::$FILE_DESTINATION, $filename);

        //             $payload->gambar = $FILE_DESTINATION . '/' . $filename;
        //         }

        //         $donation = DonationService::postData($payload);
        //     }

        //     return view('donation.list', compact('donation'));
        // } catch (\Exception $e) {
        //     Log::error($e->getMessage);
        //     return view('error');
        // }

        if($request->ajax()) {
            $donation = Donation::
            where('td_title','like','%'.$request->keywords.'%')->
            paginate(10);
            return view('donation.list', compact('donation'));
        }
        return view('donation.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Donation $donation)
    {
        $category= Category::get();
        return view('donation.modal', compact('category','donation'));
    }
    // Fungsi Menyetujui Program Donasi
    public function accept(Request $request, Donation $donation)
    {
        try {
            $donation->comment = $request->comment;
            $donation->td_status = 'accepted';
            $donation->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Program Donasi '. $request->td_title . ' telah disetujui',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
    // Fungsi Menolak Program Donasi
    public function deny(Request $request, Donation $donation)
    {
        try {
            $donation->comment = $request->comment;
            $donation->td_status = 'denied';
            $donation->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Program Donasi '. $request->td_title . ' telah ditolak',
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
    // Fungsi Membuat Program Donasi
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_category' => 'required',
            'td_title' => 'required|string',
            'td_receiver' => 'required|string',
            'td_target' => 'required',
            'td_duration' => 'required',
            'td_description' => 'required',
            'td_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('id_category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_category'),
                ]);
            }else if($errors->has('td_title')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('td_title'),
                ]);
            }else if($errors->has('td_receiver')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('td_receiver'),
                ]);
            }else if($errors->has('td_target')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('td_target'),
                ]);
            }else if($errors->has('td_duration')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('td_duration'),
                ]);
            }else if($errors->has('td_description')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('td_description'),
                ]);
            }else if($errors->has('td_image')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('td_image'),
                ]);
            }
        }
        try {
            $donation = new Donation;
            $donation->id_user = Auth::user()->id;
            $donation->id_category = $request->id_category;
            $donation->td_title = $request->td_title;
            $donation->td_location = $request->td_location;
            $donation->td_receiver = $request->td_receiver;
            $donation->td_target = Str::of($request->td_target)->replace(',','')?: 0;
            $td_duration_end = strtok(substr($request->td_duration, strpos($request->td_duration, "to"), 13), " to");
            $td_duration_started = strtok($request->td_duration, "to ");
            $donation->td_duration_started = $td_duration_started;
            $donation->td_duration_end = $td_duration_end;
            $donation->td_description = $request->td_description;
            $donation->td_image = Donation::$FILE_DESTINATION . '/' . 'default.jpg';
            if($request->hasFile('td_image')) {
                $file = $request->file('td_image');
                $extension = $file->getClientOriginalExtension();
                $filename = preg_replace('/\s+/', '', $request->td_title) . '-' . $donation->id .  '.' . $extension;
                $file->move(Donation::$FILE_DESTINATION, $filename);
                $donation->td_image = Donation::$FILE_DESTINATION . '/' . $filename;
            }
            // dd($donation);
            $donation->save();
            return response()->json([
                'alert' => 'success',
                'message' => 'Program Donasi '. $request->td_title . ' telah didaftarkan',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Donation $donation)
    {
        $category= Category::get();
        return view('donation.modal', compact('category','donation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\JsonResponse
     */
    // Fungsi Mengubah Program Donasi
    public function update(Request $request, Donation $donation)
    {
        try {
            $donation->id_user = Auth::user()->id;
            $donation->id_category = $request->id_category;
            $donation->td_title = $request->td_title;
            $donation->td_receiver = $request->td_receiver;
            $donation->td_location = $request->td_location;
            $donation->td_target = Str::of($request->td_target)->replace(',','')?: 0;
            $td_duration_end = strtok(substr($request->td_duration, strpos($request->td_duration, "to"), 13), " to");
            $td_duration_started = strtok($request->td_duration, "to ");
            $donation->td_duration_started = $td_duration_started;
            $donation->td_duration_end = $td_duration_end;
            $donation->td_description = $request->td_description;
            $donation->td_image = Donation::$FILE_DESTINATION . '/' . 'default.jpg';
            $donation->td_status = 'waiting';
            if($request->hasFile('td_image')) {
                $file = $request->file('td_image');
                $extension = $file->getClientOriginalExtension();
                $filename = preg_replace('/\s+/', '', $request->td_title) . '-' . $donation->id .  '.' . $extension;
                $file->move(Donation::$FILE_DESTINATION, $filename);
                $donation->td_image = Donation::$FILE_DESTINATION . '/' . $filename;
            }
            $donation->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Program donasi '. $request->td_title . ' telah di perbaiki',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Donation $donation)
    {
        try {
            Storage::delete($donation->file);
            $donation->delete();
            return response()->json([
                'alert' => 'success',
                'message' => 'File '. $donation->judul . ' Dihapus',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }

    public function extracted(Request $request, $donation): void
    {
        $file = $request->file('file');
        $fileExtension = $file->getClientOriginalExtension();
        $judulWithoutSpace = preg_replace('/\s+/', '', $request->judul);
        $fileName = $judulWithoutSpace . '-' . date("d-m-Y_H-i-s") . '.' . $fileExtension;
        $file->move(Donation::$FILE_DESTINATION, $fileName);

        $donation->file = Donation::$FILE_DESTINATION . '/' . $fileName;
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\JsonResponse
     */
    // public function destroy(Donation $donation)
    // {
    //     try {
    //         Storage::delete($donation->file);
    //         $donation->delete();
    //         return response()->json([
    //             'alert' => 'success',
    //             'message' => 'File '. $donation->judul . ' Dihapus',
    //         ]);
    //     }catch (Exception $e) {
    //         return response()->json([
    //             'alert' => 'error',
    //             'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
    //         ]);
    //     }
    // }

    // public function extracted(Request $request, $donation): void
    // {
    //     $file = $request->file('file');
    //     $fileExtension = $file->getClientOriginalExtension();
    //     $judulWithoutSpace = preg_replace('/\s+/', '', $request->judul);
    //     $fileName = $judulWithoutSpace . '-' . date("d-m-Y_H-i-s") . '.' . $fileExtension;
    //     $file->move(Donation::$FILE_DESTINATION, $fileName);

    //     $donation->file = Donation::$FILE_DESTINATION . '/' . $fileName;
    // }
}
