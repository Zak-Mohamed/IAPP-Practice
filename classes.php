<?php 
class SampleClass {
    public function greet($name) {
        return "Hello, " . $name . "!";
    }
    public function week_day($day) {
        return "Today is " . $day . ".";
    }
}

// create instance 
$sample = new SampleClass();
echo $sample->greet("World");
?>