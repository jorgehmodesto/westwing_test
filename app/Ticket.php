<?php

namespace App;

use App\Helpers\Validators\TicketValidator;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

/**
 * Class Ticket
 * @package App
 */
class Ticket extends Model
{
    /**
     * @var string
     */
    protected $table = 'tickets';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'obs',
        'order_id'
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @param array $params
     */
    public function new(array $params)
    {
        try {
            DB::beginTransaction();

            $ticketValidator = new TicketValidator($params);

            $ticketValidator->requiredFields();

            $customer = Client::where('email', $params['customer_email'])->first();

            if(empty($customer)) {
                $customer = new Client();

                $customer->name = $params['customer_name'];
                $customer->email = $params['customer_email'];

                $customer->save();
            }

            $order = Order::where('number', $params['order_number'])->first();

            if(empty($order)) {
                $order = new Order();

                $order->number = $params['order_number'];
                $order->client_id = $customer->id;

                $order->save();
            }

            if($order->client_id != $customer->id) {
                throw new ValidationException('Este pedido está cadastrado para outro cliente.');
            }

            $ticket = new Ticket();

            $ticket->title = $params['ticket_title'];
            $ticket->obs = $params['obs'];
            $ticket->order_id = $order->id;

            $ticket->save();

            DB::commit();

            return [
                'success' => true
            ];
        } catch(ValidationException $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
