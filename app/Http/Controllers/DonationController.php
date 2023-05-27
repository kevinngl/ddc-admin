<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\DonationService;
use App\Services\CategoryService;
use App\Services\CampaignService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DonationController extends Controller
{
    public function __construct(){
        $this->campaignService = new CampaignService();
        $this->categoryService = new CategoryService();
        $this->donationService = new DonationService();
    }
    
    
    public function index(Request $request)
    {
        $response = $this->donationService->list($request);
        $result = null;

        if ($response["success"]) {
            $result = $response["data"]["result"];
        }
        // dd($result);
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
        return view('pages.donation.main', compact('data'));
    }
    public function create()
    {
        $response = $this->campaignService->list([
            'page' => 1,
            'limit' => 10,
        ]);
        $campaign = null;
        $campaign = $response["data"]["result"];
        return view('pages.donation.modal', compact('campaign'));
    }
    
    public function store(Request $request)
    {
        $createdBy = session('user')->user->id;
        $campaignId = $request['campaignId'];
        $comment = $request['comment'];
        $amount = Str::of($request['amount'])->replace(',','')?: 0;
        $donatorId = $createdBy;
        $payload = [
            'campaignId' => $campaignId,
            'donatorId' => $donatorId,
            'comment' => $comment,
            'amount' => $amount,
        ];

        $response = $this->donationService->create($payload);

        // dd($response);
        if ($response['success']) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi berhasil dicatat',
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }

    }
}
