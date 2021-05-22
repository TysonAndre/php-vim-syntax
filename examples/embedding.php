<h1>test</h1>

<img onload="alert(1)"></div>
<style>
color: blue;
</style>
<?php
// test of php_sql_query (SQL syntax highlighting inside strings)
$sql = 'SELECT name FROM users WHERE id = 123;';
// test of php-htmlInStrings error highlighting
$scriptErrorTag = "<a> << ";
$script = 'script to set window.x to 123;<script>window.x = 123; alert(1);</script>';
$img = '<img width="800" height="600" onload="window.afterLoaded(1);" src="/test.png" />';
$style = '<style>color: blue;</style>';
// Note that by default, setting php_htmlInStrings will have an issue with '<?php';
// (because this is using the html syntax rules inside of quoted php strings,
// and syntax/php.vim also extends the exact same html syntax rules to allow embedding php)
$phpTagName = '<?php';
$other = 123;
// With php_htmlInStrings=2 (copying a subset of the html rules), this comment should show up as an ordinary comment, not a string ';
