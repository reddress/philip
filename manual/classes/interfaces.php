<?php

interface iTemplate {
  public function setVar($name);
  public function getHTML($template);
}

class BadTemplate implements iTemplate {
  private $vars = array();

  public function setVar($name) {
    $this->vars[$name] = 1;
  }

  // does not work because it is missing implementation of getHTML
}
