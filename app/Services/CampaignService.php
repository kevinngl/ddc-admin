<?php

namespace App\Services;

use App\Libraries\HttpCurl;

use Illuminate\Support\Facades\Session;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CampaignService
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
        $url = $this->baseUrl . '/campaign/create';
        $response = $this->httpCurl->post(json_encode($data), $url);
        return json_decode($response, true);
    }

    public function list($params)
    {
        $queryParams = [
            'page' => $params['page'] ?? 1,
            'limit' => $params['limit'] ?? 10,
        ];

        if (isset($params['title'])) {
            $queryParams['title'] = $params['title'];
        }

        if (isset($params['categoryId'])) {
            $queryParams['categoryId'] = $params['categoryId'];
        }

        $queryString = http_build_query($queryParams);
        $url = $this->baseUrl . '/campaign?' . $queryString; 
        $response = $this->httpCurl->get($url, []);
        return json_decode($response, true);
    }

    public function detail($id)
    {
        $url = $this->baseUrl . '/campaign/' . $id;
        $response = $this->httpCurl->get($url, []);
        return json_decode($response, true);
    }

    public function update($id, $data)
    {
        $url = $this->baseUrl . '/campaign/update/' . $id;
        $response = $this->httpCurl->put($data, $url);
        return json_decode($response, true);
    }

    public function approve($id)
    {
        $url = $this->baseUrl . '/campaign/approve/' . $id;
        $response = $this->httpCurl->put([], $url);
        return json_decode($response, true);
    }

    public function reject($id)
    {
        $url = $this->baseUrl . '/campaign/reject/' . $id;
        $response = $this->httpCurl->put([], $url);
        return json_decode($response, true);
    }

    public function revise($id, $data)
    {
        $url = $this->baseUrl . '/campaign/revise/' . $id;
        $response = $this->httpCurl->put($data, $url);
        return json_decode($response, true);
    }
    public function setToLive($id)
    {
        $url = $this->baseUrl . '/campaigns/set-to-live/' . $id;
        $response = $this->httpCurl->put([], $url);
        return json_decode($response, true);
    }
}
