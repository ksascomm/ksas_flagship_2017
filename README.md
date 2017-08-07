# Flagship 2017 version.

Built off [FoundationPress](https://github.com/olefredrik/FoundationPress).



## Quickstart

### 1. Clone the repository and install with npm
```bash
$ cd my-wordpress-folder/wp-content/themes/
$ git clone https://github.com/ksascomm/Flagship-2017.git
$ cd Flagship-2017
$ npm install -g bower (if not already installed)
$ npm install
```

### 2. While you're working on your project, run:

```bash
$ npm run watch
```

If you want to take advantage of browser-sync (automatic browser refresh when a file is saved), simply open your Gulpfile.js and put your local dev-server address (e.g localhost) in this field ```var URL = '';``` , save the Gulpfile and run
```bash
$ npm run watch
```

### 3. For building all the assets, run:

```bash
$ npm run build
```

Build all assets minified and without sourcemaps:
```bash
$ npm run production
```

### 4. To create a .zip file of your theme, run:

```bash
$ npm run package
```

Running this command will build and minify the theme's assets and place a `.zip` archive of the theme in the `packaged` directory. This excludes the developer files/directories from your theme like `node_modules`, `assets/components`, etc. to keep the theme lightweight for transferring the theme to a staging or production server.

### Styles & Scripts

 * `style.css`: All styles are handled in the Sass files within /assets/scss/*
 * `assets/javascript/custom`: Put all your custom scripts here. They will be minified and concatenated one single .js file.


You **must** run `npm run build` or `npm run watch` in your terminal for the styles & scripts to be copied and concatenated.