local ret_status="$FG[111]%n$FG[146]@$FG[153]%m%(?:%{$fg_bold[green]%}➜ :%{$fg_bold[red]%}➜ %s)"

function docker_machine_active() {
    local ref
    if [[ ! -z $DOCKER_MACHINE_NAME ]]; then
        ref=$DOCKER_MACHINE_NAME || return 0
        echo "%{$fg_bold[blue]%}docker:(%{$fg[red]%}$ref%{$fg_bold[blue]%}):%{$reset_color%}"
    fi
}

PROMPT='${ret_status}%{$fg_bold[green]%}%p %{$fg[cyan]%}%c %{$fg_bold[blue]%}$(git_prompt_info)%{$fg_bold[blue]%} % %{$reset_color%} %{$fg[red]%}$(docker_machine_active)%{$reset_color%}'

ZSH_THEME_GIT_PROMPT_PREFIX="git:(%{$fg[red]%}"
ZSH_THEME_GIT_PROMPT_SUFFIX="%{$reset_color%}"
ZSH_THEME_GIT_PROMPT_DIRTY="%{$fg[blue]%}) %{$fg[yellow]%}✗%{$reset_color%}"
ZSH_THEME_GIT_PROMPT_CLEAN="%{$fg[blue]%})"
