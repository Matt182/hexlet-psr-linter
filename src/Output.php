<?php
namespace HexletPsrLinter;

function messageOut($messages)
{
    if (empty($messages)) {
        echo "Congratulation! everything is ok.\n";
    } else {
        foreach ($messages as $message) {
            echo "Warning on line:{$message[0]} {$message[1]} name must be in camelCaps() ({$message[2]})\n";
        }
    }
}
