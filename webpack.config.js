const path = require('path');

 const admin = {
  mode: 'production',
  entry: './assets/ts/admin/index.ts',
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        use: 'ts-loader',
        exclude: /node_modules/,
      },
    ],
  },
  resolve: {
    extensions: ['.tsx', '.ts', '.js'],
  },
  output: {
    filename: './js/admin/bundle.js',
    path: path.resolve(__dirname, 'assets'),
  },
};

module.exports = [admin]