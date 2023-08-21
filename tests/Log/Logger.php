<?php

use Zoolora\Log\Logger;

it("Logger class", function () {
    $logger = new Logger("./Zoolora.log");
    $logger->log("Test Log Text");

    $fp = fopen("./Zoolora.log", "r");
    $content = fread($fp, filesize("./Zoolora.log"));

    expect(str_contains($content, "Test Log Text\r\n"))->toBe(true);

    fclose($fp);
});
