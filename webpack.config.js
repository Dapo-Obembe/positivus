const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const SvgSpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const glob = require('glob');

const entries = {
    // Main JS entry point
    main: './assets/js/main.js',

    // Page-specific scripts
    ...Object.fromEntries(
        glob.sync('./assets/js/pages/*.js').map(file => [
            path.basename(file, '.js'),
            file
        ])
    ),

    // SVG sprite entry (remains separate)
    svgSprite: './assets/icons/index.js'
};

module.exports = (env, argv) => {
    const isDevelopment = argv.mode === 'development';

    return {
        mode: isDevelopment ? 'development' : 'production',
        entry: entries,
        output: {
            path: path.resolve(__dirname, 'dist'),
            filename: 'js/[name].js',
            chunkFilename: 'js/[name].js',
            publicPath: '/dist/',
        },
        module: {
            rules: [
                {
                    test: /\.svg$/,
                    include: path.resolve(__dirname, 'assets/icons'),
                    use: [
                        {
                            loader: 'svg-sprite-loader',
                            options: {
                                extract: true,
                                spriteFilename: 'icons/sprite.svg',
                                publicPath: '/'
                            }
                        },
                        'svgo-loader'
                    ]
                }
            ]
        },
        plugins: [
            new CleanWebpackPlugin({
                cleanOnceBeforeBuildPatterns: [
                    path.join(__dirname, 'dist/icons/sprite.svg'),
                    path.join(__dirname, 'dist/js/svgSprite.js')
                ]
            }),
            new SvgSpriteLoaderPlugin()
        ],
        stats: {
            children: true
        },
        devtool: isDevelopment ? 'eval-source-map' : 'source-map',

        devServer: {

            proxy: [
                {
                    context: ['/'],
                    target: 'http://swiftplate.local', // Change to your local server URL.
                    changeOrigin: true,
                    followRedirects: false,
                    onProxyRes: function (proxyRes, req, res) {
                        // Intercept redirect responses and rewrite location headers
                        if (proxyRes.headers.location) {
                            proxyRes.headers.location = proxyRes.headers.location.replace('http://swiftplate.local', 'http://localhost:9000');
                        }
                    }
                },
            ],


            compress: true,
            port: 9000,
            hot: true,

            client: {
                webSocketURL: 'ws://localhost:9000/ws',
                logging: 'info',
                overlay: true,
            },

            host: '0.0.0.0',
            allowedHosts: 'all',

            devMiddleware: {
                writeToDisk: true,
            },
            watchFiles: [
                '**/*.js',
                '**/*.php',
                '**/*.css'
            ],
        },
    };
};