<?php

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/mvc/")
        {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        }
        elseif ($url == "/mvc/tasks/create/")
        {
            $request->controller = "tasks";
            $request->action = "create";
            $request->params = [];
        }
        elseif ($url == "/mvc/tasks/edit/")
        {
            $request->controller = "tasks";
            $request->action = "edit";
            $request->params = [];
        }
        elseif ($url == "/mvc/tasks/delete/")
        {
            $request->controller = "tasks";
            $request->action = "delete";
            $request->params = [];
        }
        else
        {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }

    }
}
?>