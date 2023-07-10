/**
 * External dependencies
 */
const glob = require( 'glob' ).sync;

module.exports = {
	rootDir: '../../',
	preset: '@wordpress/jest-preset-default',
	testEnvironmentOptions: {
		url: 'http://localhost/',
	},
	testPathIgnorePatterns: [ '/.git/', '/node_modules/', '/vendor/' ],
};
