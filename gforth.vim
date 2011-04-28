"  Copyright (C) 2004 Jason Woofenden
"
"  This file is part of herkforth.
"
"  herkforth is free software; you can redistribute it and/or modify it
"  under the terms of the GNU General Public License as published by
"  the Free Software Foundation; either version 2, or (at your option)
"  any later version.
"
"  herkforth is distributed in the hope that it will be useful, but
"  WITHOUT ANY WARRANTY; without even the implied warranty of
"  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
"  General Public License for more details.
"
"  You should have received a copy of the GNU General Public License
"  along with herkforth; see the file COPYING.  If not, write to the
"  Free Software Foundation, Inc., 59 Temple Place - Suite 330, Boston,
"  MA 02111-1307, USA.



"   This file implements syntax coloring in vim for the ascii representation of my colorforth source.
"
"   To install, create a link to this file in ~/vim/syntax:
"
"   ln -s `pwd`/syntax_coloring.vim ~/.vim/syntax/herkforth.vim
"
"   Then add the following lines to the "filetypedetect" augroup in ~/.vim/filetype.vim
"
"   au BufNewFile,BufRead blocks/[0-9][0-9][02468] setf herkforth
"
"   (if you have no ~/.vim/filetype.vim then create the file with this text in it:
"
"   augroup filetypedetect
"   au BufNewFile,BufRead blocks/[0-9][0-9][02468] setf herkforth
"   augroup END
"
"    NOTE: be sure not to include the " marks at the begining of the lines in the above instructions

highlight execute ctermfg=Yellow ctermbg=Black
highlight define ctermfg=DarkRed ctermbg=Black
highlight compile ctermfg=DarkGreen ctermbg=Black
highlight brackets ctermfg=Blue ctermbg=Black
highlight comment0 ctermfg=Grey ctermbg=Black
highlight comment1 ctermfg=Grey ctermbg=Black
highlight comment2 ctermfg=Grey ctermbg=Black
highlight comment3 ctermfg=Grey ctermbg=Black
highlight string ctermfg=DarkGrey ctermbg=Black

syntax match compile /[^][; ]/
syntax match execute /[^][]/
syntax match define /^ *: [^ ]\+/
syntax match comment0 /^(.*/
syntax match comment1 / (.*/
syntax match comment2 /\\.*/
syntax match comment3 /^#! .*/
syntax match string /^" .*/

syntax region brackets start="^ *:\|]"hs=s+ end=" [[;]" contains=variable_def,tic,define,compile,const_def


" this is the range of characters that are considered part of a word (any
" non-whitespace printable 7-bit char). This enables the tags to work on all
" forth words (see README for more info on tags.)
set isk=33-255
