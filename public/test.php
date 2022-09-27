<?php

// class Redirector
// {
//     private $redirectUrl;
//     private $session;

//     public function back()
//     {
//         $this->redirectUrl = 'http://localhost/post/create';
//         return $this;
//     }

//     public function with($key, $value)
//     {
//         $this->session = [
//             'key' => $key,
//             'value' => $value,
//         ];
//         return $this;
//     }

//     public function __toString()
//     {
//         return $this->redirectUrl;
//     }
// }

// function redirect()
// {
//     return new Redirector();
// }

// echo (string) redirect()->back()->with('test', 'testcontent');

// Request:
// class Request
// {
//     private array $parameters = [
//         'title' => 'Hallo Request!',
//         'content' => 'Hallo Content!'
//     ];

//     public function __get($name)
//     {
//         return $this->parameters[$name];
//     }

//     public function __set($name, $value)
//     {
//         $this->parameters[$name] = $value;
//     }

//     public function all()
//     {
//         return $this->parameters;
//     }
// }

// $request = new Request();

// $request->title = 'Test123';
// $request->bla = 'test';

// print_r( $request->all() );

trait HasFactory
{
    public function createFactory(): string
    {
        return 'creating factory...';
    }
}

class Post
{
    use HasFactory;

    public function save(): bool
    {
        return true;
    }
}

$post = new Post();
$post->createFactory();
