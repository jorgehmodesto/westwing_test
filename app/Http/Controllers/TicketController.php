<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
        $requestParams = [
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'order_number' => $request->input('order_number'),
            'ticket_title' => $request->input('ticket_title'),
            'obs' => $request->input('obs'),
        ];

        $ticket = new Ticket();
        $response = $ticket->new($requestParams);

        return response()
            ->json($response);
    }

    /**
     * Action to report tickets
     *
     * @param Request $request
     */
    public function report(Request $request)
    {
        $requestParams = [
            'email' => $request->input('email'),
            'orderNumber' => $request->input('order_number'),
        ];

        $records = DB::table('tickets')
            ->select('clients.name', 'clients.email', 'orders.number', 'tickets.title', 'tickets.obs', 'tickets.created_at')
            ->join('orders', 'orders.id', '=', 'tickets.order_id')
            ->join('clients', 'clients.id', '=', 'orders.client_id')
            ->get();

        return view('ticket_report', [
            'records' => $records,
            'requestParams' => $requestParams
        ]);
    }
}
