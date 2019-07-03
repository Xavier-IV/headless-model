
# 🚀 Headless Model

An artificial model package for your third-party API.

[![Build Status](https://travis-ci.com/Xavier-IV/headless-model.svg?branch=master)](https://travis-ci.com/Xavier-IV/headless-model)

## 💡 Usage

    $ composer require xavier-iv/headless-model
    

Consider the following endpoint:

`https://api.website.com/v1/user`

Simply create a model file as follow:

    use XavierIV\HeadlessModel\Plan\Model;
    
    class HeadlessUser extends Model
    {
        protected $intention = 'user';
    }
    

### ✨ Creating data - POST
Use it in your Laravel project as follow:

    $h_user = new HeadlessUser();
    $h_user->create(['name' => 'Sam']);

### ✨ Retrieving data - GET

We would normally find user from the following endpoint:

`https://api.website.com/v1/user/1`

Then to retrieve your user with ID = 1.

    $h_user = (new HeadlessUser())->find(1);


## 💕 Supported functions

    $headless->all(); 

    $headless->find($id);

    $headless->destroy($id);

    $headless->create(['name' => 'Sam']);
    
    
## 💕 Supported builder

    $headless->sort('updated_at')
             ->all();
             
    $headless->order($order)->all();
    
    $headless->limit(10)->all(); 
    
    
## 🔥 Advanced functions

Although quite rare, but we found that we need to store all of the data and usually we will
loop through it and retrieve the data passed by 'next' page.

A function has allowed you to achieve this.

    $headless->forceAll();
    
This will force to retrieve all data. Warning: This can be time and resource
consuming.

## 🌱 Submitting Issue

Kindly submit and issue or bugfix found the the issue section.

https://github.com/Xavier-IV/headless-model/issues 

## 🌱 Enhancement

Currently this project has been adjusted to cater for our internal project, but
we intend to increase its reusability for you! More update will coming,
especially in the RestSocket and RestBuilder class.
