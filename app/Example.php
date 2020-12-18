<?php

namespace App;

class Example {


    protected $api;

    /**
     * Example constructor.
     * @param $api
     */
    public function __construct($api)
    {
        $this->api = $api;
    }

    public function handle(): array
    {

        return ["Api Key Given: " => $this->api,
                "Service Used" => "Laravel Auto Binding"];
    }
}

