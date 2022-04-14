# phpFTW
A simple and light weight framework for basic php development

## Local Setup
1) Install an amp stack locally  
    a) https://bitnami.com/stack/wamp  
    b) https://www.apachefriends.org/index.html
2) Install Composer locally
    a) https://thecodedeveloper.com/install-composer-windows-xampp/
    b) https://getcomposer.org/download/
3) Clone the repo
4) Set the apache htdocs location to the repo directory  
    a) https://stackoverflow.com/questions/18902887/how-to-configuring-a-xampp-web-server-for-different-root-directory
5) If using a DB, add the connection information to the settings file

## Basics
1) All requests are rerouted through the root index.php
2) index.php sets the environment variable, runs init (load settings, init database, loader, and logger)
3) Load the request  
    - Request assumes all paths point to a controller function -> /path/to/controller/nameOfFunction  
    - if only 1 section exists, the index function for that controller is called -> site.com/controller = controller->index  
    - Path routing can be overridden in the settings file  
