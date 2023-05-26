<?php

namespace App\Services;

use App\Libraries\HttpCurl;

use Illuminate\Support\Facades\Session;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CategoryService
{
    private $baseUrl;
    private $httpCurl;

    public function __construct()
    {
        $this->baseUrl = env('API_BE_DDC');
        $this->httpCurl = new HttpCurl($this->baseUrl);
    }

    public function create($data)
    {
        $url = $this->baseUrl . '/category/create';
        $response = $this->httpCurl->post(json_encode($data), $url);
        return json_decode($response, true);
    }
    

    public function list($params)
    {
        $queryParams = [
            'page' => $params['page'] ?? 1,
            'limit' => $params['limit'] ?? 10,
        ];

        $queryString = http_build_query($queryParams);
        $url = $this->baseUrl . '/category?' . $queryString;
        $response = $this->httpCurl->get($url, []);
        return json_decode($response, true);
    }

    public function detail($id)
    {
        $url = $this->baseUrl . '/category/' . $id;
        $response = $this->httpCurl->get($url, []);
        return json_decode($response, true);
    }

    public function update($id, $data)
    {
        $url = $this->baseUrl . '/category/update/' . $id;
        $response = $this->httpCurl->put($data, $url);
        return json_decode($response, true);
    }

    public function delete($id)
    {
        $url = $this->baseUrl . '/category/' . $id;
        $response = $this->httpCurl->delete($url);
        return json_decode($response, true);
    }
}