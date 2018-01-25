<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * Action to show new ticket form
     */
    public function new()
    {

    }

    /**
     * Action to record new ticket
     *
     * @param Request $request
     */
    public function record(Request $request)
    {

    }

    /**
     * Action to report tickets
     *
     * @param Request $request
     */
    public function report(Request $request)
    {
        $records = [];
        $requestParams = [
            'email' => $request->input('email'),
            'orderNumber' => $request->input('order_number'),
        ];

        return view('ticket_report', [
            'records' => $records,
            'requestParams' => $requestParams
        ]);
    }
}
