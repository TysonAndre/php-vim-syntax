<?php
// PHP 8.0 Nullsafe operators
$a->foo + $b?->foo + $c?->methodName();
if () {
} else {
}

new ('std'.'Class')();

// Currently, this is folded if php_folding=2. This isn't a function or a class.
// 'match' has the same higlighting as 'if'.
// Can be overridden locally with ':highlight! link phpConditional phpOperator'
// (phpOperator can be replaced with whatever has the right highlighting)
$result = match($x) {
    1, 2 => -2,
    default => 123,
};
match_as_prefix();
// no highlighting change for named arguments
call_named_args(named: 123);

try {
} catch (RuntimeException) { }

class C {}
// NOTE: if these look the same (e.g. in colorscheme elflord), then
// ':highlight! link Function CursorLine' (or a target other than CursorLine)
// may visually distinguish internal class names from unknown names.
new TypeError();
new CustomClass();
$x = is_string()

#This is a line comment followed by a PHP 8.0 attribute spanning a single line.
#[MyAttribute()]
function example() {}
