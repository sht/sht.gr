<?php
/**
 * Shell Class
 *
 * The Shell extends the Core and is the class that initializes any
 * project-specific datamembers along with defining the rendering logic of
 * each page. An object of the shell class allows for ease-of-access
 * of core functions or module-related functions.
 *
 */
class Shell extends Core {

    // Include required components
    use AssetPushing;
    use Date;
    use Encryption;
    use FormHandling;
    use Git;
    use Logging;
    use SHT;

    /**
     * Shell constructor method
     */
    function __construct($shell = null) {
        parent::__construct();
        $this->shell = $shell;
        $this->name = "SHT";
        $this->separator = "//";
        $this->patterns = array();
        $this->data_paths = array(
            "/data/",
            "/data/logs/"
        );
        $this->pages = array(
            "/" => ["Home", "home", "default"],
            "/projects" => ["Projects", "projects", "default"],
            "/ardent" => ["Ardent Radio", "ardent", "default"],
            "/login" => ["Login", "login", "default"],
        );
        $this->errors = array(
            "/error/403" => ["403 Forbidden", "error/403", "error"],
            "/error/404" => ["404 Not Found", "error/404", "error"],
            "/error/503" => ["503 Service Unavailable", "error/503", "error"]
        );
        $this->assets = array(
            "css/core.css" => "style"
        );
        $this->pushAssets();
        $this->createDataPaths();
    }

}
// Set the shell object name (for accessing in page segments and APIs)
$shell = "sht";
// Initialize the Shell object using a variable variable
$$shell = new Shell($shell);
// Initialize the connection to the database (optional) ------- |
$db = new Database($$shell, 'localhost', 'root', $shell); //    |  OPTIONAL DB
// Link the shell object with the database for easy accessing   |  CONNECTION
$$shell->linkDB($db); // -------------------------------------- |
// Render the page
$$shell->renderPage();
