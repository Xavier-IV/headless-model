<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Zafranudin
 * Date: 3/20/2019
 * Time: 6:08 PM
 */

namespace XavierIV\HeadlessModel\Support;


trait RestBuilder
{

    public function sort($sorting) {
        $this->body['sort'] = $sorting;
        return $this;
    }

    public function order($order){
        $this->body['order'] = $order;
        return $this;
    }

    public function limit($limit){
        $this->body['limit'] = $limit;
        return $this;
    }
}