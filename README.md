#Init

git clone --recursive
git pull --recurse-submodules


#####DB Password Generation
```openssl rand -base64 32```



### Required

 * pecl install memcache and memcached for php
 * Twig C extension
 * ImageMagick and php55-imagick extension
 
 ```
 sudo add-apt-repository ppa:ondrej/php5
 sudo apt-get update
 sudo apt-get upgrade
 sudo apt-get install python-software-properties
 
 sudo apt-get install php5
 
 
 apt-get install php5-dev
 
 apt-get purge ruby*
 
 apt-get install ruby2.2 ruby2.2-dev rubygems
 
 apt-get install npm
 
 npm install -g bower grunt-cli
 
 gem install compass
 
 sudo gem update --system
 
 gem install foundation
 
 gem install bundler --pre
 
 sudo apt-get install postfix
 
 sudo apt-get install libsasl2-2 libsasl2-modules sasl2-bin
 
 
 sudo apt-get install imagemagick php5-imagick
 
 cd ext/twig
 phpize
 ./configure
 make
 make install
 ```
