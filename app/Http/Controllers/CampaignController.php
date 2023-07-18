<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\CampaignService;
use App\Services\CategoryService;
use App\Services\DonationService;
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

use App\Libraries\GoogleCloudStorage as GCS;
use DateTime;

class CampaignController extends Controller
{
    public function __construct(){
        $this->campaignService = new CampaignService();
        $this->categoryService = new CategoryService();
        $this->donationService = new DonationService();
        $this->authService = new AuthService();
    }
    
    public function detail($id, Request $request)
    {
        $responseCampaign = $this->campaignService->detail($id);

        $responseDonation = $this->donationService->list([
            'campaignId' => $id,
            'page' => 1,
            'limit' => 10,
        ]);
        
        $responseCategory = $this->categoryService->list([
            'page' => 1,
            'limit' => 10,
        ]);

        $data = $responseCampaign["data"];
        $donation = $responseDonation["data"]["result"];
        $category = $responseCategory["data"]["result"];
        return view('pages.campaign.detail', compact('data', 'category', 'donation'));
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
        // dd($response);

        $category = null;
        $category = $response["data"]["result"];
        return view('pages.campaign.modal', compact('category'));
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'title' => 'required',
            'campaignCategoryId' => 'required',
            'description' => 'required',
            'donationTarget' => 'required',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'alert' => 'error',
                'message' => 'Mohon mengisi semua data',
            ]);
        }
        $upload_image = null; // Initialize the variable outside the if condition

        if ($request->hasFile('image')) {
            $file = $request->file('image');
        
            // Generate a unique name for the file
            $extension =  $file->getClientOriginalExtension();
            $file_name = preg_replace('/\s+/', '', $request['title']) . '-' . rand(1, 1000) . '.' . $extension;
        
            $cloud_storage = new GCS();
        
            $upload_image = $cloud_storage->uploadFile($file, $file_name);
        }
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
            'filePath' => $upload_image,
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

        dd($response);
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

    public function update($id, Request $request)
    {

        $upload_image = null; // Initialize the variable outside the if condition

        $file = $request->file('image');
        if ($request->hasFile('image')) {
        
            // Generate a unique name for the file
            $extension =  $file->getClientOriginalExtension();
            $file_name = preg_replace('/\s+/', '', $request['title']) . '-' . rand(1, 1000) . '.' . $extension;
        
            $cloud_storage = new GCS();
        
            $upload_image = $cloud_storage->uploadFile($file, $file_name);
        }

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
        ];

        if ($start !== null) {
            $payload['startDate'] = $start_date;
        }

        if ($end !== null) {
            $payload['endDate'] = $end_date;
        }

        if ($duration !== null) {
            $payload['duration'] = $durationResult;
        }

        if ($upload_image) {
            $payload['filePath'] = $upload_image;
        }


        $response = $this->campaignService->update($id, $payload);
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

    public function edit($id)
    {
        $responseCategory = $this->categoryService->list([
            'page' => 1,
            'limit' => 10,
        ]);
        
        $category = null;
        if ($responseCategory["success"]) {
            $category = $responseCategory["data"]["result"];
        }

        $campaign = null;
        $response = $this->campaignService->detail($id);
        if ($response["success"]) {
            $campaign = $response["data"];
        }

        return view('pages.campaign.modal', compact('campaign', 'category'));
    }

    public function approve($id)
    {
            $response = $this->campaignService->approve($id);

            if ($response['success']) {
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Program kampanye '. ' telah disetujui',
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
                ]);
            }
    }

    public function revise($id,Request $request)
    {
        $notes = $request['notes'];
        $payload = [
            'notes' => $notes,
        ];
        $response = $this->campaignService->revise($id,$payload);
        // dd($response);
        if ($response['success']) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Program kampanye '.' telah diberi revisi',
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
    }

    public function reject($id)
    {
        $response = $this->campaignService->reject($id);
        if ($response['success']) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Program kampanye '.' telah ditolak',
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
    }

    public function setToLive($id)
    {
            $response = $this->campaignService->setToLive($id);
            if ($response['success']) {
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Program kampanye '. ' telah aktif',
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
                ]);
            }
    }
    
}