#!/usr/bin/env node
'use strict';
/**
 * This file was copied from the wordpress/gutenberg repository.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/bin/validate-package-lock.js
 */
// This script validates `package-lock.json` to avoid the introduction of an
// erroneous `"resolved": false` value. It appears to be related to an upstream
// unresolved issue with NPM. If the upstream issue is resolved, this script
// should no longer be necessary.
//
// See: https://github.com/npm/cli/issues/1138

/**
 * External dependencies
 */
import { createRequire } from 'module';
const require = createRequire( import.meta.url );
import chalk from 'chalk';
const { red, yellow } = chalk;

/**
 * Internal dependencies
 */
// Ignore reason: `package-lock.json` exists outside `bin` `rootDir`.
// @ts-ignore
const packageLock = require( '../package.json' );

const dependencies = Object.entries( packageLock.dependencies || {} );
for ( const [ name, dependency ] of dependencies ) {
	if ( dependency.resolved === false ) {
		console.log(
			`Invalid resolved dependency in package-lock.json.

${ red( JSON.stringify( { [ name ]: dependency }, null, '\t' ) ) }

To fix, try removing the node_modules directory and reverting package-lock.json, then run ${ yellow(
				'npm install'
			) }.
`
		);

		process.exit( 1 );
	}

	if ( dependency.dependencies ) {
		dependencies.push( ...Object.entries( dependency.dependencies ) );
	}
}
