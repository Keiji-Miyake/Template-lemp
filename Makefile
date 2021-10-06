NAME = PHP-Template
VERSION = 0

UID := $(shell id -u)
GID := $(shell id -g)
USERNAME := $(shell whoami)
PWD := $(shell pwd)
$(eval WSL2 := $(shell uname -r | rev | cut -c 1-4 | rev))
DEVCONTAINER := .devcontainer/
DOT_ENV_PATH := .devcontainer/.env

all: init

init: .env

.env: $(DOT_ENV_PATH)
ifeq ($(WSL2),WSL2)
	echo "UID=$(UID)" > $(DOT_ENV_PATH)
	echo "GID=$(GID)" >> $(DOT_ENV_PATH)
	echo "USERNAME=$(USERNAME)" >> $(DOT_ENV_PATH)
else
	echo "UID=$(UID)" > $(DOT_ENV_PATH)
	echo "GID=$(GID)" >> $(DOT_ENV_PATH)
	echo "USERNAME=$(USERNAME)" >> $(DOT_ENV_PATH)
endif

.PHONY: all init