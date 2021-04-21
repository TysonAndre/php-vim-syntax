<?php
enum Suit: string {
    case Hearts = 'H';
}
function never_returns(): never {
    throw new RuntimeException("Must not normally return");
}
