#Questões
1. ##### Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima“Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos de ambos (3 e 5), imprima “FizzBuzz”.
   
   Código executavel está em: ```questoes/FizzBuzz.php```
   podendo ser executado via comand line: ```php questoes/FizzBuzz.php ``` 
   ou 
   pela url: ``` http://localhost/cakephp/questoes/fizzBuzz ```
   
2. #####Refatore o código abaixo, fazendo as alterações que julgar necessário.

código anterior:
```php
 <?
 
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: http://www.google.com");
    exit();
 } elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
    header("Location: http://www.google.com");
    exit();
 }
```

refatorado (/questoes/refc1.php):

```php
<?php

session_start();

function isSessionLoggedin()
{
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
}

function isCookieLoggedin()
{
    return isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == true;
}

function isLoggedin()
{
    return isSessionLoggedin() || isCookieLoggedin();
}

if (isLoggedin()) {
    header("Location: http://www.google.com");
    exit();
}
```
3. #####Refatore o código abaixo, fazendo as alterações que julgar necessário.

```php
<?php

 class MyUserClass
 {
     public function getUserList()
     {
        $dbconn = new DatabaseConnection('localhost','user','password');
        $results = $dbconn->query('select name from user');
    
        sort($results);
        return $results;
     }
}

```
refatorado (/questoes/refc2.php):

```php
<?php

class MyDefaultConn
{
    /** @var DatabaseConnection */
    private static $conn;
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '1234';


    /**
     * @return DatabaseConnection
     */
    public static function getInstance()
    {
        if (self::$conn === null) {
            self::$conn = new DatabaseConnection(self::$host, self::$user, self::$pass);
        }

        return self::$conn;
    }
}

class MyUserClass
{
    /** @var DatabaseConnection */
    private $dbconn;

    /**
     * MyUserClass constructor.
     * @param null|DatabaseConnection $conn
     */
    public function __construct($conn = null)
    {
        if (is_a($conn, 'DatabaseConnection')) {
            $this->dbconn = $conn;
        } else {
            $this->dbconn = MyDefaultConn::getInstance();
        }
    }


    /**
     * @return array
     * @throws Exception
     */
    public function getUserList()
    {
        $userNameList = $this->dbconn->query('select name from user');

        if (!is_array($userNameList)) {
            throw new Exception("Nenhum user foi encontrado!", 404);
        }

        sort($userNameList);

        return $userNameList;
    }
}
```

4. #### Desenvolva uma API Rest para um sistema gerenciador de tarefas (inclusão/alteração/exclusão). As tarefas consistem em título e descrição, ordenadas por prioridade.
        Desenvolver utilizando:
        • Linguagem PHP (ou framework CakePHP);
        • Banco de dados MySQL;
        Diferenciais:
        • Criação de interface para visualização da lista de tarefas;
        • Interface com drag and drop;
        • Interface responsiva (desktop e mobile);


        
   
   