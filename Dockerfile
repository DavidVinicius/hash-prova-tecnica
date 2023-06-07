  # Especifica uma das imagens utilizadas
FROM wyveo/nginx-php-fpm:php81

# Define o diretório principal do container como o diretório do Nginx
WORKDIR /usr/share/nginx/

# Troca a configuração padrão do Nginx pela nossa
COPY ./.docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./.docker/entrypoint /usr/share/nginx/entrypoint

#RUN chown -R www-data:www-data /usr/share/nginx/
RUN chmod +x /usr/share/nginx/entrypoint

#ENTRYPOINT [ "/usr/share/nginx/entrypoint" ]
#docker exec -u 0 otris_laravel-app_1 chmod -R 777 /usr/share/nginx/
#docker exec -it nome-do-container bash
