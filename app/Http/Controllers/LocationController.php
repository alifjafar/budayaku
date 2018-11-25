<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class LocationController extends Controller
{
    public function getProvince()
    {
        $client = new Client();
        $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi', [
            'headers' => [
                'contentType' => 'json',
            ],
        ]);
        $data = $response->getBody()->getContents();

        $province = json_decode($data, true);

        return $province;
    }

    public function getCity($id)
    {
        $client = new Client();
        $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi/' . $id . '/kabupaten', [
            'headers' => [
                'contentType' => 'json',
            ],
        ]);
        $data = $response->getBody()->getContents();

        $cities = json_decode($data, true);

        return $cities;
    }

    public function getDistrict($id)
    {
        $client = new Client();
        $response = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/' . $id . '/kecamatan', [
            'headers' => [
                'contentType' => 'json',
            ],
        ]);
        $data = $response->getBody()->getContents();

        $districts = json_decode($data, true);

        return $districts;
    }
}
