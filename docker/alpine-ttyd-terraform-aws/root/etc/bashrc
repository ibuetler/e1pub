# Aliases
# Shell Options
shopt -s checkwinsize

# Color Definitions for .bashrc
COL_YEL="\[\e[1;33m\]"
COL_GRA="\[\e[0;37m\]"
COL_WHI="\[\e[1;37m\]"
COL_GRE="\[\e[1;32m\]"
COL_RED="\[\e[1;31m\]"

# Bash Prompt
if test "$UID" -eq 0 ; then
	_COL_USER=$COL_RED
	_p=" #"
else
	_COL_USER=$COL_GRE
	_p=">"
fi
COLORIZED_PROMPT="${_COL_USER}\u${COL_WHI}@${COL_YEL}\h${COL_WHI}:\w${_p} \[\e[m\]"
case $TERM in
	*term | rxvt | screen )
		PS1="${COLORIZED_PROMPT}\[\e]0;\u@\h:\w\007\]" ;;
	linux )
		PS1="${COLORIZED_PROMPT}" ;;
	* )
		PS1="\u@\h:\w${_p} " ;;
esac

echo "=============================="
echo "        Hacking-Lab           "
echo "=============================="

