default: build

build:
	bin/build.sh

clean:
	@if [ -d ".git" ]; then git clean -xdf; fi

run:
	docker-compose up

bash:
	docker-compose exec wordpress bash

# from within docker; run a db import on the first .sql file found in the current directory and add an admin user
db:
	bin/local-db-import.sh

test:
	composer test
