install:
	composer install

autoload:
	composer dump-autoload

lint:
	composer exec 'phpcs --standard=PSR2 src tests'

test:
	composer exec phpunit -- --coverage-clover build/logs/clover.xml --color tests
	composer exec test-reporter
