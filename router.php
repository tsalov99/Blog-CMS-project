<?php
class Router
{
  private $request;
  private $supportedHttpMethods = array(
    "GET",
    "POST"
  );

  function __construct(Prepare $request)
  {
   $this->request = $request;
  }

  function __call($name, $args)
  {
    print_r($name);
    list($route, $method) = $args;

    if(!in_array(strtoupper($name), $this->supportedHttpMethods))
    {
      $this->invalidMethodHandler();
    }

    $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
  }

  private function formatRoute($route)
  {
      print_r($route);
    $result = rtrim($route, '/');
    if ($result === '')
    {
      return '/';
    }
    return $result;
  }

  private function invalidRequest()
  {
    header("{$this->request->serverProtocol} 405 Method Not Allowed");
  }

  private function defaultRequest()
  {
    header("{$this->request->serverProtocol} 404 Not Found");
  }

  function routeResolve()
  {
      
    $methodDictionary = $this->{strtolower($this->request->requestMethod)};
    $formatedRoute = $this->formatRoute($this->request->requestUri);
    //print_r($methodDictionary);
    echo '<br>';
    //print_r($formatedRoute);
    $method = $methodDictionary[$formatedRoute];

    if(is_null($method))
    {
      $this->defaultRequestHandler();
      return;
    }

    echo call_user_func_array($method, array($this->request));
  }

  function __destruct() 
  {
    $this->resolve();
  }
}