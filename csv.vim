highlight csv1 ctermfg=darkred
highlight csv2 ctermfg=green
highlight csv3 ctermfg=blue
highlight csv4 ctermfg=yellow
highlight csv5 ctermfg=cyan
highlight csv6 ctermfg=white
highlight quoted1 ctermfg=darkred
highlight quoted2 ctermfg=green
highlight quoted3 ctermfg=blue
highlight quoted4 ctermfg=yellow
highlight quoted5 ctermfg=cyan
highlight quoted6 ctermfg=white

syn region quoted1  start="\"" end="\"" contained
syn region quoted2  start="\"" end="\"" contained
syn region quoted3  start="\"" end="\"" contained
syn region quoted4  start="\"" end="\"" contained
syn region quoted5  start="\"" end="\"" contained
syn region quoted6  start="\"" end="\"" contained

syn match csv1 /^[^,]*/                 contains=quoted1 nextgroup=csv2
syn match csv2 /,[^,]*/hs=s+1 contained contains=quoted2 nextgroup=csv3
syn match csv3 /,[^,]*/hs=s+1 contained contains=quoted3 nextgroup=csv4
syn match csv4 /,[^,]*/hs=s+1 contained contains=quoted4 nextgroup=csv5
syn match csv5 /,[^,]*/hs=s+1 contained contains=quoted5 nextgroup=csv6
syn match csv6 /,[^,]*/hs=s+1 contained contains=quoted6 nextgroup=csv2

