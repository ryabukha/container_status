FROM alpine as app

RUN apk --update add --no-cache \
    docker \
    bash \
    jq \
    php

COPY ./app/rootfs/ /
WORKDIR /app/
ENTRYPOINT ["/app/entrypoint.sh"]
