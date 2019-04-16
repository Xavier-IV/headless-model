<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 3/20/2019
 * Time: 4:34 PM
 */

namespace XavierIV\HeadlessModel\Support\Connector;

use Curl\Curl;

/** A connector module for Rest
 *
 * Class RestSocket
 * @package App\Libraries\Architect\Support\Connector
 */
trait RestSocket
{
    protected $paramStr;

    protected $endpoint;
    protected $intention;

    protected $request_url;
    protected $curl;
    protected $query;

    protected $application_id;
    protected $content_type;

    public function __construct()
    {
        try {
            $this->curl = new Curl();
        } catch (\ErrorException $e) {
        }

        $this->application_id = env('BRAND_ID');

        $this->initializer();
        $this->authenticate();

    }

    private function initializer(){
        $this->body = new \stdClass();

        $this->body = [
            'brand_id' => $this->application_id,
            'status' => 1,
            'content_type' => $this->content_type
        ];

        $this->endpoint = env("AHC_URL");
    }

    private function get()
    {
        $result = $this->curl->get($this->endpoint);
        return $result;
    }

    private function delete()
    {
        $result = $this->curl->delete($this->endpoint);
        return $result;

    }

    private function post()
    {
        $result = $this->curl->post($this->endpoint, json_encode($this->body));
        return $result;
    }

    private function put()
    {
        $result = $this->curl->put($this->endpoint, json_encode($this->body));
        return $result;
    }

    private function authenticate()
    {
        $this->curl->setOpt(CURLOPT_HEADER, false);
        $this->curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        $this->curl->setHeader('Content-Type', 'application/json');
        $this->curl->setHeader('Authorization', 'Bearer ' . env('AHC_ACCESS_TOKEN'));
    }
}