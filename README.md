### Database 
Database: `php_oop`

Table & data included in `php_pdo.sql` 

### Table 
* `categories`
* `products`
* `users`

### Configuration db Conn
`..\config\App.php`

```php
define("HOST", 'localhost');
define("USER", 'root');
define("PASSWORD", 'password');
define("DATABASE", 'php_oop');

```


### Directory Structure
```
├─── assets\                # Folder where you store your projects css, js and images
|   └─── css\
|   └─── img\
|   └─── js\
├─── config\                # Config dir for App config, DB Connection, Error hendlers 
|   └─── App.php            # Every single new objects class must declare in this file.
|   └─── Database.php
|   └─── Errors.php
├─── elements\              # Element dir for include inside view file
|   ├─── footer.php
|   ├─── header.php
|   └─── ...
├─── objects\               # All Class file in this folder 
|   └─── Auth.php
|   └─── Users.php
|   └─── ...
├─── index.php
├─── home.php
├─── login.php
├─── logout.php
├─── ... .php
 
```
 