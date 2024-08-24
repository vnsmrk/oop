<?php
abstract class Task extends Config {
    protected $id;
    protected $task;

    public function __construct($task = null, $id = null) {
        $this->task = $task;
        $this->id = $id;
    }

    abstract public function execute();
}
?>