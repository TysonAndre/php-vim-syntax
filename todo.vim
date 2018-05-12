highlight done ctermfg=DarkGreen
highlight maybedone ctermfg=Blue
highlight headline ctermfg=White cterm=bold,underline
highlight moot ctermfg=DarkGrey
highlight indent ctermfg=NONE

syntax match done /^\*\+\t\+\zs\S.*$/
syntax match maybedone /^\(done\)\??\t\+\zs.*/
syntax match moot /^[#]\t\+.*/
syntax match indent /^\s\+/
syn region headline start=/^$\|\%1l/ contains=indent end="\S.*$"
"syntax match headline /^ \+\zs[^\t]*/

syntax sync minlines=1
syntax sync maxlines=1
