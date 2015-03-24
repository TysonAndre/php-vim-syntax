highlight done ctermfg=DarkGreen
highlight maybedone ctermfg=Blue
highlight headline ctermfg=White cterm=bold,underline
highlight moot ctermfg=DarkGrey

syntax match done /^\*\+\t\+\zs\S.*$/
syntax match maybedone /^\(done\)\??\t\+\zs.*/
syntax match moot /^[#]\t\+.*/
syntax match headline /^ \+\zs[^\t]*/
