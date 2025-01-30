const path = require("path")
const BrowserSyncPlugin = require("browser-sync-webpack-plugin")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")

module.exports = {
  entry: "./src/index.js", // Adjust if needed
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader, // Extracts CSS into a separate file
          "css-loader", // Translates CSS into CommonJS
          "sass-loader", // Compiles SCSS to CSS
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "bundle.css", // Output CSS file name
    }),
    new BrowserSyncPlugin(
      {
        proxy: "http://bath-experts.local",
        files: ["**/*.php", "dist/*.css", "dist/*.js"], // Watch for changes
        injectChanges: true,
        notify: false,
        open: "external", // Open the actual site, not localhost
      },
      { reload: true }
    ),
  ],
  devServer: {
    static: {
      directory: path.join(__dirname, "dist"),
    },
    hot: true,
  },
}
