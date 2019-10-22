conf:
	sudo apt-get install php7.2 php7.2-mbstring php7.2-mysql php7.2-intl php7.2-xml composer
		cd . && cd ./api
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	sudo apt-get install mysql-server-5.7
	cd ..
	cd admin
	npm install
	sudo apt-get install nodejs
	$(MAKE) bd-conf

bd-conf:
	mysql -u root -p --execute="drop database if exists laravel_angular; create database laravel_angular; drop user if exists 'laravel_angular'; create user 'laravel_angular' identified by 'laravel_angular'; grant all privileges on laravel_angular.* to 'laravel_angular';"
	sed -i 's/DB_DATABASE.*/DB_DATABASE=laravel_angular/' .env
	sed -i 's/DB_USERNAME.*/DB_USERNAME=laravel_angular/' .env
	sed -i 's/DB_PASSWORD.*/DB_PASSWORD=laravel_angular/' .env	
	php artisan migrate:refresh --seed
