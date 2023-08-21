<?php

namespace Zoolora\Log;

class Logger
{
    protected string $log_file;
    protected bool $in_stdout = false;

    /**
     * Log file path.
     * @param string $log_file
     */
    public function __construct(string $log_file)
    {
        $this->log_file = $log_file;
    }

    /**
     * Set is enable show log in terminal or not.
     * @param bool $is_enable_stdout
     * @return void
     */
    public function enableStdout(bool $is_enable_stdout): void {
        $this->in_stdout = $is_enable_stdout;
    }

    /**
     * Log message.
     * @param string $message
     * @return void
     */
    public function log(string $message): void
    {
        $fp = fopen($this->log_file, "a");
        fwrite($fp, $message . "\r\n");
        fclose($fp);

        if ($this->in_stdout) {
            $stdout_fp = fopen("php://stdout", "a");
            fwrite($stdout_fp, $message . "\n");
            fclose($stdout_fp);
        }
    }

    /**
     * Report a log message.
     * @param string $message
     * @return void
     */
    public function report(string $message): void {
        $this->log(sprintf("[%s]: %s", (new \DateTime())->format("Y-m-d - H:i:s"), $message));
    }

}
