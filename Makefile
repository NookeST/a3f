.PHONY: init, test, test-task-2

init:
	composer install

test:
	./vendor/bin/phpunit --configuration ./phpunit.xml --testdox

test-task-2:
	./vendor/bin/phpunit --configuration ./phpunit.xml --testdox --filter=Sort