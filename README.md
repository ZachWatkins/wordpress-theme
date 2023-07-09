# WordPress Theme

WordPress Theme is a fork of the Twenty Twenty-Three theme meant to demonstrate how to develop a WordPress theme with little to no dependency on production website data and files and while separating the WordPress core files from the development environment.

The goal is a reliable, portable codebase with well-defined dependencies and minimal time for someone to make their first pull request when they have never seen this code before.

## System Requirements for Development

You will need the following tools installed on your computer:

-   [Docker](https://www.docker.com/products/docker-desktop)
-   [Node.js](https://nodejs.org/en/download/)
-   [git](https://git-scm.com/downloads)

I prefer to also have PHP and Composer installed on my computer, but they are not required. I include a batch script for Windows installation here: `bin\windows-install-php-composer.bat`.

## Commands

The following command line scripts allow you to start and manage the Docker environment and interact with your code.

| Command                  | Description                                               |
| ------------------------ | --------------------------------------------------------- |
| `npm run start`          | Start the development environment                         |
| `npm run start:update`   | Start the development environment and update WordPress    |
| `npm run stop`           | Stop Docker containers                                    |
| `npm run clean`          | Reset the database and restart the environment            |
| `npm run destroy`        | Destroy the Docker containers                             |
| `npm run lint`           | Check code style and logic for WordPress coding standards |
| `npm run lint:fix`       | Fix simple code style inconsistencies                     |
| `npm run test`           | Test JavaScript and PHP                                   |
| `npm run test:js`        | Test JavaScript                                           |
| `npm run test:php`       | Test PHP                                                  |
| `npm run seed:php`       | Run the database seeder in `./.wp-env/database.php`       |
| `npm run seed:sql`       | Run the database seeder in `./.wp-env/database.sql`       |
| `npm run composer`       | Use Composer in the wordpress environment                 |
| `npm run query [string]` | Run a query string against the database                   |
| `npm run wp-env`         | Run the base `wp-env` command                             |
| `docker ps`              | See all running Docker containers                         |
| `bin/gitprune`           | Remove all local branches that have been merged           |

## wp-env

Ensure that Docker is running, then:

```shell
$ cd /path/to/a/wordpress/plugin-or-theme
$ npm -g i @wordpress/env
$ wp-env start
```

The local environment will be available at http://localhost:8888 (Username: `admin`, Password: `password`).

The database credentials are: user `root`, password `password`. For a comprehensive guide on connecting directly to the database, refer to [Accessing the MySQL Database](https://github.com/WordPress/gutenberg/blob/trunk/docs/contributors/code/getting-started-with-code-contribution.md#accessing-the-mysql-database).

For documentation on .wp-env.json options see here: https://github.com/WordPress/gutenberg/tree/trunk/packages/env#wp-envjson
