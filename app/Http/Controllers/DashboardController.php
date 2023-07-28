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

use App\Models\User;

class DashboardController extends Controller
{
    public function __construct(){
        $this->campaignService = new CampaignService();
        $this->categoryService = new CategoryService();
        $this->donationService = new DonationService();
        $this->authService = new AuthService();
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
        $totalCampaigns = $collection->count();

        $activeCampaigns = 0;
        $revisionCampaigns = 0;
        $notActiveCampaigns = 0;

        foreach ($collection as $campaign) {
            $status = $campaign['status']; 

            if ($status === 'live') {
                $activeCampaigns++;
            } elseif ($status === 'request-revision') {
                $revisionCampaigns++;
            } elseif ($status === 'waiting-for-approval') {
                $notActiveCampaigns++;
            }
        }
    return view('pages.dashboard.main', compact('data', 'totalCampaigns', 'activeCampaigns', 'revisionCampaigns', 'notActiveCampaigns'));
    }
    public function filter(Request $request)
{
    $month = $request->input('month');
    $status = $request->input('status');

    $response = $this->campaignService->list($request);
    $result = null;
    if ($response["success"]) {
        $result = $response["data"]["result"];
    }

    $filteredData = collect($result);

    if ($month) {
        // Implement logic to filter by month.
        // Assuming 'endDate' is the field storing the campaign end date.
        $filteredData = $filteredData->filter(function ($item) use ($month) {
            $endDate = Carbon::parse($item['endDate']);
            return $endDate->month === (int) $month;
        });
    }

    if ($status && $status !== 'all') {
        // Implement logic to filter by status.
        // Assuming 'status' is the field storing the campaign status.
        $filteredData = $filteredData->where('status', $status);
    }

    // Convert the filtered data back to an array
    $filteredResult = $filteredData->values()->toArray();

    // Paginate the filtered result
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 10;
    $data = new LengthAwarePaginator(
        array_slice($filteredResult, ($currentPage - 1) * $perPage, $perPage),
        count($filteredResult),
        $perPage,
        $currentPage,
        ['path' => LengthAwarePaginator::resolveCurrentPath()]
    );

    return view('campaign.index', compact('data'));
}

}