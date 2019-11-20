FROM alpine:latest

RUN apk --update add socat bash && \
    rm -rf /var/cache/apk/* && \
    rm -rf /root/.cache

COPY ./start /

CMD ["/start"]

