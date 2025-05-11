FROM nginx:alpine

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN rm /etc/nginx/conf.d/default.conf
COPY default.conf /etc/nginx/conf.d

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]