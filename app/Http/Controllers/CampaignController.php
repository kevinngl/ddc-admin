<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\CampaignService;
use App\Services\CategoryService;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use DateTime;

class CampaignController extends Controller
{
    public function __construct(){
        $this->campaignService = new CampaignService();
        $this->categoryService = new CategoryService();
        $this->authService = new AuthService();
    }
    
    public function detail($id)
    {
        $responseCampaign = $this->campaignService->detail($id);
        $responseCategory = $this->categoryService->list([
            'page' => 1,
            'limit' => 10,
        ]);
        $data = $responseCampaign["data"];
        // dd($data);
        $category = $responseCategory["data"]["result"];
        return view('pages.campaign.detail', compact('data','category'));
    }
    public function index(Request $request)
    {
        $response = $this->campaignService->list($request);
        $result = null;

        if ($response["success"]) {
            $result = $response["data"]["result"];
        }

        $collection = Collection::make($result);
        $perPage = 10;
        $page = $request->query->get('page');
        $data = new LengthAwarePaginator(
            $collection,
            $response["data"]["total"],
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('pages.campaign.main', compact('data'));
    }
    public function create()
    {
        $response = $this->categoryService->list([
            'page' => 1,
            'limit' => 10,
        ]);
        $category = null;
        $category = $response["data"]["result"];
        return view('pages.campaign.modal', compact('category'));
    }
    
    public function store(Request $request)
    {
        
        $pic = session('user')->user->id;
        $category = $request['campaignCategoryId'];
        $title = $request['title'];
        $target = Str::of($request['donationTarget'])->replace(',','')?: 0;
        $description = $request['description'];
        $duration = $request['duration'];
        $start_date = strtok($duration, "to ");
        $end_date = strtok(substr($duration, strpos($duration, "to"), 13), " to");
        $start = new DateTime($start_date);
        $end = new DateTime($end_date);
        $durationResult = $start->diff($end)->format('%a');
        $payload = [
            'campaignCategoryId' => $category,
            'campaignPicId' => $pic,
            'title' => $title,
            'donationTarget' => $target,
            'description' => $description,
            'startDate' => $start_date,
            'endDate' => $end_date,
            'duration' => $durationResult,
        ];

        $response = $this->campaignService->create($payload);
        if ($response['success']) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Program Kampanye '. $request['title'] . ' telah didaftarkan',
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }

    }
    public function update($id, Request $request )
    {
        // dd($request);
        $pic = session('user')->user->id;
        $category = $request['campaignCategoryId'];
        $title = $request['title'];
        $target = Str::of($request['donationTarget'])->replace(',','')?: 0;
        $description = $request['description'];
        $duration = $request['duration'];
        $start_date = strtok($duration, "to ");
        $end_date = strtok(substr($duration, strpos($duration, "to"), 13), " to");
        $start = new DateTime($start_date);
        $end = new DateTime($end_date);
        $durationResult = $start->diff($end)->format('%a');
        $payload = [
            'campaignCategoryId' => $category,
            'campaignPicId' => $pic,
            'title' => $title,
            'donationTarget' => $target,
            'description' => $description,
            'startDate' => $start_date,
            'endDate' => $end_date,
            'duration' => $durationResult,
        ];
        
        $response = $this->campaignService->update($id,$payload);
        if ($response['success']) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Program Kampanye '. $request['title'] . ' telah diperbaharui',
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
    }
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
}
