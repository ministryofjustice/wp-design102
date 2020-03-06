default: build

build:
	bin/build.sh

clean:
	@if [ -d ".git" ]; then git clean -xdf; fi

run:
	cp .env.example .env
	docker-compose up

# Run the application
down:
	docker-compose down

# Launch the application, open browser, no stdout
run-launch:
	bin/launch.sh

bash:
	docker-compose exec wordpress bash

test:
	composer test
