Miscellaneous notes on useful commands for testing changes to php syntax rules:

Adding missing names
--------------------

A script to find missing classes, traits, interfaces and functions to highlight is found in `devscripts/`.

Debugging highlighting
----------------------

`:echo map(synstack(line('.'), col('.')), 'synIDattr(v:val, "name")')`
shows the syntax rules used at the cursor.

syntax/php.vim has a comment on the top with options that can be used to enable or disable
optional features such as `php_alt_comparison`

Some color schemes such as `elflord` use the same highlighting for known classes (e.g. RuntimeError) as unknown class names.

To see the effect of changing a vim setting such as `php_alt_comparisons` without reloading vim, the command `:do Syntax` can be used.
