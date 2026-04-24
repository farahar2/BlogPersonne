<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';

$command = $app->make('Illuminate\Foundation\Console\ServeCommand');

// Add some debugging
$reflection = new ReflectionClass($command);
$handleMethod = $reflection->getMethod('handle');
$handleMethod->setAccessible(true);

$startProcessMethod = $reflection->getMethod('startProcess');
$startProcessMethod->setAccessible(true);

// Try to understand what's happening
echo "Testing serve command...\n";
$input = new Symfony\Component\Console\Input\ArrayInput([]);
$output = new Symfony\Component\Console\Output\BufferedOutput();

$command->setInput($input);
$command->setOutput($output);

try {
    $result = $command->execute();
    echo "Result: $result\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo $output->fetch();
?>
