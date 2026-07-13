<?php
namespace Core;

// use Exception;

class Container {
  protected array $bindings=[];

  //adds
  public function bind(string $key, callable $resolver):void 
  {
    $this->bindings[$key] = $resolver;
  }

  //removes
  public function resolve(string $key) 
  {
    if (!array_key_exists($key, $this->bindings)) {
      throw new \Exception("no matching key");
    }
    return call_user_func($this->bindings[$key], $this);
  }
}