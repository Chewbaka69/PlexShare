FROM webdevops/php-nginx:7.4-alpine

USER application

WORKDIR /app

COPY --chown=application:application ./ /app

RUN php -v

RUN composer install

RUN (crontab -l ; echo "*/2     *       *       *       *       /usr/local/bin/php /app/oil refine server:ping")| crontab -
RUN (crontab -l ; echo "*/2     *       *       *       *       /usr/local/bin/php /app/oil refine server:ping")| crontab -
RUN (crontab -l ; echo "*/5     *       *       *       *       /usr/local/bin/php /app/oil refine server:browseServers")| crontab -
RUN (crontab -l ; echo "*/5     *       *       *       *       /usr/local/bin/php /app/oil refine server:browseServers")| crontab -
RUN (crontab -l ; echo "0       5       1       *       *       /usr/local/bin/php /app/oil refine server:checkNotFound")| crontab -
RUN (crontab -l ; echo "0       5       1       *       *       /usr/local/bin/php /app/oil refine server:checkNotFound")| crontab -
