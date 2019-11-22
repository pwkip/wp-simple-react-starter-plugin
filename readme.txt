=== Simple React Starter Plugin ===
Contributors: Jules Colle
Tags: react, starter, starter plugin, create-react-app
Requires at least: 4.0
Tested up to: 5.3
Stable tag: 1.0
License: GPLv2 or later

Basic plugin to demonstrate how you can develop your own WordPress plugins with React

== Description ==

This is a starter plugin to demonstrate how to use a react app (created with create-react-app) in your WordPress plugin.

This plugin can be used as a starting point for your own plugin.
Or you can integrate reactapp in your already existing plugin by copying these files to your own plugin root folder:

* reactapp_loader.php
* reactapp (folder)

= During development =

Go to reactapp folder. run `sudo npm install`. `sudo npm start`.
Note: during development on your localhost you should keep the terminal window active.

= Build =

Go to reactapp folder. run `sudo npm run build`.
This will create the following files in your plugin root dir:

* reactapp_script.js
* reactapp_script.js.map
* reactapp_style.css
* reactapp_style.css.map

= Advanced =

In case you do not want to use the provided reactapp folder, but create your react app with create-react-app, follow these steps:
1. remove the original reactapp folder
1. go to the plugin root folder and run `npx create-react-app reactapp` and then `cd reactapp`
1. next run `npm --save-dev i rewire` (we'll need this in the custom start and build scripts)
1. Then `sudo npm start`
1. Verify the installation worked by visting http://localhost:3000/
1. go to reactapp/src/index.js line 7 and replace "root" with "reactapp_root"
1. go to reactapp/public/index.html line 31 and replace <div id="root"></div> with <div id="reactapp_root"></div>
1. check if everyting is still working by visiting http://localhost:3000/
1. open reactapp/package.json and edit the start and build script like this:
    "start": "node ./scripts/start-non-split.js",
    "build": "node ./scripts/build-non-split.js",
1. Also add this script:
    "postbuild": "node ./scripts/export.js",
1. Copy the reactapp/scripts folder from the original plugin, and paste it in your own plugin. You should have thise files:
    reactapp/scripts/build-non-split.js
    reactapp/scripts/export.js
    reactapp/scripts/start-non-split.js
1. Go back to your terminal, and kill the running process. Then run `sudo npm start` again.
1. You should now be able to view the app both at http://localhost:3000/ and on any page in your wordpress installation where there's a div with id="reactapp_root"
1. Note that the React logo will be missing because the script is trying to load it via a relative URL in /static/media/logo.25bf045c.svg

= Known problems =

* Resources, other than JS and CSS, will not be copied from reactapp to the plugin
* js.map and css.map do not seem to work correctly yet.

== Installation ==

After installation and activating you should see a React Test page in your WP admin.
Visit this page for further instructions.

== Changelog ==

= 1.0 (11-20-2019) =

* Initial release
