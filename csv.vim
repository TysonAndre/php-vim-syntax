highlight csv1 ctermfg=darkred
highlight csv2 ctermfg=green
highlight csv3 ctermfg=blue
highlight csv4 ctermfg=yellow
highlight csv5 ctermfg=cyan
highlight csv6 ctermfg=white

syn match csv1 /^[^,]*/ nextgroup=csv2
syn match csv2 /,[^,]*/hs=s+1 contained nextgroup=csv3
syn match csv3 /,[^,]*/hs=s+1 contained nextgroup=csv4
syn match csv4 /,[^,]*/hs=s+1 contained nextgroup=csv5
syn match csv5 /,[^,]*/hs=s+1 contained nextgroup=csv6
syn match csv6 /,[^,]*/hs=s+1 contained nextgroup=csv2
