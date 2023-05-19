<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Services\CategoryService;

class CampaignCategoryController extends Controller
{
    public function __construct(){
        $this->categoryService = new CategoryService();
    }
    public function index(Request $request)
    {
        $response = $this->categoryService->list($request);
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
        return view('pages.category.main', compact('data'));
    }
    public function create(Request $request)
    {
        $response = $this->categoryService->list($request);
        if ($response["success"]) {
            $category = $response["data"]["result"];
        }

        return view('pages.category.modal', compact('category'));
    }
    public function edit($id)
    {
        $response = $this->categoryService->list([
            'page' => 1,
            'limit' => 10,
        ]);
        
        $category = null;
        foreach ($response["data"]["result"] as $result) {
            if ($result["id"] == $id) {
                $category = $result;
                break;
            }
        }
    
        return view('pages.category.modal', compact('category'));
    }
    public function store(Request $request)
    {
        
        $name = $request['name'];
        $description = $request['description'];
        $payload = [
            'name' => $name,
            'description' => $description,
        ];

        $response = $this->categoryService->create($payload);
        if ($response['success']) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Kategori '. $request['name'] . ' telah didaftarkan',
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
    }
}
