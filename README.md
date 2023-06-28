# To-do List - Teste Para Desenvolvedor

Projeto desenvolvido sem utilização de frameworks, somente com PHP puro, JavaScript, HTML e CSS. Para o banco de dados foi utiliazdo o Mysql. E Docker e Docker compose para criação e orquestação de containers.

### Tecnologias Utilizadas

- [PHP](https://www.php.net/)
- [JavaScript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Guide/Introduction)
- [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)
- [CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS)
- [Ajax](https://developer.mozilla.org/pt-BR/docs/Web/Guide/AJAX)
- [Jquery](https://jquery.com/)
- [Docker e Docker Compose](https://www.docker.com/)
- [Mysql](https://www.mysql.com/)

---

### Features Desenvolvidas

- Listar Tarefas
- Cadastrar Tarefas
- Editar Tarefas
- Deletar Tarefas

### Outros

- Responsividade
- Docker

---

### Informações

- O projeto conta com os arquivos de configuração do docker e está configurado para funcionar com o docker, caso você não use docker e docker compose, basta ignorar e seguir o passo a passo [sem docker](#passos-de-configuração-de-projeto-sem-docker).
- Se você utiliza o docker, siga os passos de [configuração com Docker](#passos-de-configuração-de-projeto-com-docker)

---

## Passos de configuração de Projeto (Sem docker)

- É importante que em sua máquina esteja instalado o php versão ^8.2.
- O banco de dados Mysql também deve estar instalado e configurado.

1. Copiar o projeto para a máquina local ou fazer o clone do projeto

```bash
  git clone https://github.com/mauricioccardoso/inbraep-todoList.git
```

2. No arquivo "DatabaseConfig.php" estão as configurações do banco de dados. Configure o banco de dados seguindo as informações abaixo ou modifique o arquivo conforme o seu banco.

```bash
  $host = 'localhost';
  $user = 'root';
  $password = 'mypassword';
  $database = 'mydb';
```

3. Na raiz do projeto. Utilize o comando abaixo para subir o servido php apontando para o arquivo "index.html".

```bash
  php -S localhost:8000 -t ./src
```

4. Clique [aqui](http://localhost:8000/) ou insira a url no browser para acessar a aplicação.

```bash
  http://localhost:8000/
```

## Passos de configuração de Projeto com Docker

- O projeto não nescessita de nenhuma modificação
- É importante que em sua máquina esteja instalado e configurado com o [Docker e Docker Compose](https://www.docker.com/)

1. Copiar o projeto para a máquina local ou fazer o clone do projeto

```bash
  git clone https://github.com/mauricioccardoso/inbraep-todoList.git
```

2. Acessar o projeto e na raiz do projeto utilizar o comando abaixo

```bash
  docker compose up --build -d
```

3. Clique [aqui](http://localhost:8000/) ou insira a url no browser para acessar a aplicação.

```bash
  http://localhost:8000/
```
