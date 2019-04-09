# RUN APPLICATION

Build/run containers:

    $ git clone git@github.com:taras-by/ip2geo.git
    $ cd ip2geo
    $ docker-compose build
    $ docker-compose up -d 
    $ docker-compose exec --user="www-data" app composer install

Run application: http://localhost:8000/ip2geo?ip=8.8.8.8
    
or

    $ curl --request GET \
      --url 'http://localhost:8000/ip2geo?ip=8.8.8.8'
      