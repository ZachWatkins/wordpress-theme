# WordPress Theme

WordPress Theme is a fork of the Twenty Twenty-Three theme meant to demonstrate how to develop a WordPress theme with little to no dependency on production website data and files and while separating the WordPress core files from the development environment.

The goal is a reliable, portable codebase with well-defined dependencies and minimal time for someone to make their first pull request when they have never seen this code before.

## wp-env

Ensure that Docker is running, then:

```shell
$ cd /path/to/a/wordpress/plugin
$ npm -g i @wordpress/env
$ wp-env start
```

The local environment will be available at http://localhost:8888 (Username: `admin`, Password: `password`).

The database credentials are: user `root`, password `password`. For a comprehensive guide on connecting directly to the database, refer to [Accessing the MySQL Database](https://github.com/WordPress/gutenberg/blob/trunk/docs/contributors/code/getting-started-with-code-contribution.md#accessing-the-mysql-database).

For documentation on .wp-env.json options see here: https://github.com/WordPress/gutenberg/tree/trunk/packages/env#wp-envjson
