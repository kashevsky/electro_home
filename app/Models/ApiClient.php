<?php

namespace App\Models;

class ApiClient
{
    protected $login;

    protected $password;

    protected $url;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
        $this->url = 'http://148.251.153.19:2004/apix1cityd/';
    }

    public function getBrands($options = null)
    {
        return $this->sendRequest('Brand');
    }

    public function getProductCategory($categoryId)
    {
        $endpoint = "ProductCategory({$categoryId})";
        return $this->sendRequest($endpoint);
    }

    public function getProductTypes($options = null)
    {
        return $this->sendRequest('ProductType');
    }

    public function getProducts($options = null)
    {
        $endpoint = "Product?{$options}";
        return $this->sendRequest($endpoint);
    }

    /**
     * Метод по получению названия и значения характеристики.
     * 
     * @param int $valId
     * 
     * @return array|null 
     */
    public function getParamItemValue($valId)
    {
        $endpoint = "ParamItemValues({$valId})";
        return $this->sendRequest($endpoint);
    }

    /**
     * Метод по получению характеристик товара.
     * 
     * @param int $productId
     * 
     * @return array|null 
     */
    public function getProductValues($productId)
    {
        $filter = rawurlencode("quad_product_id eq {$productId}");
        $endpoint = "ProductValues?\$filter=({$filter})";
        return $this->sendRequest($endpoint);
    }

    public function sendRequest($endpoint = null)
    {
        $url = $this->url . $endpoint;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "{$this->login}:{$this->password}");
        $result = json_decode(curl_exec($ch), 1);

        return !empty($result['value']) ? $result['value'] : $result;
    }
}
