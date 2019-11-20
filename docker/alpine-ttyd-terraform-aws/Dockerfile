FROM hackinglab/alpine-base:latest
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

ENV TERRAFORM_VERSION=0.12.12

# Install nginx
RUN echo "http://dl-4.alpinelinux.org/alpine/v3.10/main/" >> /etc/apk/repositories && \
    apk add --update openssl ttyd make curl openssh groff less python py-pip && \
    pip install awscli 


RUN curl -sSL https://releases.hashicorp.com/terraform/${TERRAFORM_VERSION}/terraform_${TERRAFORM_VERSION}_linux_amd64.zip \
        -o /tmp/terraform.zip && \
    unzip /tmp/terraform.zip -d /usr/bin && \
    rm /tmp/terraform.zip && \
    rm -rf /var/cache/apk/*

# Add the files
ADD root /

# Expose the ports for nginx
EXPOSE 7681
