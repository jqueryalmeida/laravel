## Exemplo com tabs (\t) e com paradas de tabulação
```php
"For ": {
    "prefix": "forarr",
    "body": [
        "for (let ${index} = 0; ${index} < ${array}.length; ${index}++) {",
        "\tconst ${element} = ${array}[${index}];",
        "\t$0",
        "}"
    ],
    "description": "For Loop"
},
```
Com teclas de atalho
```php
{
    "key": "ctrl+c l",
    "command": "editor.action.insertSnippet",
    "when": "editorTextFocus",
    "args": {
        "langId": "javascript",
        "name": "Print to console"
}
```

