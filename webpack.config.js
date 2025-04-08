const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const SvgSpriteLoaderPlugin = require('svg-sprite-loader/plugin');

module.exports = (env, argv) => ({
    mode: argv.mode || 'production',
    entry: {
        svgSprite: './src/icons/index.js'
    },
    output: {
        path: path.resolve(__dirname, 'dist/icons'),
        filename: '[name].js',
        publicPath: '/'
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
                            spriteFilename: 'sprite.svg',
                            publicPath: '/'
                        }
                    },
                    'svgo-loader'
                ]
            }
        ]
    },
    plugins: [
        new CleanWebpackPlugin(
            {
                cleanOnceBeforeBuildPatterns: [
                    path.join(__dirname, 'dist/icons/sprite.svg'), // Only clean sprite file
                    path.join(__dirname, 'dist/icons/svgSprite.js') // Clean the dummy JS
                ]
            }
        ),
        new SvgSpriteLoaderPlugin()
    ],
    stats: {
        children: true
    }
});