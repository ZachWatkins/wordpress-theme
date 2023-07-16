/**
 * External dependencies
 */
const glob = require( 'glob' ).sync;
const { join } = require( 'path' );

/**
 * Internal dependencies
 */
const { version } = require( './package' );

/**
 * Regular expression string matching a SemVer string with equal major/minor to
 * the current package version. Used in identifying deprecations.
 *
 * @type {string}
 */
const majorMinorRegExp =
	version.replace( /\.\d+$/, '' ).replace( /[\\^$.*+?()[\]{}|]/g, '\\$&' ) +
	'(\\.\\d+)?';

/**
 * The list of patterns matching files used only for development purposes.
 *
 * @type {string[]}
 */
const developmentFiles = [ '**/@(__mocks__|__tests__|test)/**/*.[tj]s?(x)' ];

module.exports = {
	root: true,
	extends: [
		'plugin:@wordpress/eslint-plugin/recommended',
		'plugin:eslint-comments/recommended',
	],
	globals: {
		wp: 'off',
	},
	settings: {
		jsdoc: {
			mode: 'typescript',
		},
		'import/internal-regex': null,
	},
	rules: {
		'jest/expect-expect': 'off',
		'@wordpress/dependency-group': 'error',
		'@wordpress/is-gutenberg-plugin': 'error',
		'@wordpress/react-no-unsafe-timeout': 'error',
		'@wordpress/i18n-text-domain': [
			'error',
			{
				allowedTextDomain: 'default',
			},
		],
		'@wordpress/no-unsafe-wp-apis': 'off',
		'@wordpress/data-no-store-string-literals': 'error',
		'import/default': 'error',
		'import/named': 'error',
		'@typescript-eslint/no-restricted-imports': [
			'error',
			{
				paths: [
					{
						name: 'react',
						message:
							'Please use React API through `@wordpress/element` instead.',
						allowTypeImports: true,
					},
				],
			},
		],
		'no-restricted-syntax': [
			'error',
			{
				selector:
					'LogicalExpression[operator="&&"][left.property.name="length"][right.type="JSXElement"]',
				message:
					'Avoid truthy checks on length property rendering, as zero length is rendered verbatim.',
			},
		],
	},
	overrides: [
		{
			files: [ ...developmentFiles ],
			rules: {
				'import/default': 'off',
				'import/no-extraneous-dependencies': 'off',
				'import/no-unresolved': 'off',
				'import/named': 'off',
				'@wordpress/data-no-store-string-literals': 'off',
			},
		},
		{
			files: [ '**/test/**/*.js' ],
			excludedFiles: [ 'test/e2e/**/*.js' ],
			extends: [ 'plugin:@wordpress/eslint-plugin/test-unit' ],
		},
		{
			files: [ '**/test/**/*.[tj]s?(x)' ],
			excludedFiles: [ 'test/e2e/**/*.[tj]s?(x)' ],
			extends: [
				'plugin:jest-dom/recommended',
				'plugin:testing-library/react',
				'plugin:jest/recommended',
			],
		},
		{
			files: [ 'test/e2e/**/*.[tj]s' ],
			extends: [
				'plugin:eslint-plugin-playwright/playwright-test',
				'plugin:@typescript-eslint/base',
			],
			parserOptions: {
				tsconfigRootDir: __dirname,
				project: [ './test/e2e/tsconfig.json' ],
			},
			rules: {
				'@wordpress/no-global-active-element': 'off',
				'@wordpress/no-global-get-selection': 'off',
				'playwright/no-page-pause': 'error',
				'no-restricted-syntax': [
					'error',
					{
						selector: 'CallExpression[callee.property.name="$"]',
						message:
							'`$` is discouraged, please use `locator` instead',
					},
					{
						selector: 'CallExpression[callee.property.name="$$"]',
						message:
							'`$$` is discouraged, please use `locator` instead',
					},
					{
						selector:
							'CallExpression[callee.object.name="page"][callee.property.name="waitForTimeout"]',
						message: 'Prefer page.locator instead.',
					},
				],
				'@typescript-eslint/await-thenable': 'error',
				'@typescript-eslint/no-floating-promises': 'error',
				'@typescript-eslint/no-misused-promises': 'error',
			},
		},
		{
			files: [ 'bin/**/*.js', 'bin/**/*.mjs' ],
			rules: {
				'no-console': 'off',
			},
		},
	],
};
