to run this file .

- first unzip it inside the ubuntu (unzipping command - unzip auctionhousess.zip)
- second use command in ubuntu terminal as for docker
    - sail up
- this is the command to typw when u are inside the project folder auctionhousess
- if it shows the permission error the use. in the below use the folder path where u extracted  the project
    - cd /home/college/CareerHunt/vendor/laravel/sail/bin/
    - chmod +x sail

- but if you donot have sail setup in bash terminal use
    - ./vendor/bin/sail up
- also if this shows permission error
    - cd vendor/bin
      -chmod +x sail

- then by either using

- sail up
- ./vendor/bin/sail up

- you will be able to run the project
- then use
  -- sail artisan migrate --seed
  or
  -- ./vendor/bin/sail artisan migrate -seed
