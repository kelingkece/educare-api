<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        foreach($campaigns as $campaign){
            $campaign->view_campaign = [
                'href'      => '/api/campaign' . $campaign->id,
                'method'    => 'GET'
            ];
        }

        $response = [
            'msg'       => 'List of all campaigns',
            'campaigns' => $campaigns
        ];
        return response()->json($response, 200);
    }

    public function show($id)
    {
        $campaigns = Campaign::find($id);
        $campaigns->detail_campaign = [
            'href'      => '/api/campaign/{id}',
            'method'    => 'GET'
        ];
        $response = [
            'msg'       => 'Detail of campaign',
            'campaign'  => $campaigns
        ];

        return response()->json($response, 200);
    }
}
