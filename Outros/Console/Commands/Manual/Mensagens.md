# Mensagens
```php
   $this->line("Some text");//Uma única linha
    $this->info("Hey, watch this !");
    $this->comment("Just a comment passing by");
    $this->question("Why did you do that?"); // Fica em fundo azul claro
    $this->error("Ops, that should not happen.");

public function inlineInfo($string)
{
    $this->output->write("<info>$string</info>"); // <info> fica com fontes verdes
}

$this->output->write('my inline message', true);
$this->output->write('my inline message continues', false);// Com false puxa a próxima linha para o final desta
```

Perguntas/Questions

Pára a execução e faz uma pergunta
```php
    $answer = $this->ask('What is your name?');

    // Ask for sensitive information
    $password = $this->secret('What is the password?');

    // Choices
    $name = $this->choice('What is your name?', ['Taylor', 'Dayle'], $default);

    // Confirmation

    if ($this->confirm('Is '.$name.' correct, do you wish to continue? [y|N]')) {
        //
    }
```
Exemplo
```php
    $questions = [
        'easy' => [
            'How old are you ?', "What is the name of your mother?",
            'Do you have 3 parents ?','Do you like Javascript?',
            'Do you know what is a JS promise?'
        ],
        'hard' => [
            'Why the sky is blue?', "Can a kangaroo jump higher than a house?",
            'Do you think i am a bad father?','why the dinosaurs disappeared?',
            "why don't whales have gills?"
        ]
    ];

    $questionsToAsk = $questions[$difficulty];
    $answers = [];

    foreach($questionsToAsk as $question){
        $answer = $this->ask($question);
        array_push($answers,$answer);
    }

    $this->info("Thanks for do the quiz in the console, your answers : ");

    for($i = 0;$i <= (count($questionsToAsk) -1 );$i++){
        $this->line(($i + 1).') '. $answers[$i]);
    }
```
Escrevendo mensagem no handle:
```php
      $this->writeFile('Frase desejada aqui');
```
Adicionando uma quebra de linha
```php
      $this->info(PHP_EOL);
```
