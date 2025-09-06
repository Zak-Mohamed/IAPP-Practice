<?php
class sample
{
    public function greet($name)
    {
        return "Hello, " . $name . "!";
    }
    public function week_day($day)
    {
        return "Today is " . $day . ".";
    }
}

// create instance 
$sample = new sample();
echo $sample->greet("Zakyboss");
