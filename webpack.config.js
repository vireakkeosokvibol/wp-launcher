const path = require('path');

 const adminCustomizer = {
  mode: 'production',
  entry: './assets/ts/admin/customizer/customizer.ts',
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
    filename: './js/admin/customizer/bundle.js',
    path: path.resolve(__dirname, 'assets'),
  },
};

module.exports = [adminCustomizer]