#!/bin/bash
if [ -e ./keycloak-gatekeeper ]; then
	cd keycloak-gatekeeper
	git pull
	make docker-build
	docker build -t hackinglab/keycloak-gatekeeper . 
else
	git clone https://github.com/keycloak/keycloak-gatekeeper.git
	cd keycloak-gatekeeper
	make docker-build
	docker build -t hackinglab/keycloak-gatekeeper . 
fi

