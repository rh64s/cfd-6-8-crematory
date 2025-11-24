FROM postgres:18-alpine

RUN chown -R postgres:postgres /var/lib/postgresql/data

RUN chmod 700 /var/lib/postgresql/data

USER postgres

VOLUME /var/lib/postgresql/data

EXPOSE 5432

CMD ["docker-entrypoint.sh"]