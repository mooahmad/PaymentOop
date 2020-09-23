<?php


namespace App;


class History
{

    protected $identifier;
    protected $method;

    public function __construct($identifier, $method = null)
    {
        $this->identifier = $identifier;
        $this->method = $method;
    }

    public function getUserHistory()
    {

        $data = [];
        $jsonData = file_get_contents('history.json');
        $fields = json_decode($jsonData,true);
        foreach ($fields as $field) {
            if ($field['user'] == $this->identifier) {
                $data[] = $field;
            } elseif ($field['method'] == $this->method) {
                $data[] = $field;
            }
        }
        return $data;

    }
}