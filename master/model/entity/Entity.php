<?php
namespace master\model\entity;

class Entity
{
    public function __construct($data)
    {
        $this->hydrate($data);
    }
    
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
