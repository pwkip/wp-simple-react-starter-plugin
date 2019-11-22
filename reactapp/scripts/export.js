console.log('POSTBUILD SCRIPTS');
console.log('-----------------');

const fs = require('fs');

const extensions =   [ '.js',                   '.css' ];
const sources =      [ './build/static/js',     './build/static/css' ];
const destinations = [ '../reactapp_script.js', '../reactapp_style.css' ];
const baseNames =    [ 'reactapp_script',       'reactapp_style' ];

for (let i = 0; i < sources.length; i++) {
  fs.readdir(sources[i], (err, files) => {
    files.forEach(file => {
      if (file.endsWith(extensions[i]+'.map')) {

        const src = `${sources[i]}/${file}`;
        const dst = `${destinations[i]}.map`;

        fs.copyFile(src,dst,(err) => {
          if (err) return console.log(err);

          console.log(`copied file ${src} to ${dst}`);
        });
      }
      if (file.endsWith(extensions[i])) {
        const src = `${sources[i]}/${file}`;
        const dst = destinations[i];

        const baseName = file.substr(0,file.length-extensions[i].length);

        fs.copyFile(src,dst,(err) => {
          if (err) return console.log(err);

          console.log(`copied file ${src} to ${dst} `);

          fs.readFile(dst, 'utf8', function (err,data) {
            if (err) return console.log(err);
            var re = new RegExp(baseName,"g");
            var result = data.replace(re, baseNames[i]);
            fs.writeFile(dst, result, 'utf8', function (err) {
                if (err) return console.log(err);
                console.log(`replaced "${baseName}" with "${baseNames[i]}" in file ${dst}`);
            });
          });

        });
      }
    });
  });
}
