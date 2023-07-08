# WordPress Theme

WordPress Theme is a fork of the Twenty Twenty-Three theme meant to demonstrate how to develop a WordPress theme with little to no dependency on production website data and files and while separating the WordPress core files from the development environment.

The goal is a reliable, portable codebase with well-defined dependencies and minimal time for someone to make their first pull request when they have never seen this code before.

## Commands

The following command line scripts allow you to start and manage the Docker environment and interact with your code.

| Command                  | Description                                                         |
| ------------------------ | ------------------------------------------------------------------- |
| `npm run start`          | Start Docker containers                                             |
| `npm run start:update`   | Start Docker containers and update WordPress to the latest version. |
| `npm run stop`           | Stop Docker containers                                              |
| `npm run destroy`        | Destroy the Docker containers                                       |
| `npm run seed:php`       | Run the database seeder in `./.config/seed.php`                     |
| `npm run seed:sql`       | Run the database seeder in `./.config/seed.sql`                     |
| `npm run clean`          | Reset the database, reinstall WordPress, and restart the containers |
| `npm run query [string]` | Run a query string against the database                             |
| `npm run wp-env`         | Run the base `wp-env` command with your own commands and arguments  |
| `npm run test`           | Run Jest and Pest tests for JavaScript and PHP code                 |
| `npm run lint`           | Run Prettier and PHPCS on the codebase                              |
| `npm run lint:fix`       | Run Prettier and PHPCS on the codebase and fix issues               |
| `docker ps`              | See all running Docker containers                                   |

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
