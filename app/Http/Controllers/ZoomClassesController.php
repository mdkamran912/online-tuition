<?php

namespace App\Http\Controllers;

use App\Models\zoom_classes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Traits\MeetingZoomTrait;
use Illuminate\Support\Facades\Http;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Controller;
use App\Models\access_token;
use GuzzleHttp\Client;

class ZoomClassesController extends Controller
{
    use MeetingZoomTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tokenurl = parse_url(url()->full(), PHP_URL_QUERY);
        $access_code = substr($tokenurl, 5);
        $accessToken = "";
        $accountID = 'metacitinasar@gmail.com';
        $clientId = 'oFed_e_zQi6wE8183XRI0A';
        $clientSecret = '1hYXjFPAXUJ8uYOQDUGTJJNjzVGdaxTu';

        $url = 'https://zoom.us/oauth/token';

        $client = new Client();

        $headers = [
            'Host' => 'zoom.us',
            'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
        ];

        $formData = [
            'grant_type' => 'authorization_code',
            'account_id' => $accountID,
            'code' => $access_code,
            'redirect_uri' => 'http://127.0.0.1:8000/tutor/liveclass',
        ];

        try {
            $response = $client->post($url, [
                'headers' => $headers,
                'form_params' => $formData,
            ]);

            $data = json_decode($response->getBody(), true);
            // Now you can access the Zoom access token from the response data.
            $accessToken = $data['access_token'];

            // You can return or process the access token as needed.
            // echo $accessToken;
            // return $accessToken;
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            // Handle any exceptions or errors here.
            // For example, you can log the error or throw a custom exception.
            // Note: Don't forget to handle the error cases appropriately in a production environment.
            // return null;
            // return null;
        }

        if ($accessToken) {

            $setdata = access_token::select('*')->where('user_id', session('userid')->id)->first();
            if ($setdata) {
                $setdata = access_token::find($setdata->id);
                $setdata->authorization_code = $access_code;
                $setdata->access_token = $accessToken;
                $setdata->save();
                // $accessToken = $setdata->access_token;
            } else {
                $setdata = new access_token();
                $setdata->user_id = session('userid')->id;
                $setdata->authorization_code = $access_code;
                $setdata->access_token = $accessToken;
                // $setdata->refresh_token = $refreshToken;
                $setdata->save();
            }
        }
        //////////////////   // Getting Admin Details
        // $url = 'https://api.zoom.us/v2/users/metacitinasar@gmail.com';

        // $client = new Client();

        // $headers = [
        //     'Authorization' => 'Bearer '.$accessToken,
        // ];
        // $response = $client->get($url, [
        //     'headers' => $headers,
        // ]);

        // $data = json_decode($response->getBody(), true);
        $tempdata = access_token::select('*')->where('user_id', session('userid')->id)->first();
        // Getting Meeting List Details
        $url = 'https://api.zoom.us/v2/users/metacitinasar@gmail.com/meetings?type=scheduled&page_size=30&page_number=1';
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $tempdata->access_token,
        ];
        $response = $client->get($url, [
            'headers' => $headers,
        ]);

        $data = json_decode($response->getBody(), true);
        $meetings = $data['meetings'];

        // Access the 'meetings' array

        // dd($meetings);
        // Loop through the meetings

        $liveclasses = zoom_classes::select('*')->get();
        $classes = (new CommonController)->classes();
        return view('tutor.liveclasses', compact('liveclasses','classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // return redirect('https://zoom.us/oauth/authorize?response_type=code&client_id=oFed_e_zQi6wE8183XRI0A&redirect_uri=http://127.0.0.1:8000/tutor/liveclass');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_old(Request $request)
    {
        $testurl = parse_url($request->url, PHP_URL_QUERY);
        $access_code = substr($testurl, 5);
    }



    function store(Request $request)
    {
        $testurl = parse_url($request->url, PHP_URL_QUERY);
        $access_code = substr($testurl, 5);

        $accountID = 'metacitinasar@gmail.com';
        $clientId = 'oFed_e_zQi6wE8183XRI0A';
        $clientSecret = '1hYXjFPAXUJ8uYOQDUGTJJNjzVGdaxTu';

        $url = 'https://zoom.us/oauth/token';

        $client = new Client();

        $headers = [
            'Host' => 'zoom.us',
            'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
        ];

        $formData = [
            'grant_type' => 'authorization_code',
            'account_id' => $accountID,
            'code' => $access_code,
            'redirect_uri' => 'http://127.0.0.1:8000/tutor/liveclass',
        ];

        try {
            $response = $client->post($url, [
                'headers' => $headers,
                'form_params' => $formData,
            ]);

            $data = json_decode($response->getBody(), true);
            // Now you can access the Zoom access token from the response data.
            $accessToken = $data['access_token'];

            // You can return or process the access token as needed.
            echo $accessToken;
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            // Handle any exceptions or errors here.
            // For example, you can log the error or throw a custom exception.
            // Note: Don't forget to handle the error cases appropriately in a production environment.
            // return null;
            echo 'Fail';
        }
    }

    public function getzoomuser()
    {
        $token = 'Bearer eyJzdiI6IjAwMDAwMSIsImFsZyI6IkhTNTEyIiwidiI6IjIuMCIsImtpZCI6IjU0MDgxMmUxLTNkMjItNGNkMC05NTFhLTMwMTlhMjBkNTI1MSJ9.eyJ2ZXIiOjksImF1aWQiOiI1YjEyZjc2YWM3MTA1MmVmZTgzMjExN2ZlMTQ5Zjk1ZiIsImNvZGUiOiJ0ZUR0OXpGZk0zNnlhSl9ETVpMUlotZUpQMDlNQzRObXciLCJpc3MiOiJ6bTpjaWQ6b0ZlZF9lX3pRaTZ3RTgxODNYUkkwQSIsImdubyI6MCwidHlwZSI6MCwidGlkIjowLCJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJmZGR2cUNwZFNyZWEtRkM2d3V4YnBBIiwibmJmIjoxNjkwODAxMzAxLCJleHAiOjE2OTA4MDQ5MDEsImlhdCI6MTY5MDgwMTMwMSwiYWlkIjoiaTFaUGd1RnRUTC1Namo5VUtVRnZfUSJ9.5wBw1Vq1YJhp4nwuFRZEMFt2kL-14tvZheIPzc46CKVbbNjeBPfJo3xEmhPxjYHw8FyfPl_fMEEUuTAjkiTNPQ';

        $url = 'https://api.zoom.us/v2/users/metacitinasar@gmail.com';

        $client = new Client();

        $headers = [
            'Authorization' => $token,
        ];
        $response = $client->get($url, [
            'headers' => $headers,
        ]);

        $data = json_decode($response->getBody(), true);
        // echo $data;
        dd($data);
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function classlist()
    {
        return redirect('https://zoom.us/oauth/authorize?response_type=code&client_id=oFed_e_zQi6wE8183XRI0A&redirect_uri=http://127.0.0.1:8000/tutor/liveclass');
    }
}
