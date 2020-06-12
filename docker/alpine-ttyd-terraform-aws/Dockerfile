FROM hackinglab/alpine-base:latest
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

ENV TERRAFORM_VERSION=0.12.26

# Install nginx
RUN echo "http://dl-4.alpinelinux.org/alpine/v3.10/main/" >> /etc/apk/repositories && \
    apk add --update openssl ttyd make curl openssh groff less python py-pip

RUN curl https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip -o /tmp/awscliv2.zip  && \
    unzip /tmp/awscliv2.zip -d /opt/ && \
    /opt/aws/install -i /usr/local/aws-cli -b /usr/local/bin


RUN curl -sSL https://releases.hashicorp.com/terraform/${TERRAFORM_VERSION}/terraform_${TERRAFORM_VERSION}_linux_amd64.zip \
        -o /tmp/terraform.zip && \
    unzip /tmp/terraform.zip -d /usr/bin && \
    rm /tmp/terraform.zip && \
    rm -rf /var/cache/apk/*

# Add the files
ADD root /

# Expose the ports for nginx
EXPOSE 7681
