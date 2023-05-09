<?php
namespace WPatricio\CieloApi\Requests;

use Cielo\API30\Ecommerce\Request\AbstractRequest;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Merchant;

// Shouldn't extend AbstractSaleRequest as it is not a Sale, but
// I guess this is the best way to keep things in order using
// Cielo's Oficial 3.0 PHP SDK
class TokenizeCardRequest extends AbstractRequest
{
    private $environment;

    public function __construct(Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);
        
        $this->environment = $environment;
    }

    public function execute($card)
    {
        $url = $this->environment->getApiUrl() . '1/card/';
        return $this->sendRequest('POST', $url, $card);
    }

    protected function unserialize($json)
    {
        return json_decode($json, true);
    }
}
