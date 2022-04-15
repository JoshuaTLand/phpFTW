# phpFTW
A simple and light weight framework for basic php development

## Local Setup
1) Install an amp stack locally  
    a) https://bitnami.com/stack/wamp  
    b) https://www.apachefriends.org/index.html
2) Clone the repo
3) Set the apache htdocs location to the repo directory  
    a) https://stackoverflow.com/questions/18902887/how-to-configuring-a-xampp-web-server-for-different-root-directory
4) If using a DB, add the connection information to the settings file
5) Install Composer locally  
    a) https://thecodedeveloper.com/install-composer-windows-xampp/  
    b) https://getcomposer.org/download/
6) From the repo directoy  
    a) run `composer dump-autoload` from the repo directory to create the autoloader fles  
    b) run `composer install` to setup necesarry dependencies  


## Basics
1) All requests are rerouted through the root index.php
2) index.php sets the environment variable, runs init (load settings, init database, loader and logger)
3) Load the request  
    - Request assumes all paths point to a controller function -> /path/to/controller/nameOfFunction  
    - if only 1 section exists, the index function for that controller is called -> site.com/controller = controller->index  
    - Path routing can be overridden in the settings file  

## Testing
1) Navigate to the repo folder
2) Run `.\vendor\bin\phpunit .\test\`
	a) Alternatively, you can add `phpFTW\vendor\bin\` to your PATH and run `phpunit .\test\`
