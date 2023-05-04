FROM nginx:1.21

RUN apt-get update && apt-get upgrade -y
RUN apt-get update --fix-missing
RUN apt-get install -y nano mc zip unzip git

RUN mv /etc/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf_off
COPY nginx.conf /etc/nginx/nginx.conf

COPY docker-nginx-entrypoint.sh /tmp/docker-nginx-entrypoint.sh
RUN chmod +x /tmp/docker-nginx-entrypoint.sh

ENTRYPOINT ["/bin/sh", "/tmp/docker-nginx-entrypoint.sh"]

EXPOSE 80

STOPSIGNAL SIGQUIT

CMD ["nginx", "-g", "daemon off;"]
