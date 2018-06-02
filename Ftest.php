<?php
require_once "Fuse.php";
$fuse = new Fuse();
$fuse->print = 1;
$end1 = $fuse->run(
  ['showTime' => 1, 'showRam' => 1],
  ['name' => 'atest', 'args' => [3]]
);
$end2 = $fuse->run(
    ['showTime' => 1, 'showRam' => 1, 'classObj' => new test()],
    ['name' => 'atest', 'args' => [3]]
);
print_r($end1);
print_r($end2);

function atest($a) {
    echo $a+1;
}

class test {
    public function atest($a) {
        echo $a;
    }
}