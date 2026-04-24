<?php
use Symfony\Component\Process\Process;

require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';

$process = new Process([
    'php',
    '-S',
    '127.0.0.1:8000',
    base_path('vendor/laravel/framework/src/Illuminate/Foundation/resources/server.php'),
], public_path());

echo "Working directory: " . $process->getWorkingDirectory() . PHP_EOL;
echo "Command: " . $process->getCommandLine() . PHP_EOL;

$process->start(function ($type, $buffer) {
    echo "[$type] $buffer";
});

echo "Process started, waiting...\n";

$count = 0;
while ($process->isRunning() && $count < 20) {
    usleep(500 * 1000);
    $count++;
}

if ($count >= 20) {
    $process->stop();
    echo "Process stopped after 10 seconds\n";
} else {
    $exitCode = $process->getExitCode();
    echo "Process exited with code: $exitCode\n";
    echo "Error output: " . $process->getErrorOutput() . "\n";
}
?>
