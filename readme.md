##Webbased project manager

This is a simple project manager where you can manage projects with tasks for yourself to keep an eye on one (or more) project(s).

The code is built using [Laravel](http://www.laravel.com), so if you need to know the nitty gritty on it's installation you should follow it's [Installation guide](http://www.laravel.com/docs/5.1#installation). You should also have a working version of [Composer](http://www.getcomposer.org).

### Basic server requirements
- Apache (any recent version) with a [VirtualHost](https://httpd.apache.org/docs/2.4/vhosts/examples.html) for the system
- PHP >= 5.5.9 (for more info, see the [Laravel installation guide](http://www.laravel.com/docs/5.1#installation)
- MySQL/MariaDB/Percona Server
- Shell access

I'm going to assume you've called your `VirtualHost` **projectmanager.local**

### Installation
I'm assuming your Apache *root folder* is located at */var/www/html/* and that you're going to run the system in a subfolder */var/www/html/projectmanager/*.

Execute the following commands in that folder (*/var/www/html/projectmanager/*) to install the system.

	$ git clone https://github.com/sebastiaanfranken/projectbeheer.git /var/www/html/projectmanager
	$ cd /var/www/html/projectmanager
	$ composer install
	
Once this is complete you should have the system installed, but not yet configured. Make sure to copy the *.env.example* file to *.env* with the following command: 

	$ cp /var/www/html/projectmanager/.env.example /var/www/html/projectmanager/.env
	
When this is done you need to edit */var/www/html/projectmanager/.env* and update the *DB_** settings to match your database settings. Once this is done you'll need to run one last command to migrate (and create) the database tables.

	$ php /var/www/html/projectmanager/artisan migrate
	
If all went well you now have the system up and running. Go to the URL/IP you gave your `VirtualHost` and have fun! 


### Post install
Once the **Installation** step is done you'll need to configure the main system user. This can be done by going to the following URL: *http://projectmanager.local/setup*
This should return you to the login page, where you can login to the system.

### Default credentials
The system creates one (1) default user, with the following credentials:

- Username: **demo@local.host**
- Passwowrd: **@welkom_demo_01**