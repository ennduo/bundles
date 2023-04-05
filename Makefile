SHELL := /bin/bash
EXEC_COMMAND ?= docker-compose exec base

help: ## show this help
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'
up:
	docker-compose up -d
install:
	${EXEC_COMMAND} composer install
build:
	docker-compose build
bash: ## run bash inside application container
	docker-compose exec base bash
start: ## start and install dependencies
start: build up install
stop: ## clear after docker
	docker-compose down