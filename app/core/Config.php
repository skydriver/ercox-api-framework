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
 * Main Config class
 *
 * @author Damjan
 * @since 1.0.0
 * @package ercox-api
 * @copyright (c) 2017, Damjan Krstevski
 */
abstract class Config
{
    /*********************************************
        Database configuration
    *********************************************/
    /**
     * Database driver [mysql or pgsql]
     */
    const db_driver = 'mysql';

    /**
     * Database hostname
     */
	const db_hostname = 'localhost';

    /**
     * Database name
     */
    const db_name = 'employees';

    /**
     * Database password
     */
	const db_username = 'root';

    /**
     * Database password
     */
	const db_password = 'toor';

    /**
     * Database table prefix
     */
	const db_prefix = 'api_';

    /**
     * Database charset
     */
	const db_charset = 'UTF8';

    /**
     * Database port
     */
    const db_port = 3306;

    /**
     * Database execution time
     */
	const db_timeout = 30;

    // End Database configuration

} // End of class Config;