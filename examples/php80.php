<?php
// PHP 8.0 Nullsafe operators
$a->foo + $b?->foo + $c?->methodName();
if () {
} else {
}

new ('std'.'Class')();

// Currently, this is folded if php_folding=2. This isn't a function or a class.
$result = match($x) {
    1, 2 => -2,
    default => 123,
};
// no highlighting change for named arguments
call_named_args(named: 123);

try {
} catch (Exception) { }

// TODO: The PHP 8.0 attributes syntax has not been finalized, so no highlighting support was added
@@SomeAttribute()
class C {}
