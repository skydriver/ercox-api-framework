<?php

/*
 * The MIT License
 *
 * Copyright 2017 Damjan Krstevski.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Class App is a request handler
 * Call the controller and constroller's function
 *
 * @author Damjan
 * @version 1.0.0
 * @package ercox-api
 * @copyright (c) 2017, Damjan Krstevski
 */
class App
{
    /**
     * @var string The name of the controller to use
     * @since 1.0.0
     */
    protected $controller = 'home';

    /**
     *
     * @var string Controller's function name to use
     * @since 1.0.0
     */
    protected $method = 'index';

    /**
     *
     * @var array The GET query paramethers
     * @since 1.0.0
     */
    protected $params = [];





    /**
     * Application constructor to handling the requests
     * @since 1.0.0
     * @return void
     */
    public function __construct()
    {
        $this->startRouteEngine();
    } // End of public function __construct();





    /**
     * Application destructor
     */
    public function __destruct()
    {

    } // End of function __destruct();





    /**
     * This is the route engine
     * @since 1.0.0
     * @return void
     */
    final private function startRouteEngine()
    {
        $url = $this->extractRoute();

        if (file_exists('../app/controllers/' . $url[0] . '.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller .= 'controller';

        if (isset($url[1]) && method_exists($this->controller, $url[1]))
        {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        $controllerInstance = new $this->controller;
        call_user_func_array([$controllerInstance, $this->method], $this->params);
    } // End of function make startRouteEngine();





    /**
     * Extract the URL paramethers.
     * @since 1.0.0
     * @return mixed Extracted URL or false
     */
    private static function extractRoute()
    {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);

        if ($url)
        {
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }

        return false;
     } // End of function extractRoute();

} // End of class App
