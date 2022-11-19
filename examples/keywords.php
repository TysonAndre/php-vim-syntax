<?php
function from() {
    // yield
    $x = 'yield ';
    yield 'a';
    yield from ['b'];
    yieldfrom ['b'];
    yield fromage ['b'];
    unyield from ['c'];
}
