# phpFTW
A simple and light weight framework for basic php development

## Basics
1) All requests are rerouted through the root index.php
2) index.php sets the environment variable, runs init (load settings, init database, loader, and logger)
3) Load the request
    - Request assumes all paths point to a controller function -> /path/to/controller/nameOfFunction
    - if only 1 section exists, the index function for that controller is called -> site.com/controller = controller->index
    - Path routing can be overridden in the settings file
