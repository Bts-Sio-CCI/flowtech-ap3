<?php

namespace App\Controllers;

use App\Models\EventModels;

class EventController extends BaseController
{
    public function index()
    {
        $model = new EventModels();
        $data['events'] = $model->getEventsWithAttendees();

        return view('events_view', $data);
    }
}