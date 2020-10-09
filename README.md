# Teste Orube

Esse projeto teve como objetivo criar um sistema de gerenciamentos de produtos utilizando técnicas de programação através do uso de frameworks como Laravel, Bootstrap e Jquery.


# Executar
> Primeiro clone o projeto e entre dentro da pasta
```
git clone https://github.com/EricksonFerreira/TesteOrube && cd TesteOrube
```
### Caso sua máquina seja Ubuntu:
> Use esses comando:
```
sudo apt-get install make
```
```
make conf
```
### Caso seja Windows:
> É necessario baixar e instalar o Xampp: https://www.apachefriends.org/pt_br/index.html
<p> Abra o Xampp e clicke em Start em Apache e Mysql</p>
<p>Depois utilize esses comandos:</p>

```
composer install --no-scripts
```
```
copy .env.example .env
```
```
php artisan key:generate
```
Agora entre no arquivo .env e altere:
```
DB_DATABASE=homestead  para DB_DATABASE=orube
DB_USERNAME=homestead  para DB_USERNAME=root
DB_PASSWORD=secret     para DB_PASSWORD=
```
```
php artisan migrate --seed
```

## Agora é só acessar o nosso Site:

> Utilize esse comando:
```
php artisan serve
```
> Por fim acesse o projeto utilizando na URL do navegador

```
localhost:8000/
```
