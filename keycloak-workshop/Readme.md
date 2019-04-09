# Keycloak Workshop
## Introduction
I am a part-time cyber security lecturer at the software engineering department of the University of Applied Science in Rapperswil Switzerland. My students must learn several programming skills and in almost any web software project some sort of authentication and authorization must be applied. I want my students to spend their time working on the real purpose of the software problem (problem domain), instead of spending hours with authentication and authorization. Needless to say this is a crucial task in a real software project. Read this tutorial and I will show you how to add authentication to any web service that does not have a builtin authentication layer using keycloak IdP and keycloak proxy in approx. 15 minutes.

## Sample Docker Application
For the sake of this tutorial I have chosen ttyd, a service that will provide a web shell to a kali linux machine. The sample application is not asking for username and password. It comes without authentication. You can grab the software from GitHub if you like: https://github.com/ibuetler/e1pub/tree/master/docker/hl-kali-docker-ttyd or from Docker Hub

```
docker run --rm -i -p 7681:7681 hackinglab/hl-kali-docker-ttyd
CTRL+C will stop the docker 
```

![ttyd1](ttyd1.png)

Please stop the docker once you have tested the sample application. 

## Traefik 


## Keycloak IdP (Identity Provider)
For the sake of this tutorial I use keycloak, an open-source identity provider that runs smoothly with docker. If you don’t know keycloak, I encourage you to get into this project. It is the open source version of the RedHat RH-SSO solution. 

Please setup keycloak using the following commands
```
mkdir /opt/git
git clone https://github.com/ibuetler/e1pub.git
cd /opt/git/e1pub/docker/keycloak-idp-docker
mkdir -p /opt/data/keycloak/postgres/data/

```
