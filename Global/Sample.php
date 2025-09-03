<?php 
class Sample {
    public function greet($name) {
        return "Hello, " . $name . "!";
    }
    public function week_day($day) {
        return "Today is " . $day . ".";
    }
}

// create instance 
$sample = new Sample();
echo $sample->greet("World");
?>