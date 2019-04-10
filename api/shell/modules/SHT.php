<?php
trait SHT {
    function renderNav() {
        foreach ($this->pages as $page) {
            if ($page->visible) {
                $name = $page->name;
                $url = $page->url;
                if ($url === $_SERVER['REQUEST_URI']) {
                    $active = " class=\"active\"";
                }
                else {
                    $active = "";
                }
                echo "<li$active><a href=\"$url\"><span>$name</span></a></li>\n";
            }
        }
    }

    function renderSitemap() {
        foreach ($this->pages as $page) {
            if ($page->visible) {
                $name = $page->name;
                $url = $page->url;
                echo "<li><a class=\"link light\" href=\"$url\"><span>$name</span></a></li>\n";
            }
        }
    }
}
