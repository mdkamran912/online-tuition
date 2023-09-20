<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_CreateConferenceRequest;
use App\Models\zoom_classes;
use App\Models\batchstudentmapping;
use App\Models\studentregistration;
use App\Models\topics;
use App\Models\batches;
use App\Http\Controllers\Controller;
use DB;
use DateTime;

class GoogleCalendarController extends Controller
{

    public function classlist(){
        $liveclasses = zoom_classes::select('*','zoom_classes.id as liveclass_id','batches.name as batch','subjects.name as subjects','topics.name as topics')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->join('subjects','subjects.id','topics.subject_id')
        ->where('zoom_classes.is_completed',0)
        ->where('zoom_classes.is_active',1)
        ->get();
        $classes = (new CommonController)->classes();
        return view('tutor.liveclasses', compact('liveclasses','classes'));

    }
    public function scheduleclass_bkp(Request $request)
    {
        // dd('test');
        // $request->validate([
        //     'class' => 'required',
        //     'subject' => 'required',
        //     'batchid' => 'required',
        //     'topic' => 'required',
        //     'classstarttime' => 'required',
        //     'classduration' => 'required',
        //     'classpassword' => 'required'
        // ]);
        // Initialize the Google API client with OAuth 2.0 credentials
        $client = new Google_Client();
        $client->setClientId('950874110996-3mg9q500d6v5nf6gghgkv7ve6698uc4s.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri('http://127.0.0.1:8000/oauth2callback');
        $client->addScope('https://www.googleapis.com/auth/calendar');
        $client->setAccessType('offline'); // Allows access when the user is not present
        // Check if the user is already authenticated
        if (!$request->session()->has('access_token')) {
            // Redirect the user to Google's OAuth 2.0 consent screen
            $authUrl = $client->createAuthUrl();
            return redirect()->away($authUrl);
        }

        // Set the access token from the session
        $client->setAccessToken($request->session()->get('access_token'));

        // Create a Google Calendar service
        $service = new Google_Service_Calendar($client);

        // Create a Google Calendar event with a conference attached
        $event = new Google_Service_Calendar_Event([
            'summary' => 'hjhdj',
            'description' => 'hgfdshgd',
            'start' => [
                'dateTime' => '2023-09-19T10:00:00',
                'timeZone' => 'Asia/Kolkata',
            ],
            'end' => [
                'dateTime' => '2023-09-19T11:00:00',
                'timeZone' => 'Asia/Kolkata',
            ],
            'conferenceData' => [
                'createRequest' => [
                    'requestId' => uniqid(),
                ],
            ],
            'attendees' => [
                ['email' => 'participant@example.com'], // Add guest email addresses here
                // Add more guests as needed
            ],
        ]);

        // Insert the event into the Google Calendar
        $calendarId = 'primary'; // Use 'primary' for the user's primary calendar
        $event = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);


        // Get the Google Meet link from the event
        $meetingLink = $event->getHangoutLink();
        dd($meetingLink);
        // Redirect to a success page or return a response as needed
        return redirect()->route('success')->with('meetingLink', $meetingLink);

    }
    public function scheduleclass(Request $request){

        // dd($request);
        // try {
            // Initialize the Google API client with OAuth 2.0 credentials
            $client = new Google_Client();
            $client->setClientId('950874110996-3mg9q500d6v5nf6gghgkv7ve6698uc4s.apps.googleusercontent.com');
            $client->setClientSecret('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');
            $client->setRedirectUri('http://127.0.0.1:8000/oauth2callback');
            $client->addScope('https://www.googleapis.com/auth/calendar');
            $client->setAccessType('offline'); // Allows access when the user is not present

            // Check if the user is already authenticated
            if (!$request->session()->has('access_token')) {
                // Redirect the user to Google's OAuth 2.0 consent screen
                $authUrl = $client->createAuthUrl();
                return redirect()->away($authUrl);
            }
            $client->setAccessToken($request->session()->get('access_token'));
            $service = new Google_Service_Calendar($client);

            $class = $request->input('class');
            $subject = $request->input('subject');
            $batchid = $request->input('batchid');
            $topic = $request->input('topic');
            $classstarttime = $request->input('classstarttime');
            $classduration = $request->input('classduration');
            $classpassword = $request->input('classpassword');


            $batch_students = batchstudentmapping::where('batch_id',$request->input('batchid'))->where('tutor_id',session('userid')->id)->first();
            if($batch_students){
                $students_id = (json_decode($batch_students->student_data));
                $emails = DB::table('studentregistrations')
                ->whereIn('id', $students_id)
                ->pluck('email')->toArray();
                $attendees = [];
                foreach ($emails as $email) {
                    $attendees[] = ['email' => $email];
                }
            }else{
                $attendees[] = ['email' => 'participant@example.com'] ;
            }
            // dd($attendees);

            // dd(date('c', strtotime($classstarttime)),date('c', strtotime($classstarttime . ' + ' . $classduration . ' minutes')));

            $topicdata = topics::select('*')->where('id',$request->topic)->first();
            $batchdata = batches::select('*')->where('id',$request->batchid)->first();

            $event = new Google_Service_Calendar_Event([
                'summary' =>  '('.$batchdata->name.') '.$topicdata->name,
                'description' =>  '('.$batchdata->name.') '.$topicdata->name,
                'start' => [
                    'dateTime' => date('c', strtotime($classstarttime)),
                    'timeZone' => 'Asia/Kolkata',
                ],
                'end' => [
                    'dateTime' => date('c', strtotime($classstarttime . ' + ' . $classduration . ' minutes')),
                    'timeZone' => 'Asia/Kolkata',
                ],
                'conferenceData' => [
                    'createRequest' => [
                        'requestId' => uniqid(),
                    ],
                    'password' => $classpassword
                ],
                // 'attendees' => [
                //     ['email' => 'participant@example.com'], // Add guest email addresses here

                // ],
                'attendees' => $attendees,
            ]);
            $calendarId = 'primary';
            $response = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);
            // dd($response);

