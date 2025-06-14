const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const SvgSpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const glob = require('glob');

const entries = {
    // Main JS entry point
    main: './src/js/main.js',

    // Page-specific scripts
    ...Object.fromEntries(
        glob.sync('./src/js/pages/*.js').map(file => [
            path.basename(file, '.js'),
            file
        ])
    ),

    // SVG sprite entry (remains separate)
    svgSprite: './src/icons/index.js'
};

module.exports = (env, argv) => ({
    mode: argv.mode || 'production',
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
                include: path.resolve(__dirname, 'src/icons'),
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
            },
            {
                test: /\.css$/i,
                use: ['style-loader', 'css-loader'],
            },
            // Add this if you're also using font files from Swiper (optional):
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/,
                type: 'asset/resource',
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
    }
});
