FROM hackinglab/alpine-base
MAINTAINER Ivan Buetler <ivan.buetler@compass-security.com>

# Add the files (static web and node app)
ADD root /


# ===================================================================
# Install nginx
RUN echo "http://dl-4.alpinelinux.org/alpine/v3.6/main/" >> /etc/apk/repositories && \
    apk add --update nginx=1.12.1-r0 && \
    rm -rf /var/cache/apk/* && \
    chown -R nginx:www-data /var/lib/nginx

# ===================================================================
# Install tomcat
# Tomcat Version
ENV TOMCAT_VERSION_MAJOR 8
ENV TOMCAT_VERSION_FULL  8.5.20

# Download and install
RUN apk add --update curl &&\
  curl -LO http://mirrors.standaloneinstaller.com/apache/tomcat/tomcat-${TOMCAT_VERSION_MAJOR}/v${TOMCAT_VERSION_FULL}/bin/apache-tomcat-${TOMCAT_VERSION_FULL}.tar.gz &&\
  curl -LO https://www.apache.org/dist/tomcat/tomcat-${TOMCAT_VERSION_MAJOR}/v${TOMCAT_VERSION_FULL}/bin/apache-tomcat-${TOMCAT_VERSION_FULL}.tar.gz.md5 &&\
  md5sum -c apache-tomcat-${TOMCAT_VERSION_FULL}.tar.gz.md5 &&\
  gunzip -c apache-tomcat-${TOMCAT_VERSION_FULL}.tar.gz | tar -xf - -C /opt &&\
  rm -f apache-tomcat-${TOMCAT_VERSION_FULL}.tar.gz apache-tomcat-${TOMCAT_VERSION_FULL}.tar.gz.md5

 
RUN ls -al /opt/
RUN ln -s /opt/apache-tomcat-${TOMCAT_VERSION_FULL} /opt/tomcat
RUN rm -rf /opt/tomcat/webapps/examples /opt/tomcat/webapps/docs
RUN rm -rf /var/cache/apk/*

# Configuration
ADD tomcat-users.xml /opt/tomcat/conf/
RUN sed -i 's/52428800/5242880000/g' /opt/tomcat/webapps/manager/WEB-INF/web.xml 

# Set environment
ENV CATALINA_HOME /opt/tomcat

# Launch Tomcat on startup
# CMD ${CATALINA_HOME}/bin/catalina.sh run

# ===================================================================


# Expose the ports for nginx
EXPOSE 80
