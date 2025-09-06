<?php
class layouts
{
    public function header($conf)
    {
        echo "<header><h1>" . $conf['sacco_name'] . "</h1></header>";
    }

    public function footer($conf)
    {
        echo "<footer><p>Copyright &copy; - " . $conf['sacco_name'] . " " . date("Y") . "</p></footer>";
    }
}
