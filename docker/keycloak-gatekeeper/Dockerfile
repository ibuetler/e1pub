FROM alpine:latest
MAINTAINER Ivan Buetler <e1@hacking-lab.com>

RUN apk add --no-cache ca-certificates
ADD ./keycloak-gatekeeper/templates/ /opt/templates
ADD ./keycloak-gatekeeper/bin/keycloak-gatekeeper /opt/keycloak-gatekeeper

WORKDIR "/opt"

ENTRYPOINT [ "/opt/keycloak-gatekeeper" ]
