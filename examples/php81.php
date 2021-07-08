<?php
enum Suit: string {
    case Hearts = 'H';
}

class C {
    public readonly int $readonlyProperty;
}

function never_returns(): never {
    throw new RuntimeException("Must not normally return");
}
$x = 0O123 + 0o123;
