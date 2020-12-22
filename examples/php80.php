<?php
// PHP 8.0 Nullsafe operators
$a->foo + $b?->foo + $c?->methodName();
if (true) {
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

// php 8.0 catch without capturing a variable
try {
} catch (RuntimeException) { }

class C {}
// NOTE: if these look the same (e.g. in colorscheme elflord), then
// ':highlight! link Function CursorLine' (or a target other than CursorLine)
// may visually distinguish internal class names from unknown names.
new TypeError();
new CustomClass();
function uses_curl(CurlHandle $x) {}
$x = is_string('str');
$y = str_ends_with('exact', 'act');

var_dump(E_ERROR);

#This is a line comment followed by a PHP 8.0 attribute spanning a single line.
#[MyAttribute()]
function example() {}
$noop = fn() => {};
