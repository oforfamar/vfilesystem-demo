install:
	composer install

test:
	vendor/bin/phpunit -c tests/phpunit.xml
