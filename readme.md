## Curso Laravel 5.1 - EspecializaTI

Repositório para os arquivos do Curso de Laravel 5.1 do [EspecializaTI](http://www.especializati.com.br).

Passo a passo 
===========

* Clone este repositório para a pasta do seu servidor web :

	- Exemplo: git clone https://github.com/EspecializaTi/curso-laravel-5.1.git /var/www/curso-laravel5 

* No terminal, acesse o diretório recém criado e execute o comando "composer install" para que o composer possa baixar e instalar todas as dependências do projeto.
	- Exemplo: cd /var/www/curso-laravel5
			   sudo composer install


* Após a instalação das dependências, crie o arquivo .env na raiz do projeto e o configure com os dados do ambiente de produção ( Banco de dados, envio de e-mails e etc... ).

* Agora temos que migrar as tabelas do banco de dados. No terminal, acesse o diretório da aplicação e rode o comando: php artisan migrate .

* Não se esqueça de gerar a chave de criptografia ( APP_KEY ) da aplicação. Caso ainda não tenha configurado no seu arquivo .env, você pode fazer isso de forma simples e rápida com o comando: php artisan key:generate .