            if ($response->status == 'confirmed') {
                // $response = json_decode($response);
                $data = new zoom_classes(); // zoom_classes -> Currently we are using gmeet to host meeting
                
                $data->tutor_id = session('userid')->id;
                $data->batch_id = $request->batchid;
                $data->uuid = $response->id;
                $data->meeting_id = $response->hangoutLink;
                $data->host_id = 'info@sofabespoke.co.uk';
                $data->host_email = 'info@sofabespoke.co.uk';
                $data->topic_id = $request->topic;
                $data->topic_name = $response->description;
                $data->type = 2;
                $data->status = $response->status;
                $data->start_time = date('c', strtotime($classstarttime));
                $data->duration = $classduration;
                $data->timezone = 'Asia/Kolkata';
                $data->agenda = $response->description;
                $data->start_url = $response->hangoutLink;
                $data->join_url = $response->hangoutLink;
                $data->password = $classpassword;
                $data->h323_password = $classpassword;
                $data->pstn_password = $classpassword;
                $data->encrypted_password = $classpassword;

                  $res = $data->save();
                  if ($res) {
                      return back()->with('success', 'Class scheduled successfully!');
                  } else {
                      return back()->with('fail', 'Something went wrong. Please try again later');
                  }
            } else {
                return response()->json(['error' => 'Failed to create Zoom meeting'], 500);
            }


            // dd($event);

            // $meetingLink = $event->getHangoutLink();
            // return redirect()->route('success')->with('meetingLink', $meetingLink);
        // } catch (\Exception $e) {
        //     // Handle exceptions here, you can log them or return an error response
        //     return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        // }

    }

    public function oauthCallback(Request $request)
    {
        $code = $request->get('code');

        if ($code) {
            $client = new Google_Client();
            $client->setClientId('950874110996-3mg9q500d6v5nf6gghgkv7ve6698uc4s.apps.googleusercontent.com');
            $client->setClientSecret('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');
            $client->setRedirectUri('http://127.0.0.1:8000/oauth2callback');
            $client->authenticate($code);

            $accessToken = $client->getAccessToken();

            // Store the access token in the session
            $request->session()->put('access_token', $accessToken);

            // Redirect to the create event page
            return redirect()->route('tutor.liveclass.scheduleclass');
        }

        return redirect()->route('error')->with('message', 'Authentication failed.');
    }
}
