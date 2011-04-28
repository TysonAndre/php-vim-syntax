if version < 600
  syntax clear
elseif exists("b:current_syntax")
  finish
endif

syn match asmDirective		"\W\.[a-z][a-z]\+\>"


" storage types
syn match asmType "\W\.long"
syn match asmType "\W\.ascii"
syn match asmType "\W\.asciz"
syn match asmType "\W\.byte"
syn match asmType "\W\.double"
syn match asmType "\W\.float"
syn match asmType "\W\.hword"
syn match asmType "\W\.int"
syn match asmType "\W\.octa"
syn match asmType "\W\.quad"
syn match asmType "\W\.short"
syn match asmType "\W\.single"
syn match asmType "\W\.space"
syn match asmType "\W\.string"
syn match asmType "\W\.word"


syn match decNumber		"\<[1-9]\d*\>"
syn match octNumber		"\<0[0-7]*\>"
syn match hexNumber		"\<0[x][0-9a-f]*\>"
syn match binNumber		"\<0[b][0-1]*\>"

syn match asmLabel	"^[a-z0-9_]*:"he=e-1
syn match asmIdentifier	"^\s\+[a-z_][a-z0-9_]*"
syn match asmIdentifier "^[0-9]:\s\+[a-z_][a-z0-9_]*"lc=2

syn match asmComment		"#.*"hs=s+1

syn match asmInclude		"\W\.include"
syn match asmCond		"\W\.if\>"
syn match asmCond		"\W\.else\>"
syn match asmCond		"\W\.elseif"
syn match asmCond		"\W\.endif"
syn match asmMacro		"\W\.macro"
syn match asmMacro		"\W\.endm"


syn case match

" Define the default highlighting.
" For version 5.7 and earlier: only when not done already
" For version 5.8 and later: only when an item doesn't have highlighting yet
if version >= 508 || !exists("did_asm_syntax_inits")
  if version < 508
    let did_asm_syntax_inits = 1
    command -nargs=+ HiLink hi link <args>
  else
    command -nargs=+ HiLink hi def link <args>
  endif

  " The default methods for highlighting.  Can be overridden later
  HiLink asmSection	Special
  HiLink asmLabel	Label
  HiLink asmComment	Comment
  HiLink asmDirective	Statement

  HiLink asmInclude	Include
  HiLink asmCond	PreCondit
  HiLink asmMacro	Macro

  HiLink hexNumber	Number
  HiLink decNumber	Number
  HiLink octNumber	Number
  HiLink binNumber	Number

  HiLink asmSpecialComment Comment
  HiLink asmIdentifier Identifier
  HiLink asmType	Type

  hi asmComment ctermfg=red

  delcommand HiLink
endif

let b:current_syntax = "asm"

" vim: ts=8
