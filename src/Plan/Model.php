<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 3/20/2019
 * Time: 4:36 PM
 */

namespace XavierIV\HeadlessModel\Plan;

use XavierIV\HeadlessModel\Support\Connector\RestSocket;
use XavierIV\HeadlessModel\Support\Interfaces\ConnectorInterface;
use XavierIV\HeadlessModel\Support\RestBuilder;

class Model implements ConnectorInterface
{
    use RestSocket, RestBuilder;

    public $body;
    protected $resource_name = '';
    protected $resource_collection_name = '';

    public $all_data = [];

    public function all(){
        $this->query = '?' . http_build_query($this->body);
        $this->endpoint .= $this->intention . $this->query;
        $result = $this->resource_collection_name::make(collect($this->get()))->resolve();
        return (object)$result;
    }

    public function forceAll()
    {
        $bulk_result = $this->retrieveNext();
        $data = (object)[
            'data' => $bulk_result
        ];
        $collections = $this->resource_collection_name::make(collect($data))->resolve();
        return (object)$collections;
    }

    function retrieveNext($next = ''){
        if(!empty($next)){
            $this->endpoint = $next;
        }
        $collection = $this->limit(50)->all();
        $next_url = isset($collection->paging->next) ? $collection->paging->next : null;

        foreach($collection->data as $collection) {
            array_push($this->all_data, $collection);
        }

        if(isset($next_url)){
            $this->retrieveNext($next);
        }

        return $this->all_data;
    }
    public function find($id) {
        $this->query = "/$id";
        $this->endpoint .= $this->intention . $this->query;
        $result = $this->resource_name::make(collect($this->get()->data))->resolve();
        return (object)$result;
    }


    public function destroy($id)
    {
        $this->query = "/$id";
        $this->endpoint .= $this->intention . $this->query;
        $result = $this->delete();
        return $result;
    }

    public function create()
    {
        $this->endpoint .= $this->intention;
        $result = $this->post();
        return $result;
    }

    public function update()
    {
        $this->endpoint .= $this->intention;
        $result = $this->put();
        return $result;
    }

}