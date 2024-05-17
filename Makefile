

IDE = phpstorm

.PHONY: all
all:

vendor/autoload.php:
	composer install --prefer-dist --optimize-autoloader

.PHONY: tests
tests: vendor/autoload.php
	php vendor/bin/phpunit

ide:
	exec $(IDE) . &

