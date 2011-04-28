highlight level1 ctermfg=LightGrey ctermbg=Red
highlight level2 ctermfg=Red ctermbg=Black
highlight level3 ctermfg=DarkRed ctermbg=Black
highlight level4 ctermfg=DarkYellow ctermbg=Black
highlight VICTORY ctermfg=Black ctermbg=Blue
highlight maybedone ctermfg=Black ctermbg=DarkGreen
highlight headline ctermfg=Black ctermbg=LightGrey
"highlight moot ctermfg=DarkGrey ctermbg=Black

syntax match level1 /^[*][*][*][*][^*]\zs.*/
syntax match level2 /^[*][*][*][^*]\zs.*/
syntax match level3 /^[*][*][^*]\zs.*/
syntax match level4 /^[*][^*]\zs.*/
syntax match VICTORY /^\(VICTORY\|DONE\|YAY\)!\?[^	]*	\zs.*/
syntax match maybedone /^done?.\zs.*/
syntax match moot /^[#?].*/
syntax match headline /^ \+\zs[^	]*/

set tabstop=8
set shiftwidth=8
