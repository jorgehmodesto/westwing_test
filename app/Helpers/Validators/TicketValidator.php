<?php
/**
 * Created by PhpStorm.
 * User: jorge
 * Date: 26/01/18
 * Time: 05:32
 */

namespace App\Helpers\Validators;


use Dotenv\Exception\ValidationException;

class TicketValidator
{
    /**
     * @var array
     */
    private $params = [];

    /**
     * @var array
     */
    private $requiredParams = [
        'customer_name' => 'Voc&ecirc; deve informar um nome para o cliente',
        'customer_email' => 'Voc&ecirc; deve informar o email do cliente',
        'order_number' => 'Voc&ecirc; deve informar um n&uacute;mero de pedido',
        'ticket_title' => 'Voc&ecirc; deve informar um t&iacute;tulo para o chamado',
        'obs' => 'Voc&ecirc; deve adicionar informa&ccedil;&otilde;es ao chamado'
    ];

    /**
     * TicketValidator constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->setParams($params);
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }

    /**
     * Method to validate required fields
     */
    public function requiredFields()
    {
        $params = $this->getParams();

        foreach($this->requiredParams as $requiredParam => $errorMessage) {
            if(empty($params[$requiredParam])) {
                throw new ValidationException($errorMessage);
            }
        }

        if(!$this->validEmail($params['customer_email'])) {
            throw new ValidationException('Voc&ecirc; deve informar um email v&aacute;lido');
        }
    }

    /**
     * @param $email
     */
    private function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}