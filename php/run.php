<?php

class testclass 
{

    public $args = [];
    private $sequences = [];
    private $numberOfArguments = 0;

    public function __construct($args)
    {
        $this->cleanArgs($args);
        $this->numberOfArguments = count($this->args);
        
    }

    public function cleanArgs($args)
    {
        foreach($args as $key => $value)
        {
            if($key == 0)
            {
                continue;
            }
            $this->args[$key] = (int)$value;
        }
    }

    public function multiplyArray($args)
    {
        $total = array_product($args);

        $arr = [];
        foreach($args as $arg)
        {
            $arr[] = $total/$arg;
        }

        return $arr;
    }
    
    //without the divide
    public function multiplyArray2($args)
    {
        $arr = [];
        foreach($args as $key => $arg)
        {            
            $total = 1;

            for($i = 1; $i < ($this->numberOfArguments + 1); $i++)
            {
                if($i == $key)
                {
                    continue;
                }
                $total = $total * $args[$i];
            }
            
            $arr[] = $total;
        }

        return $arr;
    }
}

//$args = $argv;

$numberOfArguments = count($argv);

if($numberOfArguments < 2)
{
    die("Not enough arguments");
}

$r = new testclass($argv);
$multArray = $r->multiplyArray($r->args);
echo "Multiplied Array:                  " . implode(", ", $multArray);
echo PHP_EOL;

$multArray = $r->multiplyArray2($r->args);
echo "Multiplied Array without dividing: " . implode(", ", $multArray);
